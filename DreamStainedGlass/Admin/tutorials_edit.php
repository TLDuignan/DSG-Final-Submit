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
   * Edit record.
   */
  if(isset($_POST['submit'])){
   
    //getting the post values
   $tutorial_id = mysqli_real_escape_string($db_connect, $_POST['tutorial_id']);
   $title = mysqli_real_escape_string($db_connect, $_POST['title']);
   $description = mysqli_real_escape_string($db_connect, $_POST['description']);
   $category = mysqli_real_escape_string($db_connect, $_POST['category']);
   $level = mysqli_real_escape_string($db_connect, $_POST['level']);
   $pdf = mysqli_real_escape_string($db_connect, $_POST['pdf']);
   $img = mysqli_real_escape_string($db_connect, $_POST['img']);

    //update database
    $update = "UPDATE tutorials_tur SET title_tur='$title', description_tur='$description', type_cat='$category', level_lev='$level', pdf_tur='$pdf', img_tur='$img' WHERE id_tur='$tutorial_id'"; 

    //run query
    $run_update = mysqli_query($db_connect, $update);

    /**
     * check if code excuted correctly and send message.
     */
    if($run_update) {
      $_SESSION['message'] = "Tutorial update successful.";
      header('location:tutorials_edit.php');
      exit(0);
  
    }else{
      $_SESSION['message'] = "Tutorial not updated.";
      header('location:tutorials_edit.php');
      exit(0);
    }

  } 
?>

<!-- Imported Public Header --> 
<?php include('../private/shared/admin_header.php')?>

<section class="my-5 py-5">
  <div class="container text-center">
    <h2>Edit Tutorial</h2>
  </div>

  <div class="container">
    <a class="g-btn" href="tutorials.php">Go back to table</a>
    <hr>
  </div>


  <div id="crud-error" class="container text-center my-3 error">
    <!-- Display error message -->
    <?php include('message.php'); ?>
  </div>
  <div id="signup" class="container">

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
          $tutorials = mysqli_fetch_array($run_select);
        
  ?>
   <form action="tutorials_edit.php" method="post">
        <!-- input id -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <input type="hidden" name="tutorial_id" value="<?=$tutorials['id_tur']; ?>">
      </div>
        <!-- input title -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="tur-edit-title">Title</label>
        <input type="text" id="tur-edit-title" name="title" value="<?=$tutorials['title_tur']; ?>" class="form-control my-2" required>
      </div>
        <!-- input description -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="tur-edit-description">Description</label>
        <input type="text" id="tur-edit-description" name="description" value="<?=$tutorials['description_tur']; ?>" class="form-control my-2" required>
      </div>
        <!-- input category -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="tur-edit-category">Category</label>
        <select id="tur-edit-category" name="category">
          <option value="Suncatchers">Suncatcher</option>
          <option value="Panels">Panels</option>
          <option value="Sculptures">Sculptures</option>
          <option value="Garden">Garden</option>
        </select>
      </div>
          <!-- input level -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="tur-edit-level">Skill Level</label>
        <select id="tur-edit-level" name="level">
          <option value="Beginners">Beginners</option>
          <option value="Intermediate">Intermediate</option>
          <option value="experienced">Experienced</option>
        </select>
      </div>
        <!-- input pdf -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="tur-edit-pdf">PDF</label>
        <input type="text" id="tur-edit-pdf" name="pdf" value="<?=$tutorials['pdf_tur']; ?>" class="form-control my-2" required>
      </div>
        <!-- input image -->
      <div class="form-group col-5 mx-auto text-center pt-2">
        <label for="tur-edit-img">Image</label>
        <input type="text" id="tur-edit-img" name="img" value="<?=$tutorials['img_tur']; ?>" class="form-control my-2" required>
      </div>
        <!-- submit form -->
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


  </div>


</section>

<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>
