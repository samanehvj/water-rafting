<?php

function connect()
{
	// return mysqli_connect('localhost', 'samanehv_samane', 'Salamazizam12', 'samanehv_victoria_rafting');
	return mysqli_connect('localhost', 'root', 'root', 'victoria_rafting');
}

// $URL = 'http://www.samanehvj.com/Victoria/';
$URL = 'http://localhost:8888/victoria/';
$numPerPage = 5;

function pager($tableName, $numberPerPage, $condition)
{

	$numPerPage = $numberPerPage;
	$pageNumber = (isset($_GET["pageNum"])) ? $_GET["pageNum"] : 1;

	$con = connect();

	/* figure out how many pages I need */
	$sql = "SELECT COUNT(id) as numRecords FROM $tableName";

	if ($condition != null && $condition > 0) {
		$sql = $sql . " WHERE position_id ='" . $condition . "'";
	}

	$results_count = mysqli_query($con, $sql);
	$recordStats = mysqli_fetch_assoc($results_count); // returns the first row of my results
	$totalNum = $recordStats['numRecords'];
	$numPages = ceil($totalNum / $numPerPage); //

	echo '<ul class="pagination justify-content-center">';

	if ($pageNumber > 1) {
		echo '<li class="page-item"> <a class="page-link" href="applications.php?pageNum=' . ($pageNumber - 1) . '">Previous</a></li>';
	}

	for ($i = 1; $i <= $numPages; $i++) {
		$activeState = ($i == $pageNumber) ? "disabled" : "";
		echo '<li class="page-item"><a href="applications.php?pageNum=' . $i . '" class="page-link ' . $activeState . '">' . $i . '</a> </li>';
	}

	if ($pageNumber != $numPages) {
		echo '<li class="page-item"> <a class="page-link" href="applications.php?pageNum=' . ($pageNumber + 1) . '">Next</a>';
	}

	echo '</ul>';
}
