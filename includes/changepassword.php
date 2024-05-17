<?php

require_once 'init.php';

$user = new User;

$validate = new Validate();
$validate->check($_POST, [
            'current_password' => ['required'=>true, 'min'=>6],
            'new_password' => ['required'=>true, 'min'=>3],
            'new_password_again' => ['required'=>true, 'min'=>3, 'matches'=> 'new_password'],
    ]);




if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        if ($validate->passed()) {

            if (password_verify(Input::get('current_password'), $user->data()->password)) {
                $user->update(['password' => password_hash(Input::get('new_password'), PASSWORD_DEFAULT)]);
                Session::flash('success', 'Password has been updated');
                Redirect::to('index.php');

            } else {
                echo 'Current password is invalid';
            }

        } else {
            foreach($validate->errors() as $error) {
                echo $error . '<br>';
            }
        }
    }
}

?>


<form action="" method="post">

    <div class="">
        <label for="username">Current password</label>
        <input type="password"  name="current_password" id="current_password">

    </div>

    <div class="">
        <label for="username">New Password</label>
        <input type="password"  name="new_password" id="new_password">

    </div>

    <div class="">
        <label for="username">New Password Again</label>
        <input type="password"  name="new_password_again" id="new_password_again">

    </div>

    <div>
        <button type="submit" class="btn btn-default float-right">Submit</button>
    </div>


    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"> <br>

</form>
