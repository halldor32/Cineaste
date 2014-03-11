<?php
//include '../init.php';

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
            header('Location: ../cineaste');
            exit();
        }
    }
    header('Location: ../cineaste');
    exit();
}
?>
<div class="background-color-white">
	<div class="row">
		<div class="large-6 large-centered columns">
          <form action="" method="post">
            <h5>Login</h5>
            <div class="large-12 columns">
              <!-- <label for="username">Username</label> -->
              <input type="text" placeholder="Username" name="username" id="username">
            </div>
            <div class="large-12 columns">
              <!-- <label for="password">Password</label> -->
              <input type="password" placeholder="Password" name="password" id="password">
            </div>
            <div class="center"><input class="button small" type="submit" value="Login" name="Submit" id="Submit"></div>
          </form>
      </div>
	</div>
</div>