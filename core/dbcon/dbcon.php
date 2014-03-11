
<?php
// tenging í gagnagrunninn
try{
	//  82.148.66.15  10.200.10.24  GRU_H5   foxyboxy1337
	$pdo = new PDO('mysql:host=82.148.66.15;dbname=2810962739_mb', '2810962739', 'fahrenheit');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->exec('SET NAMES "utf8"');

}

catch (PDOException $e){
	
	echo "tenging tókst ekki(dbcon)". "<br>" . $e->getMessage();
	exit();
}
 $status = "Tenging tókst";
?>