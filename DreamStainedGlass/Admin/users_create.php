<?php
   /**
  * connect to database
  */
  include '../private/db_connection.php';
  /**
  * Admin only
   */
  session_start();

  if(!isset($_SESSION['admin_id'])){
    header('location:../login.php');
   }

  /**
   * Create record using post parameters.
   */
  if(isset($_POST['submit'])){

    //getting the post values
    $username = mysqli_real_escape_string($db_connect, $_POST['username']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $is_admin = mysqli_real_escape_string($db_connect, $_POST['is_admin']);

    /**
   * Create errorsuccess messages.
   */

    if(mysqli_num_rows($result) > 0){
       // show errors for existing member
      $_SESSION['message'] = "This user already exists.";
      header('location:users_create.php');
      exit(0);
      
    }else{
       // show errors for non matching passwords
      if($password != $cpassword){
        $_SESSION['message'] = "Passwords do not match.";
        header('location:users_create.php');
        exit(0);
      }else{
         // inserting new user into database
        $insert = "INSERT INTO users_usr(username_usr, email_usr, password_usr, is_admin) VALUES('$username','$email','$password', '$is_admin')";
      }
    }  

     /**
   * Create error and success messages.
   */

    $result = mysqli_query($db_connect, $insert);
    if($result){
      $_SESSION['message'] = "New user successfully created.";
      header('location:users_create.php');
      exit(0);

    }else{
      $_SESSION['message'] = "New user not created.";
      header('location:users_create.php');
      exit(0);
    }
    
  }

?>



<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header --> 

<section>
  <div class="container pt-5 mt-5">
    <h2 class="text-center">Create User</h2>
    <div>
      <a class="g-btn m-3" href="users.php">Go Back</a>
    </div>
     <hr>
  </div>

  <!-- Display error message -->
  <?php include('message.php') ?>
  
  <div id="signup" class="container">
    <form action="users_create.php" method="post">
      <!-- input username -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="create_username">Username</label>
        <input type="text" name="username" id="create_username" class="form-control my-2" required>
      </div>
         <!-- input email -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="create_user_email">Email</label>
        <input type="email" name="email" id="create_user_email" class="form-control my-2" required>
      </div>
       <!-- input password -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="create_user_password">Password</label>
        <input type="password" name="password" id="create_user_password" class="form-control my-2" required>
      </div>
        <!-- input confirm password -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="create_cpassword">Confirm Password</label>
        <input type="password" name="cpassword" id="create_cpassword" class="form-control my-2" required>
      </div>
        <!-- input admin status -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <p>Is Admin</p>
        <label for="is_admin_no">No</label>
        <input type="radio" id="is_admin_no" name="is_admin" value="no" required>

        <label for="is_admin_yes">Yes</label>
        <input type="radio" id="is_admin_yes" name="is_admin" value="yes" required>
      </div>
      <!-- submit form -->
      <div class="form-group col-4 d-grid mx-auto">
        <input type="submit" name="submit" value="Create" class="g-btn">
      </div>
    </form>

  </div>


</section>

<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>