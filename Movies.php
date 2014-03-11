<?php 
  include 'core/init.php';
  include 'includes/overall/header.php';
 ?>

<?php include 'includes/nav.inc.php'; ?>

<div class="hide-for-medium-down">
	<?php 
	if (!isset($_GET['m'])) {
		include 'includes/moviePagination.inc.php';
	}
	else
	{
		include 'includes/movieInfo.inc.php';
	}
	 ?>

  	<?php include 'includes/ad.inc.php'; ?>

    <?php include 'includes/footer.inc.php'; ?>

</div> 
<?php include 'includes/overall/footer.php'; ?>