<?php require_once("includes/header.php"); ?>


<?php

// $user = User::find_by_id($id);



if (!$session->is_signed_in()) {;
    redirect("login.php");
} ?>

<?php

$currentuser = User::find_by_id($_GET['id']);
// if ($user) {
//     $currentuser = User::find_by_id($user);
//     if ($currentuser) {
if (isset($_POST['update'])) {
    if ($currentuser) {
        $currentuser->username = $_POST['username'];
        $currentuser->firstname = $_POST['firstname'];
        $currentuser->lastname = $_POST['lastname'];
        $currentuser->user_password = $_POST['user_password'];

        if(empty($_FILES['user_image'])) {
            $currentuser->save();
        } else {
            $currentuser->set_files($_FILES['user_image']);
            $currentuser->upload_photo();
            $currentuser->save();

            redirect("edit_user.php?id={$currentuser->id}");
        }


        // $currentuser->save();

        // redirect("edit_profile.php?id={$currentuser->id}");
    }
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-blend">
    <div class="container-fluid">
        <a class="navbar-brand" href="landing.php">Landing</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user fa-0.5x"></i>
                        <?php
                            $loggeduser = $session->user_id;
                            if ($loggeduser) {
                                $currentuser = User::find_by_id($loggeduser);
                                if ($currentuser) {
                                    echo $currentuser->username;
                                }
                            }
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="container-fluid">

    <div id="edit-img">

    </div>

</section>


<div class="container container-fluid">
    <div class="grid">
        <div class="register-front">
            <div class="register">
                <div class="col-md-6">
                    <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $currentuser->username; ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="first name">First Name</label>
                                <input type="text" name="firstname" class="form-control" value="<?php echo $currentuser->firstname; ?>">
                            </div>
                        <div class=" form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo $currentuser->lastname; ?>">
                        </div>

                        <div class=" form-group">
                            <label for="user_password">Password</label>
                            <input type="password" name="user_password" class="form-control" value="<?php echo $currentuser->user_password; ?>">
                        </div>

                        <div class=" form-group">
                            <input type="submit" name="update" class="btn btn-primary pull-right" Value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- </div> -->
</section>



<?php include("includes/footer.php"); ?>