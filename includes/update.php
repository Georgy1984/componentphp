<?php

require_once 'init.php';


$user = new User;

$validate = new Validate();
$validate->check($_POST, [
                            'username' => ['required'=>true, 'min' =>2]
]);

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        if ($validate->passed()) {
            $user->update(['username' => Input::get('username')]);
            Redirect::to('update.php');

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
        <label for="username">Username</label>
        <input type="text"  name="username" value="<?php echo $user->data()->username ?>">

    </div>

    <div>
        <button type="submit" class="btn btn-default float-right">Submit</button>
    </div>


    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"> <br>

</form>
