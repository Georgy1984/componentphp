<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Config.php';
require_once 'classes/Validate.php';
require_once 'classes/Input.php';
require_once 'classes/Session.php';
require_once 'classes/Token.php';
require_once 'classes/User.php';
require_once 'classes/Redirect.php';

//$users = Database::getInstance()->query("SELECT * FROM users WHERE username IN (?, ?)" , ['Oliver Kopyov', 'Alita Gray']);
//$users=Database ::getInstance()->get('users2' , ['id', '=', "1"]);
//Database::getInstance()->delete('users' , ['username' , '=' , "Oliver Kopyov"]);
//Database::getInstance()->update('users2', $id, ['username' => 'JoJo', 'password' => 'tapor2014']);
/*Database ::getInstance()->insert('users2' ,
    [
        'username' => 'jojo',
        'password' => 'password1',

    ]); */

/*$id=1;  */


//var_dump($users->count()); die;

/* if ($users->error())  {
        echo 'We have a problem';
} else {
    foreach ($users->results() as $user) {
        echo $user->username . '<br>';
    }
} */


//echo $users->first()->username;
//echo $users->first()->password;

//var_dump($users->first()->password); die();



$GLOBALS['config'] = [
    'mysql' => [
        'host' => 'testhost',
        'database' => 'project_1',
        'username' => 'root',
        'password' => 'SlowHead2023'
    ],
    'session' => ['token_name' => 'token']

];

//Redirect::to('test.php');
//Redirect::to(404);


//$users = Database::getInstance()->query('select * from users2');
//var_dump($users->first());





?>

