<div class="d-flex justify-content-around bg-warning" style="font-size: 20px;font-family: anton;"><span> 1212-Victoria st, Victoria BC</span> <span>250-222-3333</span></div>

<div class="d-none d-lg-block col-12 "><img src="imgs/logo.png" class="mx-auto d-none d-lg-block" width="150" height="150" alt="Victoria Rafitnf Logo"></div>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img src="imgs/logo.png" class="d-lg-none" width="130" height="100" alt="Victoria Rafting Logo">
  </a>
  <a href="#career" class="btn d-lg-none align-middle btn-info ml-auto mr-3" type="button">Apply Now</a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#welcome">Welcome</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#package">Package</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#gallery">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#news">News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#career">Career</a>
      </li>

      <li class="nav-item">


        <?php
        if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] == false) {
        ?>
          <a class="nav-link " href="login.php">Login</a>
        <?php
        } else {
        ?>
          <a class="nav-link " href="logout.php">Logout</a>
        <?php
        }
        ?>
      </li>
    </ul>
  </div>
</nav>