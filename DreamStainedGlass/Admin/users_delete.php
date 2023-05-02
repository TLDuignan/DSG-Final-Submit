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
  * Delete record using post parameters.
  */
  if(isset($_POST['delete'])) {
    //getting the post values
    $user_id = mysqli_real_escape_string($db_connect, $_POST['user_id']);
    
    // delete from database
    $delete = "DELETE FROM users_usr WHERE id_usr='$user_id'"; 
    
    //run query  
    $run_delete = mysqli_query($db_connect, $delete);
    
    //check if code excuted correctly and send message.
    if($run_delete) {
      $_SESSION['message'] = "User deleted successful.";
      header('location:users_delete.php');
      exit(0);
  
    }else{
      $_SESSION['message'] = "User not deleted.";
      header('location:users_delete.php');
      exit(0);
    }

   }

?>

<!-- Imported Public Header --> 
<?php include('../private/shared/admin_header.php')?>

<section class="my-5 py-5">



  <div class="container text-center">
    <h2>Delete User</h2>
  </div>

  <div class="container">
    <a class="g-btn" href="users.php">Go back to table</a>
    <hr>
  </div>

  <div id="crud-error" class="container text-center my-3 error">
    <!-- Display error message -->
    <?php include('message.php'); ?>
  </div>

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

  <div class="container text-center">
    <h3>Are you sure you want to delete this user?</h3>
  </div>

  <!-- view user -->
  <div class="container text-center">

    <h4>Username:</h4>
    <p><?=$users['username_usr']; ?></p>
  
    <h4>Email:</h4>
    <p><?=$users['email_usr']; ?></p>
  
    <h4>Admin Status: </h4>
    <p><?=$users['is_admin']; ?></p>

    <form action="users_delete.php" method="POST">
      <!-- user id -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <input type="hidden" name="user_id" value="<?=$users['id_usr']; ?>">
      </div>
      <!-- submit form -->
      <div class="form-group col-4 d-grid mx-auto">
        <input type="submit" name="delete" value="Delete User" class="g-btn">
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