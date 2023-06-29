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

$query = "SELECT * FROM applications";
$condition = 0;



if (isset($_GET['pos']) && $_GET['pos'] != 0) {
    $query = $query . " WHERE position_id='" . $_GET['pos'] . "'";
    $condition = $_GET['pos'];
}

if (isset($_GET['sort'])) {
    $query = $query . " ORDER BY " . $_GET['sort'] . " ASC";
} else {
    $query = $query . " ORDER BY id DESC";
}

$pageNumber = (isset($_GET["pageNum"])) ? $_GET["pageNum"] : 1;
$startingRecord = ($pageNumber * $numPerPage) - $numPerPage;

$query = $query . " LIMIT $startingRecord, $numPerPage";

$applicants_results = mysqli_query($con, $query);
if (isset($_GET['success'])) {
    echo "<div class='alert alert-success' role='alert'>
    applicants Deleted Successfully!
  </div>";
} elseif (isset($_GET['error'])) {
    echo "<div class='alert alert-danger' role='alert'>
    applicants Can not delete !
    </div>";
}

?>
<div class="container">

    <form class="form-inline my-5" action="" method="get">
        <div class="form-group">
            <label for="pos">Filter by Position </label>
            <select name="pos" id="pos" class="custom-select mx-2">
                <option value=0 selected>All position</option>
                <?php
                $query = "SELECT * FROM positions";
                $pos_res = mysqli_query($con, $query);
                while ($pos = mysqli_fetch_assoc($pos_res)) {
                    $checked = '';
                    if (isset($_GET['pos']) && $_GET['pos'] == $pos['id']) {
                        $checked = 'selected';
                    }
                ?>
                    <option value="<?= $pos['id'] ?>" <?= $checked ?>><?= $pos['title'] ?></option>
                <?php
                }
                ?>
            </select> <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>
    <table class="table table-striped table-responsive-md">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><a href='applications.php?sort=last_name'>Name</a><i class="fa fa-fw fa-sort"></i></th>
                <th scope="col"><a href='applications.php?sort=position_id'>Position</a><i class="fa fa-fw fa-sort"></i></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($applicants = mysqli_fetch_assoc($applicants_results)) {
            ?>
                <tr>
                    <th scope="row"><?= $i ?></th>

                    <td>
                        <a href="applicant_view.php?id=<?= $applicants['id'] ?>">
                            <?= $applicants['first_name'] . " " . $applicants['last_name'] ?>
                        </a>
                    </td>
                    <td>
                        <?php
                        $query = "SELECT * FROM positions WHERE id='" . $applicants['position_id'] . "'";
                        $pos_res = mysqli_query($con, $query);
                        $pos = mysqli_fetch_assoc($pos_res);
                        echo $pos['title'];
                        ?>
                    </td>


                </tr>
            <?php
                $i++;
            }
            ?>

        </tbody>
    </table>

    <?= pager('applications', $numPerPage, $condition) ?>
</div>

<?php
include 'includes/footer.php';
?>