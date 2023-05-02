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
?>

<!-- Imported Public Header --> 
<?php include('../private/shared/admin_header.php')?>

<section class="container my-5 py-5">
  <div class=" text-center">
    <h2>View User</h2>
  </div>
  <div>
    <a class="g-btn" href="users.php">Go back to table</a>
    <hr>
  </div>

  <div class="container text-center">

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
  <!-- view user -->

    <h3>Username:</h3>
    <p><?=$users['username_usr']; ?></p>
  
    <h3>Email:</h3>
    <p><?=$users['email_usr']; ?></p>
  
    <h3>Password:</h3>
    <p><?=$users['password_usr']; ?></p>
  
    <h3>Admin Status: </h3>
    <p><?=$users['is_admin']; ?></p>
      
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
