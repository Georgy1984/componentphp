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
require_once __DIR__ . '/../classes/Cookie.php';




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
        ],
    'cookie' => [
        'cookie_name' => 'hash',
        'cookie_expire' => 604800
    ]


];


if(Cookie::exists(Config::get('cookie.cookie_name')) && !Session::exists(Config::get('session.user_session'))) {
    $hash = Cookie::get(Config::get('cookie.cookie_name'));
    $hashCheck = Database::getInstance()->get('user_sessions', ['hash', '=', $hash]);

    if ($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}




