<?php
if (isset( $_SERVER['HTTP_X_REQUESTED_WITH'] )) {
	include('../init.php');
	// gáir hvort suerID comment og postid er tómt eða ekki
	if (!empty($_SESSION['userID']) && !empty($_POST['comment']) && !empty($_POST['postid'])) {

		$userID = $_SESSION['userID'];
		$movieID = $_POST['postid'];
		$comment = $_POST['comment'];
		$name = $user_data['first_name'] . ' ' . $user_data['last_name'];

		//gáir hvort notandi hefur gefið einkunn áður og updatar ef svo er og insertar ef ekki
		if (rated_before($userID, $movieID, $pdo) === true) {

 			$query5 = $pdo->prepare("UPDATE `user_has_movies` SET `review`=:review WHERE userID = :userID AND movieID = :movieID");
   			$query5->execute(array(':review' => $comment, ':userID' => $userID, ':movieID' => $movieID));
 		}
 		else
 		{
 			$query5 = $pdo->prepare("INSERT INTO `user_has_movies` (`userID`, `movieID`, `review`) VALUES (:userID, :movieID, :review)");
   			$query5->bindParam(':userID', $userID, PDO::PARAM_INT);
   			$query5->bindParam(':movieID', $movieID, PDO::PARAM_INT);
   			$query5->bindParam(':review', $comment, PDO::PARAM_STR);
   			$query5->execute();
   		}
		
	}
?>

<div class="comment-item">
	<div class="comment-post">
		<h3><?php echo $name ?> <small>sagði....</small></h3>
		<p><?php echo $comment ?></p>
	</div>
</div>

<?php
 }
?>