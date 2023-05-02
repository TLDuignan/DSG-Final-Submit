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

    <section class="container my-4">
      <div class="text-center">
        <h2>View Tutorial</h2>
      </div>
      <div>
        <a class="g-btn" href="tutorials.php">Go Back</a>
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
          $tutorial_id = mysqli_real_escape_string($db_connect, $_GET['id']);
          $select = "SELECT * FROM tutorials_tur WHERE id_tur='$tutorial_id' ";
          $run_select = mysqli_query($db_connect, $select);

          if(mysqli_num_rows($run_select) > 0) {
              $tutorial = mysqli_fetch_array($run_select);
            
      ?>
        <!-- view patterns -->
        <h3>Id</h3>
        <p><?=$tutorial['id_tur']; ?></p>

        <h3> Title</h3>
        <p><?=$tutorial['title_tur']; ?></p>

        <h3> Description</h3>
        <p><?=$tutorial['description_tur']; ?></p>

        <h3> Category</h3>
        <p><?=$tutorial['type_cat']; ?></p>

        <h3> Level</h3>
        <p><?=$tutorial['level_lev']; ?></p>

        <h3> PDF</h3>
        <p><?=$tutorial['pdf_tur']; ?></p>

        <h3> Image</h3>
        <p><?=$tutorial['img_tur']; ?></p>

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