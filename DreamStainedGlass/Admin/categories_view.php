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
        <h2>View Category</h2>
      </div>
      <div>
       <a class="g-btn" href="categories.php">Go Back</a>
      </div>
      <hr>
    </section>

     <!-- Form input -->
    <section class="container text-center">
      <?php 
        /**
         * check id exists.
         */
        if (isset($_GET['id'])) {
          $cat = mysqli_real_escape_string($db_connect, $_GET['id']);
          $select = "SELECT * FROM categories_cat WHERE id_cat='$cat' ";
          $run_select = mysqli_query($db_connect, $select);

          if(mysqli_num_rows($run_select) > 0) {
              $cat = mysqli_fetch_array($run_select);
            
      ?>
        <!-- view Level -->
        <h3>Id</h3>
        <p><?=$cat['id_cat']; ?></p>

        <h3>Type</h3>
        <p><?=$cat['type_cat']; ?></p>

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