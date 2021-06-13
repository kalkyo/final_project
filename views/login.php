<?php
// Initialize the session
session_start();

//Initialize variables
$validLogin = true;
$un = "";

//If the form has been submitted
if (!empty($_POST)) {
//echo "The form has been submitted";

//Get the form data
$un = $_POST['username'];
$pw = $_POST['password'];

//If the login is valid
require('admincred.php');
if ($un == $username && $pw == $password) {

    //Record the login in the session array
    $_SESSION['un'] = $un;

    //Go to the welcome
    $page = isset($_SESSION['page']) ? $_SESSION['page'] : "welcome.php";
    header('location: '.$page);
}

//Invalid login -- set flag variable
$validLogin = false;

?>
<!DOCTYPE html>
<html lang="en">
<!-- header-->
<include href="views/header.html"></include>
<body class="mb-3">
<!-- Navigation bar -->
<include href="views/navbar.html"></include>
<div class="container border border-1 rounded p-4 mt-4">
    <h1>Log in to see your inspired outfits!</h1>
    <hr>
    <form action="#" method="post" id="login">
        <!-- Username -->
        <div class="form-group col-md-3">
            <label class="w-75" for="username"><strong>Username</strong></label>
            <input type="text" class="form-control"
                   id="username" name="username" value="<?php echo $un; ?>"
                   placeholder="Username">
            <!-- PHP Validation -->
            <!-- JavaScript Validation -->
            <span class="err" id="err-username">Please Enter a Username</span>
        </div> <!-- Username END -->

        <!-- Password -->
        <div class="form-group col-md-3">
            <label class="w-75" for="password"><strong>Password</strong></label>
            <input type="password" class="form-control"
                   id="password" name="password" value=""
                   placeholder="Password">
            <!-- PHP Validation -->
            <!-- JavaScript Validation -->
            <span class="err" id="err-password">Please Enter a Password</span>
        </div> <!-- Password END -->

        <!-- login button -->
        <div class="text">
            <input type="submit" class="btn btn-info text-light" value="Login">
        </div>

    </form> <!-- End of form -->

</div> <!-- End of div class container -->
<!-- footer-->
<include href="views/footer.html"></include>

</body>