<?php

function tv_data($tvID)
{
	try{
	$pdo = new PDO('mysql:host=localhost;dbname=mb', 'root', '');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->exec('SET NAMES "utf8"');

	}

	catch (PDOException $e){
	
	echo "tenging tókst ekki(tv_shows)". "<br>" . $e->getMessage();
	exit();
	}
	// skilgreina breitur
	$data = array();
	$tvID = (int)$tvID;
	// nær í breiturnar sem fóru í gegnum functionið
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	// ef fjöldi breita sem er náð í er meira en 1 þá nær það í allar upplýsingar sem voru skilgreindar
	if ($func_num_args > 1)
	{
		unset($func_get_args[0]);
		// implode'ar inn í select skipunina
		$fields = implode(', ', $func_get_args);
		$query = $pdo->prepare("SELECT $fields FROM tv_shows WHERE ID = ?");
		$query->bindValue(1, $tvID);
		$query->execute();
		// nær í array af öllum upplýsingum um myndina
		$data = $query->fetch(PDO::FETCH_ASSOC);

		
		return $data;
	}
}
// nær í random þátt
function random_tv($pdo)
{
	$query3 = $pdo->prepare("SELECT ID FROM tv_shows ORDER BY RAND() LIMIT 1");
	$query3->execute();
	return $query3->fetchColumn();
}
// gáir hvort þátturinn er í get
function tv_isset()
{
	return (isset($_GET['t'])) ? true : false;
}
// nær í agelimit úr þætti
function get_tv_ageLimit($tvID, $pdo) {
	$query2 = $pdo->prepare("SELECT age_limit FROM age_limit WHERE ID = ?");
	$query2->bindValue(1, $tvID);
	$query2->execute();
	return $query2->fetchColumn();
}
// nær í landið sem þátturinn er gerður í
function get_country_from_tv($CtCode, $pdo) {
	$query2 = $pdo->prepare("SELECT CtName FROM countries WHERE CtCode = ?");
	$query2->bindValue(1, $CtCode);
	$query2->execute();
	return $query2->fetchColumn();
}
// nær í tegund þáttar
function get_genre_for_tv($tvID, $pdo) {
	$query2 = $pdo->prepare("SELECT genre_Name FROM genre JOIN tv_has_genre ON genre.ID=tv_has_genre.genreID JOIN tv_shows ON tv_has_genre.tvID=tv_shows.ID WHERE tv_shows.ID = ?");
	$query2->bindValue(1, $tvID);
	$query2->execute();
	return $query2->fetchAll();
}
// bætir ljósmyndum við þáttinn
function add_tv_images($tv_id,$path,$filename){
	$path = $path . $filename;
	global $pdo;
	$query = $pdo->prepare('INSERT INTO tv_images (tv_ID, path) VALUES (?,?)');
	$query->bindValue(1,$tv_id);
	$query->bindValue(2,$path);
	$query->execute();
}
// nær í ID frá nafninu á þættinum
function get_show_from_name($name){
	global $pdo;
	$query = $pdo->prepare('SELECT ID FROM tv_shows WHERE tv_name = ?');
	$query->bindValue(1,$name);
	$query->execute();
	return $query->fetchColumn();
}
// nær í myndir frá þætti
function get_images_from_show($id) {
	global $pdo;
	$query = $pdo->prepare('SELECT path FROM tv_shows JOIN tv_images ON tv_shows.ID=tv_images.tv_ID WHERE tv_images.tv_ID = ?');
	$query->bindValue(1,$id);
	$query->execute();
	return $query->fetchAll();
}

?>