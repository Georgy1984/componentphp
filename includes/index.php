<?php

require_once 'init.php';

//var_dump(Session::get(Config::get('session.user_session')));

$user = new User;


if ($user->isLoggedIn()) {
    echo " Hi, <a href='#'>{$user->data()->username}</a> ";
    echo "<p><a href='logout.php'>Logout</a></p>";
    echo "<p><a href='update.php'>Update Your Profile</a></p>";
}  else {
    echo "<a href='login.php'>login</a> or <a href='register.php'>Register</a>";
}










