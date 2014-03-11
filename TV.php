<?php 
  include 'core/init.php';
  include 'includes/overall/header.php';
 ?>

<?php include 'includes/nav.inc.php'; ?>

<div class="hide-for-medium-down">

<?php 
	if (!isset($_GET['t'])) {
		include 'includes/tvPagination.inc.php';
	}
	else
	{
		include 'includes/tvInfo.inc.php';
	}
	 ?>

 <?php include 'includes/ad.inc.php'; ?>

    <?php include 'includes/footer.inc.php'; ?>
 <?php include 'includes/overall/footer.php'; ?>
</div>