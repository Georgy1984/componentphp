<?php

session_start();

require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Config.php';
require_once __DIR__ . '/../classes/Validate.php';
require_once __DIR__ . '/../classes/Input.php';
require_once __DIR__ . '/../classes/Session.php';
require_once __DIR__ . '/../classes/Token.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Redirect.php';




$GLOBALS['config'] = [
    'mysql' => [
        'host' => 'testhost',
        'database' => 'project_1',
        'username' => 'root',
        'password' => 'SlowHead2023'
    ],
    'session' => [
        'token_name' => 'token',
        'user_session' => 'user'
        ]


];




