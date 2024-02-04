<?php

function IsAuthorized(): bool
{
    return !empty($_SESSION) && (isset($_SESSION["user_external_guid"]) && !empty($_SESSION["user_external_guid"]));
}

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}
