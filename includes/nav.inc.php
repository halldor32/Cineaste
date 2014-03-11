<div class="grey-navbar hide-for-medium-down">
<nav class="top-bar top-bar-width" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1><a href="../cineaste">Cineaste</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="right">
      <!-- <li class="active"><a href="#">Right Button Active</a></li> -->
      <?php if (logged_in() == true) { ?>
          <li class="has-dropdown">
        <a href=""><img class="nav-avatar" src="images/avatar/<?php echo $user_data['avatar'] ?>" /> <?php echo $user_data['username']; ?></a>
        <ul class="dropdown">
          <li><a href="#">Settings</a></li>
          <li class="divider"></li>
          <li><a href="signOut.php">Sign Out</a></li>
        </ul>
      </li>
      <?php } else { ?>
    <li class="greenNavButton"><a href="Register.php">Join <strong>Cineaste</strong></a></li>
    <li><a href="Login.php" <?php if ($title == 'Login') { echo 'class="navBack"'; } ?> >Login</a></li>
    <?php } ?>
    </ul>

    <ul class="left">
      <li><a href="Cinema.php" <?php if($title == 'Cinema') { echo 'class="navBack"'; } ?> >Cinema</a></li>
      <li><a href="TV.php" <?php if ($title == 'TV') { echo 'class="navBack"'; } ?> >TV</a></li>
      <li><a href="Movies.php" <?php if ($title == 'Movies') { echo 'class="navBack"'; } ?> >Movies</a></li>
      <li><a href="Lists.php" <?php if ($title == 'Lists') { echo 'class="navBack"'; } ?> >Lists</a></li>
    </ul>
  </section>
</nav>
</div>

<?php 
  if (isset($_GET['m']) == true && $title == 'Movies') { 
    
    $blue_nav_text = $movie_data['movie_name']; 

  }
  else if (!isset($_GET['m']) == true && $title == 'Movies' && !isset($_GET['order']) == true) {
    $blue_nav_text = $title;
  }
  else if (!isset($_GET['m']) == true && $title == 'Movies' && isset($_GET['order']) == true) {
    $blue_nav_text = $title . ' >> ' . $_GET['order'];
  }
  else if (isset($_GET['t']) == true && $title == 'TV')
  {
    $blue_nav_text = $tv_data['tv_name'];
  }
  else if (!isset($_GET['t']) == true && $title == 'TV') {
    $blue_nav_text = $title;
  }
  else
  {
    $blue_nav_text = "";
  }
 ?>

<div class="blue hide-for-medium-down">
  <div class="row top-bar-width">
    <div class="large-6 nav-height columns">
      <p class="info"><?php echo $blue_nav_text; ?></p>
    </div>
    <div class="large-offset-1 large-5 nav-height columns">
      
          <form>
            <div class="row collapse topHeight paddingSide">
              <div class="large-12 columns">
                <input type="text" placeholder="Search for Movie or TV show" autocomplete="off" id="search" class="">
                <ul id="results" class="dropdown"></ul>
              </div>
            </div>
          </form>

    </div>
  </div>
</div>



<!-- --------------------------- -->


<div class="off-canvas-wrap show-for-medium-down">
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
      </section>

      <section class="middle tab-bar-section">
        <h1 class="title"><a href="../cineaste">Cineaste</a></h1>
      </section>

    </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li><label>Cineaste</label></li>
        <li><input type="text" placeholder="Search for a Movie or TV show" autocomplete="off" id="search" class="margin-null"></li>
        <li><a href="Cinema.php">Cinema</a></li>
        <li><a href="TV.php">TV</a></li>
        <li><a href="Movies.php">Movies</a></li>
        <li><a href="Lists.php">Lists</a></li>
        <li><label>Full Name</label></li>
        <li><a href="#">Settings</a></li>
        <li><a href="signOut.php">Sign Out</a></li>
      </ul>
    </aside>

    <section class="main-section">

      <?php  

      if ($title == 'Index') {
        include 'includes/tour.inc.php';
        include 'includes/whatYouGet.inc.php';
        include 'includes/indexRandom.inc.php';
        include 'includes/footer.inc.php';
      }
      else if ($title == 'Cinema') {
        include 'includes/footer.inc.php';
      }
      elseif ($title == 'TV') {
        include 'includes/moviePagination.inc.php';
        include 'includes/footer.inc.php';
      }
      elseif ($title == 'Movies') {
        include 'includes/movieInfo.inc.php';
        include 'includes/moviePagination.inc.php';
        include 'includes/footer.inc.php';
      }
      elseif ($title == 'Lists') {
        include 'includes/footer.inc.php';
      }

      ?>

    </section>
 <a class="exit-off-canvas"></a>
</div>
</div>