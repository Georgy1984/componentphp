<?php

require '../vendor/autoload.php';
//require_once 'init.php';

use Aura\SqlQuery\QueryFactory;
use classes\Session;
use  classes\User;
use classes\Validate;
use  classes\Input;
use classes\Database;
use classes\Config;
use classes\Cookie;
use classes\Redirect;
use classes\Token;




/*

$queryFactory = new QueryFactory('mysql');

$select = $queryFactory->newSelect();
$select->cols(['*'])->from('users2');


// a PDO connection
$pdo = new PDO("mysql: host=localhost; dbname=project_1;", "root", "SlowHead2023");

// prepare the statement
$sth = $pdo->prepare($select->getStatement());

// bind the values and execute
$sth->execute($select->getBindValues());

// get the results back as an associative array
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
echo '<pre/>';
//var_dump($result);

*/





echo Session::flash('success');

$user = new User;


if ($user->isLoggedIn()) {
    echo " Hi, <a href='#'>{$user->data()->username}</a> ";
    echo "<p><a href='logout.php'>Logout</a></p>";
    echo "<p><a href='update.php'>Update Your Profile</a></p>";
    echo "<p><a href='changepassword.php'>Update Your Password</a></p>";
    if ($user->hasPermissions('admin')) {
        echo 'You are admin';
    }

}  else {
    echo "<a href='login.php'>login</a> or <a href='register.php'>Register</a>";
}










