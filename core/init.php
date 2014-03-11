<?php
// byrjar session
session_start();
//error_reporting(0);
$title = ucfirst(basename($_SERVER['SCRIPT_NAME'], '.php')); 

	require 'dbcon/dbcon.php';
	require 'functions/movies.php';
	require 'functions/tv_shows.php';
	require 'functions/general.php';
	require 'functions/users.php';
	require 'includes/PHPMailer-master/class.phpmailer.php';

// require 'functions/jRating.php';

// nær í upplýsingar um notandann ef notandi er skráður inn
if (logged_in() === true) {
	$session_user_id = $_SESSION['ID'];
	$user_data = user_data($session_user_id, 'ID', 'username', 'user_password', 'firstname', 'lastname', 'email', 'avatar');
}

// nær í upplýsingar um kvikmyndina ef það hefur id af henni
if (movie_isset() === true) {
	$get_movie_id = $_GET['m'];
	//$movie_data = movie_data($get_movie_id, 'movieID', 'name', 'genreID', 'rating', 'directorID', 'imageID', 'year', 'info');
	//$movie_data = legit_movie_data($get_movie_id, $pdo);
	$movie_data = movie_data($get_movie_id, 'ID', 'movie_name', 'CtCode', 'movie_year', 'description', 'background', 'poster', 'ageLimit');
	//echo $movie_data['image'];
}

if (tv_isset() === true) {
	$get_tv_id = $_GET['t'];
	$tv_data = tv_data($get_tv_id, 'ID', 'tv_name', 'tv_year', 'ctCode', 'description', 'ageLimit', 'poster', 'background');
}
	
$errors = array();
?>