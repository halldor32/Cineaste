<?php
include '../init.php';

//skráir notanda inn
if (empty($_POST) === false) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];

    if (empty($username) === true || empty($password) === true) { 
    	$errors[] = 'You need to enter a username and password';
    } 
    else if (user_exists($username, $pdo) === false)
    {
    	$errors[] = 'Þetta notendanafn er ekki til. Hefur þú skráð þig?';
    }
    else
    {
        $login = login($username, $password, $pdo);
        if ($login === false)
        {
            $errors[] = 'That username/password combo is incorrect';

        }
        else
        { 
            $_SESSION['ID'] = $login;
            header('Location: ../../');
            exit();
        }
    }
    header('Location: ../../');
    exit();
}
?>