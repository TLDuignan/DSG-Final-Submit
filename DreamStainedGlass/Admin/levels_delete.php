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
    $level_id = mysqli_real_escape_string($db_connect, $_POST['level_id']);

    // delete from database
    $delete = "DELETE FROM level_lev WHERE id_lev='$level_id'"; 
    //run query
    $run_delete = mysqli_query($db_connect, $delete);

    //check if code excuted correctly and send message.
    if($run_delete) {
      $_SESSION['message'] = "Level deleted successful.";
      header('location:levels_delete.php');
      exit(0);
  
    }else{
      $_SESSION['message'] = "Level not deleted.";
      header('location:levels_delete.php');
      exit(0);
    }

  }

?>

<!-- Imported Public Header --> 
<?php include('../private/shared/admin_header.php')?>

<section class="my-5 py-5">
  <div class="container text-center">
    <h2>Delete Level</h2>
  </div>
  <div class="container">
    <a class="g-btn" href="levels.php">Go back to table</a>
    <hr>
  </div>
  <div id="crud-error" class="container text-center my-3 error">
    <!-- Display message -->
    <?php include('message.php'); ?>
  </div>

    <?php 
      /**
       * check is id exists.
       */
      if (isset($_GET['id']))
      {
        $level_id = mysqli_real_escape_string($db_connect, $_GET['id']);
        $select = "SELECT * FROM level_lev WHERE id_lev='$level_id' ";
        $run_select = mysqli_query($db_connect, $select);

        if(mysqli_num_rows($run_select) > 0) {
            $level_id = mysqli_fetch_array($run_select);
    ?>

  <div class="container text-center">
    <h3>Are you sure you want to delete this Level?</h3>
  </div>

  <!-- view level -->
  <div class="container text-center">

    <h4><?=$level_id['level_lev']; ?></h4>
  

    <form action="levels_delete.php" method="POST">
      <!-- level id -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <input type="hidden" name="level_id" value="<?=$level_id['id_lev']; ?>">
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


  </div>


</section>

<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>