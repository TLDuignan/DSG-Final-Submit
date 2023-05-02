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
        <h2>View Pattern</h2>
      </div>
      <div>
       <a class="g-btn" href="patterns.php">Go Back</a>
      </div>
      <hr>
    </section>

     <!-- Form input -->
    <section class="container text-center">
      <?php 
        /**
         * check is user exists.
         */
        if (isset($_GET['id']))
        {
          $pattern_id = mysqli_real_escape_string($db_connect, $_GET['id']);
          $select = "SELECT * FROM patterns_pat WHERE id_pat='$pattern_id' ";
          $run_select = mysqli_query($db_connect, $select);

          if(mysqli_num_rows($run_select) > 0) {
              $patterns = mysqli_fetch_array($run_select);
            
      ?>
        <!-- view patterns -->
        <h3>Id</h3>
        <p><?=$patterns['id_pat']; ?></p>

        <h3> Title</h3>
        <p><?=$patterns['title_pat']; ?></p>

        <h3> Description</h3>
        <p><?=$patterns['description_pat']; ?></p>

        <h3> Category</h3>
        <p><?=$patterns['type_cat']; ?></p>

        <h3> Level</h3>
        <p><?=$patterns['level_lev']; ?></p>

        <h3> PDF</h3>
        <p><?=$patterns['pdf_pat']; ?></p>

        <h3> Image</h3>
        <p><?=$patterns['img_pat']; ?></p>

        <h3> Tutorial</h3>
        <p><?=$patterns['pdf_tur']; ?></p>

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