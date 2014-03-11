<?php

function tv_data($tvID)
{
	try{
	//  82.148.66.15   10.200.10.24   GRU_H5   foxyboxy1337
	$pdo = new PDO('mysql:host=82.148.66.15;dbname=2810962739_mb', '2810962739', 'fahrenheit');

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

function random_tv($pdo)
{
	$query3 = $pdo->prepare("SELECT ID FROM tv_shows ORDER BY RAND() LIMIT 1");
	$query3->execute();
	return $query3->fetchColumn();
}

function tv_isset()
{
	return (isset($_GET['t'])) ? true : false;
}

function get_tv_ageLimit($tvID, $pdo) {
	$query2 = $pdo->prepare("SELECT age_limit FROM age_limit WHERE ID = ?");
	$query2->bindValue(1, $tvID);
	$query2->execute();
	return $query2->fetchColumn();
}

function get_country_from_tv($CtCode, $pdo) {
	$query2 = $pdo->prepare("SELECT CtName FROM countries WHERE CtCode = ?");
	$query2->bindValue(1, $CtCode);
	$query2->execute();
	return $query2->fetchColumn();
}

function get_genre_for_tv($tvID, $pdo) {
	$query2 = $pdo->prepare("SELECT genre_Name FROM genre JOIN tv_has_genre ON genre.ID=tv_has_genre.genreID JOIN tv_shows ON tv_has_genre.tvID=tv_shows.ID WHERE tv_shows.ID = ?");
	$query2->bindValue(1, $tvID);
	$query2->execute();
	return $query2->fetchAll();
}
?>