<?php 

$register_data = array(
                      'firstname'  => $_POST['first_name'],
                      'lastname'   => $_POST['last_name'],
                      'username'    => $_POST['username'],
                      'user_password'    => $_POST['password'],
                      'email' => $_POST['email']
                      );

                    //print_r($register_data);
                    //register_user($register_data, $pdo);
                    //header('Location: signup.php?success');
                    send_email($register_data['email'], $register_data['username']);



 ?>