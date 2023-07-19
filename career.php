<?php
include 'includes/functions.php';
include 'includes/head.php';
include 'includes/nav.php';
$con = connect();

if (
    !isset($_POST)
    || empty($_POST['name'])
    || empty($_POST['family'])
    || empty($_POST['email'])
    || empty($_POST['pos'])
) {
    echo "Form is not submited correctly";
} else {
    $name = $_POST['name'];
    $family = $_POST['family'];
    $email = $_POST['email'];
    $pos = $_POST['pos'];
    $seasons = implode(',', $_POST['season']);
    $hours = implode(',', $_POST['hours']);

    $query = "INSERT INTO applications 
    (first_name, last_name, email, seasons, hours, position_id)
    VALUES ('" . $name . "', '" . $family . "', '" . $email . "', '" . $seasons . "', '" . $hours . "', '" . $pos . "')";

    $res = mysqli_query($con, $query);
    if ($res) {
        echo "Form submited successfully";
    } else {
        echo "res:" . mysqli_error($con);
    }
}
include 'includes/footer.php';
