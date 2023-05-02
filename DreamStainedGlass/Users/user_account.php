<?php
 /**
   * connect to database
   */
  @include '../private/db_connection.php';  

 /**
  * members only
  */
  session_start();

  if(!isset($_SESSION['user_id'])){
   header('location:../login.php');
  }
?>

<?php include('../private/shared/user_header.php') ?>
<!-- Imported User Header --> 

    <section class="mt-4">
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
        <h2>Hello <?php echo $row['username_usr'] ?></h2>
        <hr>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="d-grid mx-auto">
          <a href ="edit_account.php" class="b-btn col-4 mx-auto text-center">Edit Profile</a>
        </div>
        <div class="d-grid mx-auto">
          <a href ="logout_comformation.php" class="g-btn col-4 mx-auto text-center">Logout</a>
        </div>
      </div>

      <?php

          }
        }

      ?>
    </section>


    <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>