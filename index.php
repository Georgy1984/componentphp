<?php

session_start();

require_once 'Database.php';
require_once 'Config.php';
require_once 'Validate.php';
require_once 'Input.php';
require_once 'Session.php';
require_once 'Token.php';

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


//$users = Database::getInstance()->query('select * from users2');
//var_dump($users->first());


if(Input::exists()) {
    if (Token::check(Input::get('token'))) {


    $validate = new Validate();
    $validation = [
        'username' => [
            'required' => true,
            'min' => 3,
            'max' => 15,
            'unique' => 'users2'
        ],
        'password' => [
            'required' => true,
            'min' => 3
        ],
        'password_again' => [
            'required' => true,
            'matches' => 'password'
        ]
    ];

   $validate->check($_POST, $validation);
        //var_dump($validation); die;

    if($validate->passed()) {

        Session::flash('success', 'register success');
        header('Location: /test.php');

    } else {
        foreach ($validate->errors() as $error) {
            echo $error . "<br>";
        }
      }
    }
 }

// FUCK U


?>

<form action="" method="post">
    <?php echo Session::flash('success'); ?>
    <div class="">
        <label  for="username">Username</label>
        <input type="text" name="username"   value="<?php echo Input::get('username') ?> " >
    </div>

    <div class="">
        <label for="">Password</label>
        <input type="text"   name="password">
    </div>

    <div class="">
        <label for="">Password Again</label>
        <input type="text"   name="password_again">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

    <button type="submit" class="btn btn-default float-right">Войти</button>
</form>








