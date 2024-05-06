<?php

require_once 'init.php';

if(Input::exists()) {
    if (Token::check(Input::get('token'))) {


        $validate = new Validate();
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        $validation = $validate->check($_POST, [
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
        ]);

        //$validate->check($_POST, $validation);


        if($validate->passed()) {

            $user = new User;
            $user->create([
                'username' => Input::get('username'),
                'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT),
            ]);


            Session::flash('success', 'register success');
            //    header('Location: /test.php');

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

