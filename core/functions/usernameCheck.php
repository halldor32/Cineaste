<?php
// dbcon
try{
	$pdo = new PDO('mysql:host=localhost;dbname=mb', 'root', '');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->exec('SET NAMES "utf8"');

}

catch (PDOException $e){
	
	echo "tenging tókst ekki". "<br>" . $e->getMessage();
	exit();
}


// ná í search
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);

// gá hvort stengurinn sé meira en 1 á lengd
if (strlen($search_string) >= 1 && $search_string !== ' ') {
	
	// Leita í gagnagrunninum
		$query = $pdo->prepare("SELECT * FROM user WHERE username LIKE '%".$search_string."%' LIMIT 1");
		$query->execute();
		if ($query->fetchColumn() == 1)
		{
			echo 'This username is taken';
		}
		else
		{

		}


		
}
?>