<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'includes/functions.php';
$con = connect();
$message = '';

if (!isset($_SESSION['isLogin'])) {
    $_SESSION['isLogin'] = false;
}

if (isset($_POST['username'])) {

    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user_name='" . $uname . "' AND password='" . $password . "' limit 1";
    // echo $sql;
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $_SESSION['isLogin'] = true;
        header("Location: applications.php");
        exit();
    } else {
        $message = "<p class='fail' >You Have Entered Incorrect Password</p>";
        // exit();
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/form.css">
</head>

<body>
    <div class="wrap">
        <div class="d-none d-lg-block col-12 "><img src="imgs/logo.png" class="mx-auto d-none d-lg-block" width="200" height="200" alt="Victoria Rafitnf Logo"></div>

        <div class="flip-container" id='flippr'>
            <div class="flipper">
                <div class="front"></div>
                <div class="back"></div>
            </div>
        </div>
        <h1 class="text" id="welcome">Welcome. <span>please login.</span></h1>

        <form method='post' id="theForm">
            <input type='text' id="username" name='username' placeholder='Username'>
            <input type='password' id='password' name='password' placeholder='Password'>

            <div class='login'>
                <a href="#"><i class="icon-cog"></i> I've fogotten my password</a>
                <input type='submit' value='Login'>
            </div><!-- /login -->
        </form>
        <?= $message ?>
    </div><!-- /wrap -->
    <div class='hint'>
        <p> Hint:<br>
            <span>Username = nathan<br>
                Password = nathan</span></p>
    </div>

</body>

</html>