<?php

$currentTime = time();
if ($_SESSION['timestamp'] + 3600000 < $currentTime) {
 header('Location: signOut.php');
}
else{
 $_SESSION['timestamp'] = $currentTime;
}

?>