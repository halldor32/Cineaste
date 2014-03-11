<?php

include '../init.php';

$aResponse['error'] = false;
$aResponse['message'] = '';

	echo $_SESSION['userID'];

if($_GET['rate']!='' && $_GET['movieID']!='' && $_SESSION['userID']!='')
 {
 	// if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'rating')
 	// {
 		/*
 		* vars
 		*/
 		$id = $_GET['movieID'];
 		$rate = $_GET['rate'];
 		$userID = $_SESSION['userID'];
		
 		 //YOUR MYSQL REQUEST HERE or other thing :)

 		if (rated_before($userID, $id, $pdo) === true) {

 			$query5 = $pdo->prepare("UPDATE `user_has_movies` SET `rating`=:rating WHERE userID = :userID AND movieID = :movieID");
   			$query5->execute(array(':rating' => $rate, ':userID' => $userID, ':movieID' => $id));
 		}
 		else
 		{
 			$query5 = $pdo->prepare("INSERT INTO `user_has_movies` (`userID`, `movieID`, `rating`) VALUES (:userID, :movieID, :rating)");
   			//$query5->execute(array(':userID' => $userID, ':movieID' => $id, ':rating' => $rate));
   			$query5->bindParam(':userID', $userID, PDO::PARAM_INT);
   			$query5->bindParam(':movieID', $id, PDO::PARAM_INT);
   			$query5->bindParam(':rating', $rate, PDO::PARAM_STR);
   			$query5->execute();

   		}

   		if (rating_success($userID, $id, $rate, $pdo) === true) {

   			$query6 = $pdo->prepare("SELECT AVG(rating) FROM user_has_movies WHERE movieID = :movieID");
            $query6->execute(array(':movieID' => $id));
            $average = $query6->fetchColumn();

            $query7 = $pdo->prepare("UPDATE `movies` SET `rating`=:rating WHERE movieID = :movieID");
            $query7->execute(array(':rating' => $average, ':movieID' => $id));

   			$success = true;
   		}
   		else
   		{
   			$success = false;
            echo 'asdasdasdasd';
   		}
		
		
 		// json datas send to the js file
 		if($success)
 		{
 			$aResponse['message'] = 'Your rating has been successfuly recorded. Thanks for your rate :)';
			
			
 			echo json_encode($aResponse);
 		}
 		else
 		{
 			$aResponse['error'] = true;
 			$aResponse['message'] = 'An error occured during the request. Please retry';
			
			
			
			
 			echo json_encode($aResponse);
 		}
 	// }
 	// else
 	// {
 	// 	$aResponse['error'] = true;
 	// 	$aResponse['message'] = '"action" post data not equal to \'rating\'';
		
		
 	// 	echo json_encode($aResponse);
 	// }
 }
 else
 {
 	$aResponse['error'] = true;
 	$aResponse['message'] = '$_POST[\'action\'] not found';
	
	
 	echo json_encode($aResponse);
 }



