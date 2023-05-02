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
    $is_admin = mysqli_real_escape_string($db_connect, $_POST['is_admin']);

    //update database
    $update = "UPDATE users_usr SET email_usr='$email', username_usr='$username', password_usr='$password', is_admin='$is_admin' WHERE id_usr='$user_id'"; 

    //run query
    $run_update = mysqli_query($db_connect, $update);

    //check if code excuted correctly and send message.     
    if($run_update) {
      $_SESSION['message'] = "User update successful.";
      header('location:users_edit.php');
      exit(0);
  
    }else{
      $_SESSION['message'] = "User not updated.";
      header('location:users_edit.php');
      exit(0);
    }

  } 
?>

<!-- Imported Public Header --> 
<?php include('../private/shared/admin_header.php')?>

<section class="my-5 py-5">
  <div class="container text-center">
    <h2>Edit User</h2>
  </div>

  <div class="container">
    <a class="g-btn" href="users.php">Go back to table</a>
    <hr>
  </div>


  <div id="crud-error" class="container text-center my-3 error">
    <!-- Display error message -->
    <?php include('message.php'); ?>
  </div>

  <div id="signup" class="container">

    <?php 
      /**
       * check is user exists.
       */
      if (isset($_GET['id']))
      {
        $user_id = mysqli_real_escape_string($db_connect, $_GET['id']);
        $select = "SELECT * FROM users_usr WHERE id_usr='$user_id' ";
        $run_select = mysqli_query($db_connect, $select);

        if(mysqli_num_rows($run_select) > 0) {
            $users = mysqli_fetch_array($run_select);
          
    ?>
    <form action="users_edit.php" method="post">
          <!-- input id -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <input type="hidden" name="user_id" value="<?=$users['id_usr']; ?>">
      </div>
            <!-- input username -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="edit_username">Username</label>
        <input type="text" name="username" id="edit_username" value="<?=$users['username_usr']; ?>" class="form-control my-2" required>
      </div>
            <!-- input user email -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="edit_email">Email</label>
        <input type="email" name="email" id="edit_email" value="<?=$users['email_usr']; ?>" class="form-control my-2" required>
      </div>
          <!-- input user password -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="edit_password">Password</label>
        <input type="password" name="password" id="edit_password" value="" class="form-control my-2" required>
      </div>
          <!-- input user comfirmed password -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="edit_cpassword">Confirm Password</label>
        <input type="password" name="cpassword" id="edit_cpassword" value="" class="form-control my-2" required>
      </div>
          <!-- input user admin status -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <p>Is Admin</p>
        <label for="edit_is_admin_no">No</label>
        <input type="radio" id="edit_is_admin_no" name="is_admin" value="no" required>

        <label for="edit_is_admin_yes">Yes</label>
        <input type="radio" id="edit_is_admin_yes" name="is_admin" value="yes" required>
      </div>
          <!-- submit form -->
      <div class="form-group col-4 d-grid mx-auto">
        <input type="submit" name="update" value="Update" class="g-btn">
      </div>
    </form>
    <?php

        }else{
          // user not found message
          echo "<h4> No Such User Found</h4>";
        }
      } 
    ?>
  </div>
</section>

<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>
