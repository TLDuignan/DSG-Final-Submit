<?php

   @include '../private/db_connection.php';  

   session_start();

   if(!isset($_SESSION['admin_id'])){
   header('location:../login.php');
}

?>
<!-- Imported Admin Header --> 
<?php include('../private/shared/admin_header.php') ?>


    <section class="my-5 py-5">
      <?php 
       /**
         * Get user information.
         */
       $current_user = $_SESSION['admin_id'];
       $user_info= "SELECT * FROM users_usr WHERE id_usr = '$current_user' ";

       $run_select = mysqli_query($db_connect, $user_info);

       if(mysqli_num_rows($run_select) > 0) {
          while($row = mysqli_fetch_array($run_select)) {
            //  print_r($row['username_usr']);
          
      ?>
      <div class="row container mx-auto">
        <div class="text-center mt-1 pt-2 col-12">
          <h1 class="">Hello <?php echo $row['username_usr']; ?></h1>
          <hr>
          <div class="account-info  mt-4">
            <a href ="logout_comformation.php" id="g-btn" class="g-btn">Logout</a>
          </div>
        </div>
        <div class="row container mx-auto">
          <h2 class="">Tables</h2>
          <ul>
            <li><a href ="users.php"><h3>Users</h3></a></li>
            <li><a href ="patterns.php"><h3>Patterns</h3></a></li>
            <li><a href ="tutorials.php"><h3>Tutorials</h3></a></li>
            <li><a href ="categories.php"><h3>Categories</h3></a></li>
            <li><a href ="levels.php"><h3>Skill Level</h3></a></li>
          </ul>
        </div>
      </div>
      <?php
          }
        }
      ?>
    </section>
   
  <!-- Imported Public Footer --> 
  <?php include('../private/shared/footer.php') ?>