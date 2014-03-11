<?php 
// Skráir notanda
function register_user($register_data, $pdo) {
	$register_data['user_password'] = md5($register_data['user_password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';

	$query5 = $pdo->prepare("INSERT INTO `user` ($fields) VALUES (?,?,?,?,?)");
	$query5->bindValue(1, $register_data['firstname']);
	$query5->bindValue(2, $register_data['lastname']);
	$query5->bindValue(3, $register_data['username']);
	$query5->bindValue(4, $register_data['user_password']);
	$query5->bindValue(5, $register_data['email']);
	$query5->execute();
}

// nær í upplýsingur um notanda
function user_data($userID)
{
	try{
																																						$pdo = new PDO('mysql:host=localhost;dbname=mb', 'root', '');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->exec('SET NAMES "utf8"');

	}

	catch (PDOException $e){
	
	echo "tenging tókst ekki". "<br>" . $e->getMessage();
	exit();
	}

	$data = array();
	$userID = (int)$userID;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if ($func_num_args > 1)
	{
		unset($func_get_args[0]);

		$fields = implode(', ', $func_get_args);
		$query4 = $pdo->prepare("SELECT $fields FROM user WHERE ID = ?");
		$query4->bindValue(1, $userID);
		$query4->execute();
		$data = $query4->fetch(PDO::FETCH_ASSOC);

		
		return $data;
	}

}
// sér hvort notandi er skráður inn
function logged_in()
{
	return (isset($_SESSION['ID'])) ? true : false;
}
// sér hvort notandi er til 
function user_exists($username, $pdo) {
	
	$query2 = $pdo->prepare("SELECT COUNT(ID) FROM user WHERE username = ?");
	$query2->bindValue(1, $username);
	$query2->execute();
	return ($query2->fetchColumn() == 1) ? true : false;
}
// nær í userID frá username
function user_id_from_username($username, $pdo)
{

	$query2 = $pdo->prepare("SELECT ID FROM user WHERE username = ?");
	$query2->bindValue(1, $username);
	$query2->execute();
	return $query2->fetchColumn();
}
// sendir userID ef COUNT(userID) er 1
function login($username, $password, $pdo)
{
	$userID = user_id_from_username($username, $pdo);

	$password = md5($password);

	$query3 = $pdo->prepare("SELECT COUNT(ID) FROM user WHERE username = ? AND user_password = ?");
	$query3->bindValue(1, $username);
	$query3->bindValue(2, $password);
	$query3->execute();
	return ($query3->rowCount() == 1) ? $userID : false;

}
// breytir um nafn notenda
function change_name($first_name, $last_name, $userID, $pdo) {
	$query5 = $pdo->prepare("UPDATE `user` SET `first_name` = :first_name, `last_name` = :last_name WHERE userID = :userID");
	$query5->execute(array(':first_name' => $first_name, ':last_name' => $last_name, ':userID' => $userID));
}
// breytir um lykilorð
function change_password($oldPassword, $newPassword, $userID, $pdo) {
	$query5 = $pdo->prepare("UPDATE `user` SET `password` = :password WHERE userID = :userID AND password = :oldPassword");
	$query5->execute(array(':password' => $newPassword, ':userID' => $userID, ':oldPassword' => $oldPassword));
}



 ?>