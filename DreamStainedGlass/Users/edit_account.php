<?php
  /**
   * connect to database
   */
  @include '../private/db_connection.php';  

  /**
   * Admin only
   */
  session_start();

  if(!isset($_SESSION['user_id'])){
    header('location:../login.php');
 }
 /**
   * Edit record.
   */
  if(isset($_POST['update'])){
    /**
     * set parameters
     */
    $user_id = mysqli_real_escape_string($db_connect, $_POST['user_id']);
    $username = mysqli_real_escape_string($db_connect, $_POST['username']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    //update database
    $update = "UPDATE users_usr SET email_usr='$email', username_usr='$username', password_usr='$password' WHERE id_usr='$user_id'"; 

    //run query
    $run_update = mysqli_query($db_connect, $update);

    //check if code excuted correctly and send message.     
    if($run_update) {
      $_SESSION['message'] = "Account update successful.";
      header('location:edit_account.php');
      exit(0);
  
    }else{
      $_SESSION['message'] = "Account not updated.";
      header('location:edit_account.php');
      exit(0);
    }

  } 
?>

<!-- Imported Public Header --> 
<?php include('../private/shared/user_header.php')?>

<section class="my-5 py-5">
      <?php 
       /**
         * Get user information.
         */
        $current_user = $_SESSION['user_id'];
       $user_info= "SELECT * FROM users_usr WHERE id_usr = '$current_user' ";

       $run_select = mysqli_query($db_connect, $user_info);

       if(mysqli_num_rows($run_select) > 0) {
          while($row = mysqli_fetch_array($run_select)) {
            //  print_r($row['username_usr']);
          
      
      ?>
  <div class="container text-center">
    <h2>Edit Account for <br> <?php echo $row['username_usr'] ?></h2>
  </div>
  <div class="container">
    <a class="g-btn" href="user_account.php">Go back to Account</a>
    <hr>
  </div>
  <div id="crud-error" class="container text-center my-3 error">
    <!-- Display error message -->
    <?php include('../Admin/message.php'); ?>
</div>

  <div class="container">
    <form action="edit_account.php" method="post">
          <!-- input id -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <input type="hidden" name="user_id" value="<?php echo $row['id_usr'] ?>">
      </div>
            <!-- input username -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="edit-username">Username</label>
        <input type="text" id="edit-username" name="username" value="<?php echo $row['username_usr'] ?>" class="form-control my-2" required>
      </div>
            <!-- input user email -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="edit-email">Email</label>
        <input type="email" id="edit-email" name="email" value="<?php echo $row['email_usr'] ?>" class="form-control my-2" required>
      </div>
          <!-- input user password -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="edit-password">Password</label>
        <input type="password" id="edit-password" name="password" class="form-control my-2" required>
      </div>
          <!-- input user comfirmed password -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="edit-cpassword">Confirm Password</label>
        <input type="password" id="edit-cpassword" name="cpassword" class="form-control my-2" required>
      </div>
          <!-- submit form -->
      <div class="form-group col-4 d-grid mx-auto">
        <input type="submit" name="update" value="Update" class="g-btn">
      </div> 
    </form>
    <?php

        }
      }

    ?>
  </div>


</section>

<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>
