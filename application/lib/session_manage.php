<?php

$SERVER_NAME = $_SERVER['HTTP_HOST'];
$SERVER_NAME = preg_replace('/^http:\/\//', '', $SERVER_NAME);
$SERVER_NAME = preg_replace('/^www\./', '', $SERVER_NAME);

define('CookiePath', '/');
define('CookieDomain', $SERVER_NAME);
define('live_session_time', '1000');

ini_set("session.auto_start", '0');
ini_set('session.use_cookies', '1');
ini_set('session.use_trans_sid', '0');
ini_set('session.name', 'SID');
ini_set('session.gc_maxlifetime', '1800');
ini_set('session.gc_probability', 5);

session_set_cookie_params(0, CookiePath, CookieDomain, false);


class ImplementedSessionHandler implements SessionHandlerInterface
{
    private $db;

    public function open($savePath, $sessionName): bool
    {
        try {
            $config = require('application/config/db.php');

            $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . '', $config['user'], $config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function close(): bool
    {
        $this->db = null;
        return true;
    }

    public function read($session_id): string
    {
        if (strlen($session_id) != 32) {
            error_log('read session error: Invalid SessionId: ' . $session_id);
            return '';
        }

        $expiredTime = date('Y-m-d H:i:s', time() - live_session_time);

        $stmt = $this->db->prepare('CALL spSessionsGetUnexpiratedByParams(:session_id, :expires_time)');
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_STR);
        $stmt->bindParam(':expires_time', $expiredTime, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && !empty($result['session_data'])) {
            $session_data = $result['session_data'];

            $pattern = '/(\w+)\|s:(\d+):"(.*?)";/';
            preg_match_all($pattern, $session_data, $matches, PREG_SET_ORDER);
            $guid = $matches[0][3];

            $stmt = $this->db->prepare('CALL spPersonsGetByUserExternalGuid(:user_external_guid)');
            $stmt->bindParam(':user_external_guid', $guid, PDO::PARAM_STR);

            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                $errorInfo = $stmt->errorInfo();
                error_log('read session error: Failed to fetch user info: ' . $errorInfo[2]);
                return '';
            } else {
                $serializedData = '';

                foreach ($user as $key => $value) {
                    $serializedData .= $key . '|s:' . strlen($value) . ':"' . $value . '";';
                }

                return $serializedData;
            }
        } elseif (!$result) {
            $errorInfo = $stmt->errorInfo();
            error_log('read session error: Failed to read session: ' . $errorInfo[2]);

            return '';
        } else {
            if (isset($_REQUEST[session_name()])) {
                $this->destroy($_REQUEST[session_name()]);
            }

            return '';
        }
    }

    public function write($session_id, $session_data): bool
    {
        if (strlen($session_id) != 32) {
            error_log('write session error: Invalid SessionId: ' . $session_id);
            return false;
        }

        if (4294967295 < strlen($session_data)) {
            error_log('write session error: Session data too large. ' . $session_id . '(max. 4294967295) -> ' . strlen($session_data));

            if (isset($_REQUEST[session_name()])) {
                $this->destroy($_REQUEST[session_name()]);
            };

            return false;
        }

        $expiredTime = date('Y-m-d H:i:s', time() + live_session_time);
        $jsonData = $session_data;

        $stmt = $this->db->prepare('CALL spSessionsAddOrUpdate(:p_session_id, :p_session_expires, :p_session_data)');
        $stmt->bindParam(':p_session_id', $session_id, PDO::PARAM_STR);
        $stmt->bindParam(':p_session_expires', $expiredTime, PDO::PARAM_STR);
        $stmt->bindParam(':p_session_data', $jsonData, PDO::PARAM_STR);

        $isExecuted = $stmt->execute();

        if ($isExecuted === false) {
            $errorInfo = $stmt->errorInfo();
            error_log('session write errro: Failed to INSERT/UPDATE session: ' . $errorInfo[2]);

            return false;
        }

        return true;
    }

    public function destroy($session_id): bool
    {
        $stmt = $this->db->prepare('spSessionsDestroyById(:session_id)');
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_STR);

        $isExecured = $stmt->execute();

        if ($isExecured === false) {
            $errorInfo = $stmt->errorInfo();
            error_log('session destroy error: Failed delete session: ' . $errorInfo[2]);

            return false;
        }

        return true;
    }

    public function gc($max_session_lifetime): bool
    {
        $gc_lifetime = time() - $max_session_lifetime;

        $stmt = $this->db->prepare('spSessionsGC(:gc_lifetime)');
        $stmt->bindParam(':gc_lifetime', $gc_lifetime, PDO::PARAM_STR);

        $isExecuted = $stmt->execute();

        if ($isExecuted === false) {
            $errorInfo = $stmt->errorInfo();
            error_log('session GC error: Failed delete sessions by lifetime: ' . $errorInfo[2]);

            return false;
        }

        return true;
    }
}


$handler = new ImplementedSessionHandler();
session_set_save_handler($handler, true);
session_start();
