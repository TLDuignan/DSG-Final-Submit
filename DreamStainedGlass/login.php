
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
   * Login User using post parameters.
   */
  if(isset($_POST['submit'])){
    
    //getting the post values
      $email = mysqli_real_escape_string($db_connect, $_POST['email']);
      $password = md5($_POST['password']);
      
      // select user from database
      $select = " SELECT * FROM users_usr WHERE email_usr = '$email' && password_usr = '$password' ";
      //run query
      $result = mysqli_query($db_connect, $select);
      //Validate user and direct to User Status
      if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            if($row['is_admin'] == 'yes'){

               $_SESSION['admin_id'] = $row['id_usr'];
               header('location:Admin/admin_dashboard.php');

            }elseif($row['is_admin'] == 'no'){

               $_SESSION['user_id'] = $row['id_usr'];
              //  echo "session: " . $_SESSION['user_name'] . "<br>";
              //  echo "username_usr: " . $row['username_usr'] . "<br>";
               header('location:Users/user_account.php');

            }
         
      }else{
         $error[] = 'Incorrect email or password!';
      }
      
   }

?>

<!-- Imported Public Header --> 
<?php include('private/shared/public_header.php') ?>
   
  <section class="my-5 py-5">
      <div class="container text-center">
        <h2>Log In</h2>
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
      <div id="login" class="container">
        <form action="login.php" method="post">
          <!-- input email -->
          <div class="form-group d-grid mx-auto text-center pt-2">
            <label for="login-email">Email</label>
            <input type="email" id="login-email" name="email" class="form-control my-2" required>
          </div>
          <!-- input password -->
          <div class="form-group d-grid mx-auto text-center pt-2">
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" class="form-control my-2" required>
          </div>
          <!-- submit -->
         <div class="form-group d-grid mx-auto">
           <input type="submit" name="submit" value="login now" class="g-btn" >
         </div>
          <p class="text-center mb-5">Don't have an account? <a href="signup.php">Signup here.</a></p>
        </form>
      </div>
  </section>
      
  <!-- Imported Public Footer --> 
  <?php include('private/shared/footer.php') ?>

