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

  /**
  * Delete record using post parameters.
  */
  if(isset($_POST['delete'])) {
    //getting the post values
    $patterns_id = mysqli_real_escape_string($db_connect, $_POST['pattern_id']);
    
    // delete from database
    $delete = "DELETE FROM patterns_pat WHERE id_pat='$patterns_id'"; 
    
    //run query  
    $run_delete = mysqli_query($db_connect, $delete);
    
    //check if code excuted correctly and send message.
    if($run_delete) {
      $_SESSION['message'] = "Pattern deleted successful.";
      header('location:patterns_delete.php');
      exit(0);
  
    }else{
      $_SESSION['message'] = "Pattern not deleted.";
      header('location:patterns_delete.php');
      exit(0);
    }

   }

?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header --> 

    <section class="container pt-5 mt-5">
      <div>
        <a class="g-btn" href="patterns.php">Go Back</a>
      </div>

      <div class="text-center">
        <h2>Delete Pattern</h2>
      </div>

       <!-- Display message -->
      <?php include('message.php'); ?>

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

        <h3> Tutorial (if exists)</h3>
        <p><?=$patterns['pdf_tur']; ?></p>

      <form action="patterns_delete.php" method="POST">
        <!-- user id -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <input type="hidden" name="pattern_id" value="<?=$patterns['id_pat']; ?>">
        </div>
        <!-- submit form -->
        <div class="form-group col-4 d-grid mx-auto">
          <input type="submit" name="delete" value="Delete Pattern" class="g-btn">
        </div>
      </form>

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