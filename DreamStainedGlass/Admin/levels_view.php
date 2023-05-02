<?php
  /**
   * connect to database
   */
   @include '../private/db_connection.php';  

   /**
    * Admin only
    */
   session_start();

   if(!isset($_SESSION['admin_id'])){
    header('location:../login.php');
   }


?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header --> 

    <section class="container mt-5 pt-5">
      <div class="text-center">
        <h2>View Level</h2>
      </div>
      <div>
       <a class="g-btn" href="levels.php">Go Back</a>
      </div>
      <hr>
    </section>

     <!-- Form input -->
    <section class="container text-center">
      <?php 
        /**
         * check is user exists.
         */
        if (isset($_GET['id'])) {
          $level_id = mysqli_real_escape_string($db_connect, $_GET['id']);
          $select = "SELECT * FROM level_lev WHERE id_lev='$level_id' ";
          $run_select = mysqli_query($db_connect, $select);

          if(mysqli_num_rows($run_select) > 0) {
              $level = mysqli_fetch_array($run_select);
            
      ?>
        <!-- view Level -->
        <h3>Id</h3>
        <p><?=$level['id_lev']; ?></p>

        <h3> Level</h3>
        <p><?=$level['level_lev']; ?></p>

      <?php

          }else{
            // user not found message
            echo "<h4> No Such User Found</h4>";
          }
        } 
      ?>  

    </section>

    <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>