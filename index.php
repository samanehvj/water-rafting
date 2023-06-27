<?php
include 'includes/functions.php';
include 'includes/head.php';
include 'includes/nav.php';
$con = connect();

$query = "SELECT * FROM services";
$service_res = mysqli_query($con, $query);

?>
<div id="welcome" class="hero d-flex align-items-center container-fluid ">
    <h2 class="ml-4 text-white">VICTORIA WHITE WATER RAFTING </h2>
    <a href="#career" class="btn btn-warning mx-3 order-lg-last" type="button">Apply Now</a>
</div>

<div class="container">

    <div class="row " id="package">
        <h2 class="col text-center py-4 mt-3 " style="font-size: 40px;font-family: anton;">Our Package</h2>
    </div>
    <div class=" row d-flex justify-content-around">

        <?php
        while ($service = mysqli_fetch_assoc($service_res)) {
        ?>
            <div class="flip-card ">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="imgs/service/<?= $service['image'] ?>" style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <h5><?= $service['name'] ?></h5>
                        <p><?= $service['description'] ?></p>
                        <p>$<?= $service['price'] ?></p>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

    </div>

    <div class="row" id="gallery">

        <h2 class="col text-center py-4 mt-3 " style="font-size: 40px;font-family: anton;">Our Gallery</h2>
    </div>

    <div class="row my-5">

        <div class="w-100">
            <div class="slideshow-container">
                <?php
                $query = "SELECT * FROM sliders";

                $sliders = mysqli_query($con, $query);

                while ($slide = mysqli_fetch_assoc($sliders)) {
                ?>
                    <div class="mySlides fading">
                        <img src="imgs/slide/<?= $slide['image'] ?>" style="width:100%">
                    </div>
                <?php
                }
                ?>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>


        </div>
    </div>







    <div class="row" id="about">
        <h2 class="col text-center py-4 mt-3 " style="font-size: 40px;font-family: anton;">About Us</h2>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <p class="card-text">Since 1980, Victoria White Water Rafting has been committed to offering B.C.’s finest rafting experience.
                Many generations of guides and over 250,000 rafters from all over the world have enjoyed our first class river rafting trips.
                Victoria White Water Raftingit’s recognised as one of Victoria’s best rafting companies, with one of the largest fleets in Canada.

                Making Victoria White Water Raftingan all year round rafting company, summer in British Columbia then in the southern hemisphere.
                The beautiful and exciting rivers we run have been carefully selected so you may experience them at their optimum water levels.</p>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM testimonials";
    $testimonial_res = mysqli_query($con, $query);
    ?>

    <div class="row" id="about">
        <h2 class="col text-center py-4 mt-3 " style="font-size: 40px;font-family: anton;">Testimonio</h2>
    </div>
    <div class="row">

        <?php
        while ($testimonial = mysqli_fetch_assoc($testimonial_res)) {
        ?>

            <div class="card col-lg-4  mt-5">
                <img src="imgs/tismo/<?= $testimonial['image'] ?>" style="width:355px;height:400px;">
                <div class="card-body">
                    <h5 class="card-title"><?= $testimonial['name'] ?></h5>
                    <p class="card-text"><?= $testimonial['quote'] ?></p>
                </div>
            </div>

        <?php
        }
        ?>
    </div>

    <div class="row" id="news">
        <h2 class="col text-center py-4 mt-3 " style="font-size: 40px;font-family: anton;">News</h2>
    </div>

    <div class="row">
        <div class="col-lg-4 py-4 mt-2">
            <?php
            $query = "SELECT * FROM news_categories WHERE id='1'";
            $news_cat_res = mysqli_query($con, $query);
            $fnews_cat = mysqli_fetch_assoc($news_cat_res);

            $query = "SELECT * FROM news WHERE category_id='1' LIMIT 3";
            $news_res = mysqli_query($con, $query);
            ?>
            <h3 class="col text-center">
                <?= $fnews_cat['title'] ?>
            </h3>
            <?php
            while ($fnews = mysqli_fetch_assoc($news_res)) {
            ?>

                <div class="card mb-2">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="imgs/news/<?= $fnews['image'] ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><small><?= $fnews['title'] ?></small></h5>
                                <p class="card-text"><small><?= substr($fnews['body'], 0, 100) ?></small></p>
                                <p class="card-text"><small class="text-muted"><?= $fnews['date'] ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-lg-4 py-4 mt-2">
            <?php
            $query = "SELECT * FROM news_categories WHERE id='2'";
            $news_cat_res = mysqli_query($con, $query);
            $wnews_cat = mysqli_fetch_assoc($news_cat_res);

            $query = "SELECT * FROM news WHERE category_id='2' LIMIT 1";
            $news_res = mysqli_query($con, $query);
            $wnews = mysqli_fetch_assoc($news_res);
            ?>
            <h3 class="col text-center">
                <?= $wnews_cat['title'] ?>
            </h3>
            <div class="card">
                <img src="imgs/news/<?= $wnews['image'] ?>" class="card-img-top" alt="<?= $wnews['title'] ?>">

                <div class="card-body">
                    <h5 class="card-title"><?= $wnews['title'] ?></h5>
                    <p class="card-text"><?= substr($wnews['body'], 0, 400) ?></p>
                    <p class="card-text"><small class="text-muted"><?= $wnews['date'] ?></small></p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 py-4 mt-2">
            <?php
            $query = "SELECT * FROM news_categories WHERE id='3'";
            $news_cat_res = mysqli_query($con, $query);
            $snews_cat = mysqli_fetch_assoc($news_cat_res);

            $query = "SELECT * FROM news WHERE category_id='3' LIMIT 1";
            $news_res = mysqli_query($con, $query);
            $snews = mysqli_fetch_assoc($news_res);
            ?>
            <h3 class="col text-center">
                <?= $snews_cat['title'] ?>
            </h3>
            <div class="card">
                <img src="imgs/news/<?= $snews['image'] ?>" class="card-img-top" alt="<?= $snews['title'] ?>">

                <div class="card-body">
                    <h5 class="card-title"><?= $snews['title'] ?></h5>
                    <p class="card-text"><?= substr($snews['body'], 0, 400) ?></p>
                    <p class="card-text"><small class="text-muted"><?= $snews['date'] ?></small></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="career">
        <h2 class="col text-center py-4 mt-3 " style="font-size:40px;font-family: anton;">Career Choices</h2>
    </div>

    <div class="row col-md-8 offset-md-2">
        <form onsubmit="return validate()" name="career" method="post" class="col-12" id="career-form" action="career.php">
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control required" id="name" placeholder="Your Name">
            </div>
            <span id="namelocation" style="color:red"></span>
            <div class="form-group">
                <label for="family">Family</label>
                <input name="family" type="text" class="form-control required" id="family" placeholder="Your Family">
            </div>
            <span id="familylocation" style="color:red"></span>
            <div class="form-group">
                <label for="Email">Email</label>
                <input name="email" type="email" class="form-control required" id="Email" placeholder="Your Email">
            </div>
            <span id="emaillocation" style="color:red"></span>

            <div class="form-group">
                <label for="pos">Position</label>
                <select name="pos" id="pos" class="custom-select">
                    <option value=0 selected>Select a position</option>
                    <?php
                    $query = "SELECT * FROM positions";
                    $pos_res = mysqli_query($con, $query);
                    while ($pos = mysqli_fetch_assoc($pos_res)) {
                    ?>
                        <option value="<?= $pos['id'] ?>"><?= $pos['title'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <span id="poslocation" style="color:red"></span>
            <div class="form-group">
                <label for="season">Seasons</label>
                <div id="season">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="check1">
                            <input type="checkbox" class="form-check-input" id="check1" name="season[]" value="1">Spring
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="season[]" value="2">Summer
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="check3">
                            <input type="checkbox" class="form-check-input" id="check3" name="season[]" value="3">Fall
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="check4">
                            <input type="checkbox" class="form-check-input" id="check4" name="season[]" value="4">Winter
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="Hours">Hours</label>
                <div id="Hours">
                    <div class="form-check-inline">
                        <label class="form-check-label" for="morning">
                            <input type="checkbox" class="form-check-input" id="morning" name="hours[]" value="1">Morning
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="afternoon">
                            <input type="checkbox" class="form-check-input" id="afternoon" name="hours[]" value="2">Afternoon
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="evening">
                            <input type="checkbox" class="form-check-input" id="evening" name="hours[]" value="3">Evening
                        </label>
                    </div>

                </div>
            </div>


            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
<script>
    startSlide();
</script>