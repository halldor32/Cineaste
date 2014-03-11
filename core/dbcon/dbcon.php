
<?php
// tenging í gagnagrunninn
try{
	$pdo = new PDO('mysql:host=localhost;dbname=mb', 'root', '');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->exec('SET NAMES "utf8"');

}

catch (PDOException $e){
	
	echo "tenging tókst ekki(dbcon)". "<br>" . $e->getMessage();
	exit();
}
 $status = "Tenging tókst";
?>