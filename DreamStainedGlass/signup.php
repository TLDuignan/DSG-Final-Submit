
<?php
 /**
  * connect to database
  */
  include 'private/db_connection.php';
  /**
  * Assign User
  */
  session_start();
 /**
   * register User using post parameters.
   */
  if(isset($_POST['submit'])){
    //getting the post values
    $username = mysqli_real_escape_string($db_connect, $_POST['username']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    
    // find user from database
    $select = " SELECT * FROM users_usr WHERE email_usr = '$email' && password_usr = '$password' ";
    //run query
    $result = mysqli_query($db_connect, $select);
    //check for users and register if no existing users found.
    if(mysqli_num_rows($result) > 0){

        $error[] = 'This user already exist!';

    }else{

        if($password != $cpassword){
          $error[] = 'Passwords do not matched!';
        }else{
          $insert = "INSERT INTO users_usr(username_usr, email_usr, password_usr) VALUES('$username','$email','$password')";
          mysqli_query($db_connect, $insert);
          $result = mysqli_query($db_connect, "SELECT * FROM users_usr ORDER BY id_usr DESC LIMIT 1");
          $row = mysqli_fetch_assoc($result);
          $_SESSION['user_name'] = $row['username_usr'];

          header('location:signup_confirmation.php');
        }
    }

  }

?>

<!-- Imported Public Header --> 
<?php include('private/shared/public_header.php') ?>
<section class="my-5 py-5">
  <div class="container text-center">
    <h2>Become a member</h2>
     <hr>
  </div>
  <div id="login-error" class="container text-center my-3 error">
     <!-- Error message -->
    <?php
    if(isset($error)){
      foreach($error as $error){
          echo '<span class="error-msg">'.$error.'</span>';
      };
    };
    ?>
  </div>
  <div id="signup" class="container">
    <form action="signup.php" method="post">
      <!-- input username -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="signup-username">Username</label>
        <input type="text" id="signup-username" name="username" class="form-control my-2" required>
      </div>
      <!-- input email -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="signup-email">Email</label>
        <input type="email" id="signup-email" name="email" class="form-control my-2" required>
      </div>
      <!-- input password -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="signup-password">Password</label>
        <input type="password" id="signup-password" name="password" class="form-control my-2" required>
      </div>
      <!-- confirm password -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="signup-cpassword">Confirm Password</label>
        <input type="password" id="signup-cpassword" name="cpassword" class="form-control my-2" required>
      </div>
      <!-- submit form -->
      <div class="form-group col-4 d-grid mx-auto">
        <input type="submit" name="submit" value="Signup" class="g-btn">
      </div>
    
      <p class="text-center">Already have an account? <a href="login.php">login now</a></p>
    </form>

  </div>


</section>

<!-- Imported Public Footer --> 
<?php include('private/shared/footer.php') ?>
