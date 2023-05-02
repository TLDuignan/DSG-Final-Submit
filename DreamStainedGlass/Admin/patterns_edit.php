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
    /**
     * set parameters
     */
    $pattern_id = mysqli_real_escape_string($db_connect, $_POST['pattern_id']);
    $title = mysqli_real_escape_string($db_connect, $_POST['title']);
    $description = mysqli_real_escape_string($db_connect, $_POST['description']);
    $category = mysqli_real_escape_string($db_connect, $_POST['category']);
    $level = mysqli_real_escape_string($db_connect, $_POST['level']);
    $pdf = mysqli_real_escape_string($db_connect, $_POST['pdf']);
    $img = mysqli_real_escape_string($db_connect, $_POST['img']);
    $tutorial = mysqli_real_escape_string($db_connect, $_POST['tutorial']);

    //update database
    $update = "UPDATE patterns_pat SET title_pat='$title', description_pat='$description', type_cat='$category', level_lev='$level', pdf_pat='$pdf', img_pat='$img', pdf_tur='$tutorial' WHERE id_pat='$pattern_id'"; 

    //run query
    $run_update = mysqli_query($db_connect, $update);

    //check if code excuted correctly and send message.     
    if($run_update) {
      $_SESSION['message'] = "Pattern update successful.";
      header('location:patterns_edit.php');
      exit(0);
  
    }else{
      $_SESSION['message'] = "Pattern not updated.";
      header('location:patterns_edit.php');
      exit(0);
    }

  } 
?>

<!-- Imported Public Header --> 
<?php include('../private/shared/admin_header.php')?>

<section class="my-5 py-5">
  <div class="container text-center">
    <h2>Edit Pattern</h2>
  </div>

  <div class="container">
    <a class="g-btn" href="patterns.php">Go back to table</a>
    <hr>
  </div>


  <div id="crud-error" class="container text-center my-3 error">
    <!-- Display error message -->
    <?php include('message.php'); ?>
  </div>
  <div class="container">

    <?php 
      /**
       * check id exists.
       */
      if (isset($_GET['id']))
      {
        $pattern_id = mysqli_real_escape_string($db_connect, $_GET['id']);
        $select = "SELECT * FROM patterns_pat WHERE id_pat='$pattern_id' ";
        $run_select = mysqli_query($db_connect, $select);

        if(mysqli_num_rows($run_select) > 0) {
            $pattern = mysqli_fetch_array($run_select);
          
    ?>
      <!-- Form -->
      <form action="patterns_edit.php" method="post">
             <!-- input id -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <input type="hidden" name="pattern_id" value="<?=$pattern['id_pat']; ?>">
        </div>
        <!-- input title -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_title">Title</label>
          <input type="text" id="pat_title" name="title" value="<?=$pattern['title_pat']; ?>" class="form-control my-2" required>
        </div>
        <!-- input description -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_description">Description</label>
          <input type="text" id="pat_description" name="description" value="<?=$pattern['description_pat']; ?>" class="form-control my-2" required>
        </div>
       <!-- input Category -->
       <div class="form-group col-5 mx-auto text-center pt-2">
        <h3>Category</h3>
        <label for="pat_suncatchers">Suncatcher</label>
        <input type="radio" id="pat_suncatchers" name="category" value="Suncatcher" required>
        <br>
        <label for="pat_panels">Panels</label>
        <input type="radio" id="pat_panels" name="category" value="Panels" required>
          <br>
        <label for="pat_sculptures">Sculptures</label>
        <input type="radio" id="pat_sculptures" name="category" value="Sculptures" required>
        <br>
        <label for="pat_garden">Garden</label>
        <input type="radio" id="pat_garden" name="category" value="Garden" required>
      </div>
        <!-- input level-->
        <div class="form-group col-5 mx-auto text-center pt-2">
        <h3>Skill Level</h3>
        <label for="pat_beginners">Beginners</label>
        <input type="radio" id="pat_beginners" name="level" value="Beginners" required>
        <br>
        <label for="pat_intermediate">Intermediate</label>
        <input type="radio" id="pat_intermediate" name="level" value="Intermediate" required>
        <br>
        <label for="pat_experienced">Experienced</label>
        <input type="radio" id="pat_experienced" name="level" value="Experienced" required>
      </div>
        <!-- input pdf -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_pdf">PDF</label>
          <input type="text" id="pat_pdf" name="pdf" value="<?=$pattern['pdf_pat']; ?>" class="form-control my-2" required>
        </div>
       <!-- input img -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_img">Image</label>
          <input type="text" id="pat_img" name="img" value="<?=$pattern['img_pat']; ?>" class="form-control my-2" required>
        </div>
        <!-- input tutorial -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_tutorial">Tutorial</label>
          <input type="text" id="pat_tutorial" name="tutorial" value="<?=$pattern['pdf_tur']; ?> " class="form-control my-2">
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
