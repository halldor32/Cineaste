<?php 
function output_errors($errors) {
	return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}

function output_as_li($li) {
	return '<li>' . implode('</li><li>', $li) . '</li>';
}

function send_email($firstname,$lastname,$username,$password,$email,$pdo){
            $mail             = new PHPMailer(); // defaults to using php "mail()"
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->SMTPAuth   = true; // SMTP authentication
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
            $mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
            $mail->Port       = 465; // SMTP Port
            $mail->Username   = "gamingcenternews@gmail.com"; // SMTP account username
            $mail->Password   = "Omgwtfbbq";        // SMTP account password
            $mail->From     = "gamingcenternews@gmail.com";
            $mail->FromName = "Cineaste";
            $mail->AddAddress("$email");
            $mail->Subject  = "Welcome to our website!";
            $mail->Body     = "Yo, $username";
            
            if (!$mail->Send()) {
                    echo '<p class="text-center error">Error, email has not been sent</p>';
            }
            else
            {
                    $register_data = array(
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'username' => $username,
                        'user_password' => $password,
                        'email' => $email
                        );
                    //echo '<p class="text-center error">Email has been sent</p>';
                    register_user($register_data, $pdo);
                      if (user_exists($register_data['username'], $pdo)) {
                        $login = login($register_data['username'], $register_data['user_password'], $pdo);
                        $_SESSION['ID'] = $login;
                        header('Location: ../../../cineaste');
                      }
                      else
                      {
                        echo 'You could not be registered.';
                      }
            }
        }






 ?>



