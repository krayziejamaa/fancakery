<?php require_once("includes/header.php"); ?>
<?php require_once("includes/navigation.php"); ?>
<?php

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $user_password = trim($_POST['user_password']);


    //verify user from User class
    $user_success = User::user_verify($username, $user_password);

    if ($user_success) {
        $session->login($user_success);
        // echo "Welcome!";
        redirect("landing.php");
    } else {
        $the_message = "Your username and/or password are incorrect";
    }
} else {
    $the_message = "";
    $username = "";
    $user_password = "";
}

?>


<!-- <section class="container-fluid">


</section> -->



<div class="container container-fluid">

    <div class="grid">

        <div class="login-front">
            <div class="register">
                <!-- <div class="col-md-6"> -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="label" for="username">Username</label>
                            <input type="text" name="username" class="form-control" autocomplete="off">
                        </div>
                        <div class=" form-group">
                            <label class="label" for="password">Password</label>
                            <input type="password" name="user_password" class="form-control" autocomplete="off">
                        </div>
                        <div class=" form-group">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="LOGIN">
                        </div>
                    </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
