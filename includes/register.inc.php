

  <!-- Main Page Content-->
  <div class="background-color-white">
  <div class="row">
    <div class="row">
      <div class="large-10 small-10 small-centered columns">

        <?php 


          $errors = array();
          $missing = array();
          if (isset($_POST['submit'])) {
                  $to = $_POST['email'];
                  $subject = 'asfdasf';
                  $expected = array('first_name','last_name','username','password','confirmPassword','email','captcha');
                  $required = array('username','password','confirmPassword','email','captcha');
                  require 'core/functions/processmail.php';

                  

                  if (empty($missing)) {
                  if ($_POST['password'] == $_POST['confirmPassword']) {
                   if ($_POST['captcha'] == 'four' || $_POST['captcha'] == 4) {
                     //include 'core/functions/register.php';
                     $register_data = array(
                      'firstname'  => $_POST['first_name'],
                      'lastname'   => $_POST['last_name'],
                      'username'    => $_POST['username'],
                      'user_password'    => $_POST['password'],
                      'email' => $_POST['email']
                      );

                    send_email($register_data['firstname'],$register_data['lastname'],$register_data['username'],$register_data['user_password'],$register_data['email'],$pdo);
                    
                   }
                   else
                   {
                    $message = '<div>Captcha error!</div>';
                   }
                  }
                  else{
                   $message = '<div>fail password</div>';
                  }
                  }
                  else{
                    $message = '<div>fail</div>';
                  }
                  //echo $message;
          }
   ?>
        <!-- Skráningarform -->
        <h5 class="text-center">Join <strong>Cineaste</strong></h5>
          <form action="" id="" name="" method="post">
            <!-- Nafn -->
            <div class="row"> 
            <div class="large-6 large-centered columns MarginBottom">
              <input type="text" placeholder="First Name" name="first_name" id="first_name">
            </div>
            </div>
            <!-- Nafn -->
            <div class="row">
            <div class="large-6 large-centered columns MarginBottom">
              <input type="text" name="last_name" placeholder="Last Name" id="last_name">
            </div>
            </div>
            <!-- NotandaNafn -->
            <div class="row">
            <div class="large-6 large-centered columns MarginBottom">
              <input type="text" name="username" placeholder="Username" id="username">
              <?php if ($missing && in_array('username', $missing))
                                echo '<p class="warning">Please enter an username</p>'; ?>
            </div>
            </div>
            <!-- Password -->
            <div class="row">
            <div class="large-6 large-centered columns MarginBottom">
              <span id="passwordS"></span>
              <input type="password" placeholder="Password" name="password" id="password">
              <?php if ($missing && in_array('password', $missing))
                                echo '<p class="warning">Please enter your password</p>'; ?>
            </div>
            </div>
            <!-- Confirm Password -->
            <div class="row">
            <div class="large-6 large-centered columns MarginBottom">
              <input type="password" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword">
              <?php if ($missing && in_array('confirmPassword', $missing))
                                echo '<p class="warning">Please repeat your password</p>'; ?>
            </div>
            </div>
            <div class="row">
            <div class="large-6 large-centered columns MarginBottom">
              <input type="email" placeholder="Email" name="email" id="email">
              <?php if ($missing && in_array('email', $missing))
                                echo '<p class="warning">Please enter your email</p>'; ?>
            </div>
            </div>
            <div class="row">
            <div class="large-6 large-centered columns MarginBottom">
              <input type="text" placeholder="one plus three is?" name="captcha" id="captcha">
              <?php if ($missing && in_array('captcha', $missing))
                                echo '<p class="warning">The captcha is not correct</p>'; ?>
            </div>
            </div>
            <div class="row">
            <div class="large-6 large-centered columns MarginBottom">
              <select name="dropdown" id="dropdown">
              <option value="0">What is your favourite movie</option>
                <?php 
                    $movie = get_movies($pdo);

                    foreach ($movie as $key => $value) { ?>
                      <option value="<?php echo $value['ID']; ?>"><?php echo $value['movie_name']; ?></option>
                    <?php }
                 ?>
              </select>
            </div>
            </div>
            <div class="center text-center"><input class="button small" type="submit" value="Skrá" onclick="save()" name="submit" id="signupBtn"></div>
          </form>
          <?php //} ?>
      </div>
  </div>
</div>
</div>
  <!-- End Main Page-->

  <!-- Footer ________________________________________________________________-->
  <?php
    //include('includes/overall/footer.php');
   ?>