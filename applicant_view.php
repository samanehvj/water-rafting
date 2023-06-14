<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] == false) {
    header("location: login.php");
}

include 'includes/functions.php';
include 'includes/head.php';
include 'includes/nav.php';
$con = connect();

?>



<h3>Here is list </h3>
<div class="alert alert-success" role="alert">
    <?php

    if (isset($_GET['id'])) {
        $query = "select * from applications where id=" . $_GET['id'];

        $res = mysqli_query($con, $query);

        $applicant = mysqli_fetch_assoc($res);

        $query = "SELECT * FROM positions WHERE id=" . $applicant['position_id'];
        $pos_res = mysqli_query($con, $query);
        $pos = mysqli_fetch_assoc($pos_res);

        $hours = explode(',', $applicant['hours']);
        $seasons = explode(',', $applicant['seasons']);

        $i = 0;
        $available_seasons = '';
        while (isset($seasons[$i])) {
            if ($seasons[$i] == 1) {
                $available_seasons = $available_seasons . " Spring, ";
            }

            if ($seasons[$i] == 2) {
                $available_seasons = $available_seasons . " Summer, ";
            }

            if ($seasons[$i] == 3) {
                $available_seasons = $available_seasons . " Fall, ";
            }

            if ($seasons[$i] == 3) {
                $available_seasons = $available_seasons . " Winter ";
            }

            $i++;
        }

        $i = 0;
        $available_hours = '';
        while (isset($hours[$i])) {
            if ($hours[$i] == 1) {
                $available_hours = $available_hours . " Morning, ";
            }

            if ($hours[$i] == 2) {
                $available_hours = $available_hours . " Afternoon, ";
            }

            if ($hours[$i] == 3) {
                $available_hours = $available_hours . " Evening ";
            }

            $i++;
        }

    ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $applicant['first_name'] . " " . $applicant['last_name'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $applicant['email'] ?></h6>
                <p class="card-text">Available Seasons: <?= $available_seasons ?></p>
                <p class="card-text">Available Hours: <?= $available_hours ?></p>
                <a href="mailto:<?= $applicant['email'] ?>" class="card-link">Send email to <?= $applicant['first_name'] . " " . $applicant['last_name'] ?></a>

            </div>
        </div>
    <?php
    }
    ?>
</div>