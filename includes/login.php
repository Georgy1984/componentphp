<?php
require_once 'init.php';

    if(Input::exists()) {
        if (Token::check(Input::get('token'))) {

            $validate = new Validate();

            $validate->check($_POST, [
                'email' => ['required' => true, 'email' => true],
                'password' => ['required' => true]
            ]);

            if($validate->passed()) {
                $user = new User;

                $remember = (Input::get('remember')) === 'on' ? true : false;

                $login = $user->login(Input::get('email'), Input::get('password'), $remember);

                if ($login) {
                    Redirect::to('index.php');
                } else {
                    echo 'Login failed';
                }


            } else {
                foreach ($validate->errors() as $error) {
                    echo $error . '<br>';
                }

            }

        }

    }

?>

<form action="" method="post" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

    <div class="">
        <label for="email">Email</label>
        <input type="text"  name="email" value="<?php echo Input::get('email')?>">

    </div>

    <div class="">
        <label for="password">Password</label>
        <input type="text"   name="password" value="<?php echo Input::get('password')?>">
    </div>


    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"> <br>

    <div>

            <input type="checkbox" id="remember" name="remember">
        <label for="remember"> Remember me</label>
    </div>
    <br>


    <button type="submit" class="btn btn-default float-right">Войти</button>
</form>