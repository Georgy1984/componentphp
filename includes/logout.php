<?php 
require_once 'ini.php';



$user = new User();

$user->logout();

Redirect::to('index.php');


