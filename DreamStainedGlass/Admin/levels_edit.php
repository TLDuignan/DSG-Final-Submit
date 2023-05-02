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
  * Update record using post parameters.
  */
   if(isset($_POST['submit'])){

    //getting the post values
    $level_id = mysqli_real_escape_string($db_connect, $_POST['level_id']);
    $level = mysqli_real_escape_string($db_connect, $_POST['level']);

    // updating database
    $update = "UPDATE level_lev SET level_lev='$level' WHERE id_lev='$level_id' ";
    
    //run query
    $run_update = mysqli_query($db_connect, $update);
    
    //check if code excuted correctly and send message.
    if($run_update){
      $_SESSION['message'] = "Level Update Successfully";
      header("Location: levels_edit.php");
      exit(0);
    }else{
      $_SESSION['message'] = "Level Not Updated";
      header("Location: levels_edit.php");
      exit(0);
    }

   }

?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header --> 

    <section class="container mt-5 pt-5">
      <div class="text-center">
        <h2>Edit Level</h2>
      </div>
      <div>
        <a class="g-btn" href="levels.php">Go Back</a>
      </div>
      <hr>
      <!-- Display error message -->
      <?php include('message.php') ?>
    </section>

    <!-- Form input -->
    <section class="container">
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
      <form action="levels_edit.php" method="post">
          <!-- input user id -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <input type="hidden" name="level_id" value="<?=$level['id_lev']; ?>">
        </div>
         <!-- input Skill Level -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="edit_level">Skill Level</label>
          <input type="text" name="level" id="edit_level" class="form-control my-2" value="<?=$level['level_lev']; ?>" required>
        </div>

        <div class="form-group col-4 d-grid mx-auto">
          <input type="submit" name="submit" value="Update" class="g-btn">
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