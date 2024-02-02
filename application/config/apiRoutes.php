<?php

return [
    "api/auth/login" => [
        "controller" => "auth",
        "action" => "userLogin",
        "method" => "POST",
    ],
    "api/auth/register" => [
        "controller" => "auth",
        "action" => "userRegister",
        "method" => "POST"
    ]
];
