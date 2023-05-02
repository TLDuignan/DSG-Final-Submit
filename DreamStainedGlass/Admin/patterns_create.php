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
  * Create record using post parameters.
  */
  if(isset($_POST['submit'])){

    //getting the post values
    
    $title = mysqli_real_escape_string($db_connect, $_POST['title']);
    $description = mysqli_real_escape_string($db_connect, $_POST['description']);
    $category = mysqli_real_escape_string($db_connect, $_POST['category']);
    $level = mysqli_real_escape_string($db_connect, $_POST['level']);
    $pdf = mysqli_real_escape_string($db_connect, $_POST['pdf']);
    $img = mysqli_real_escape_string($db_connect, $_POST['img']);
    $tutorial = mysqli_real_escape_string($db_connect, $_POST['tutorial']);

    // insert into database
    $insert = "INSERT INTO patterns_pat(title_pat,description_pat,type_cat,level_lev,pdf_pat,img_pat,pdf_tur) VALUES ('$title','$description','$category','$level','$pdf','$img','$tutorial')";

    //run query
    $run_insert = mysqli_query($db_connect, $insert);
      
    //check if code excuted correctly and send message.
    if($run_insert){
      $_SESSION['message'] = "New Pattern Created Successfully";
      header("Location: patterns_create.php");
      exit(0);
    }else{
      $_SESSION['message'] = "New Pattern Not Created";
      header("Location: patterns_create.php");
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
        <h2>Create Pattern</h2>
      </div>

      <!-- Display error message -->
      <?php include('message.php') ?>
      <hr>
    </section>

     <!-- Form -->
    <section class="container">
      <form action="patterns_create.php" method="post">
        <!-- input title -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_title">Title</label>
          <input type="text" id="pat_title" name="title" class="form-control my-2" required>
        </div>
        <!-- input description -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_description">Description</label>
          <input type="text" id="pat_description" name="description" class="form-control my-2" required>
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

          <label for="pat_intermediate">Intermediate</label>
          <input type="radio" id="pat_intermediate" name="level" value="Intermediate" required>

          <label for="pat_experienced">Experienced</label>
          <input type="radio" id="pat_experienced" name="level" value="Experienced" required>
        </div>
        <!-- input pdf -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_pdf">PDF</label>
          <input type="text" id="pat_pdf" name="pdf" class="form-control my-2" required>
        </div>
       <!-- input img -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_img">Image</label>
          <input type="text" id="pat_img" name="img" class="form-control my-2" required>
        </div>
        <!-- input tutorial -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="pat_tutorial">Tutorial</label>
          <input type="text" id="pat_tutorial" name="tutorial" class="form-control my-2">
        </div>
       <!-- submit form -->
        <div class="form-group col-4 d-grid mx-auto">
          <input type="submit" name="submit" value="Create" class="g-btn">
        </div>
      </form>

    </section>

    <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>