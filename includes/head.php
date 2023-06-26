<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Victoria White Water Rafting - <?= ucwords(basename($_SERVER['PHP_SELF'], ".php"), " ") ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<base href="<?= $URL ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="manifest" href="/site.webmanifest">

</head>

<body>