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
    $tutorial_id = mysqli_real_escape_string($db_connect, $_POST['tutorial_id']);
    
    // delete from database
    $delete = "DELETE FROM tutorials_tur WHERE id_tur='$tutorial_id'"; 
    
    //run query  
    $run_delete = mysqli_query($db_connect, $delete);
    
    //check if code excuted correctly and send message.
    if($run_delete) {
      $_SESSION['message'] = "Tutorial deleted successful.";
      header('location:tutorials_delete.php');
      exit(0);
  
    }else{
      $_SESSION['message'] = "tutorial not deleted.";
      header('location:tutorialss_delete.php');
      exit(0);
    }

   }

?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header --> 

    <section class="container mt-5 pt-5">
      <div class="m-3">
        <a class="g-btn" href="tutorials.php">Go Back</a>
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
         * check id exists.
         */
        if (isset($_GET['id']))
        {
          $tutorial_id = mysqli_real_escape_string($db_connect, $_GET['id']);
          $select = "SELECT * FROM tutorials_tur WHERE id_tur='$tutorial_id' ";
          $run_select = mysqli_query($db_connect, $select);

          if(mysqli_num_rows($run_select) > 0) {
              $tutorial = mysqli_fetch_array($run_select);
            
      ?>
        <!-- view tutorial -->
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

      <form action="tutorials_delete.php" method="POST">
        <!-- get id -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <input type="hidden" name="tutorial_id" value="<?=$tutorial['id_tur']; ?>">
        </div>
        <!-- submit form -->
        <div class="form-group col-4 d-grid mx-auto">
          <input type="submit" name="delete" value="Delete" class="g-btn">
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