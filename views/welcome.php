<?php
// Start the session
session_start();

// connect to db
require ($_SERVER['DOCUMENT_ROOT'].'/../config.php');

// If the user is not logged in
if (empty($_SESSION['un'])) {

    // Store the current page in the session
    $_SESSION['page'] = "welcome.php";

    // Redirect user to login page
    header ('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- header-->
<include href="views/header.html"></include>
<body>
<h1>Welcome</h1>
<!-- footer-->
<include href="views/footer.html"></include>
</body>

