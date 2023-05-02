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

    //getting posr patameters.
    $title = mysqli_real_escape_string($db_connect, $_POST['title']);
    $description = mysqli_real_escape_string($db_connect, $_POST['description']);
    $category = mysqli_real_escape_string($db_connect, $_POST['category']);
    $level = mysqli_real_escape_string($db_connect, $_POST['level']);
    $pdf = mysqli_real_escape_string($db_connect, $_POST['pdf']);
    $img = mysqli_real_escape_string($db_connect, $_POST['img']);
    
    // insert into database
    $insert = "INSERT INTO tutorials_tur(title_tur,description_tur,type_cat,level_lev,pdf_tur,img_tur) VALUES ('$title','$description','$category','$level','$pdf','$img')";

    //run query
    $run_insert = mysqli_query($db_connect, $insert);

    //check if code excuted correctly and send message.
    if($run_insert){
      $_SESSION['message'] = "New Tutorial Created Successfully";
      header("Location: tutorials_create.php");
      exit(0);
    }else{
      $_SESSION['message'] = "New Tutorial Not Created";
      header("Location: tutorials_create.php");
      exit(0);
    }
  }
?>
       

<!-- Imported Public Header --> 
<?php include('../private/shared/admin_header.php')?>
    
    <!-- Banner -->
    <section class="container pt-5 mt-5">
      <div>
       <a class="g-btn" href="tutorials.php">Go Back</a>
      </div>
      <div class="text-center">
        <h2>Create Tutorial</h2>
      </div>
      <!-- Display error message -->
      <?php include('message.php') ?>

      <hr>
    </section>

    <!-- Form -->
    <section class="container">
        <form action="tutorials_create.php" method="post">
             <!-- input title -->
          <div class="form-group col-5 mx-auto text-center pt-2">
            <label for="tur_title">Title</label>
            <input type="text" id="tur_title" name="title" class="form-control my-2" required>
            </div>
          <!-- input description -->
          <div class="form-group col-5 mx-auto text-center pt-2">
            <label for="tur_description">Description</label>
            <input type="text" id="tur_description" name="description" class="form-control my-2" required>
          </div>
           <!-- input Category -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <h3>Category</h3>
          <label for="tur_suncatchers">suncatcher</label>
          <input type="radio" id="tur_suncatchers" name="category" value="suncatcher"   required>
          <br>
          <label for="tur_panels">panels</label>
          <input type="radio" id="tur_panels" name="category" value="panels" required>
          <br>
          <label for="tur_sculptures">sculptures</label>
          <input type="radio" id="tur_sculptures" name="category" value="sculptures" required>
          <br>
          <label for="tur_garden">garden</label>
          <input type="radio" id="tur_garden" name="category" value="garden" required>
        </div>
          <!-- input level-->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <h3>Skill Level</h3>
          <label for="tur_beginners">beginners</label>
          <input type="radio" id="tur_beginners" name="level" value="beginners" required>
          <br>
         <label for="tur_intermediate">intermediate</label>
         <input type="radio" id="tur_intermediate" name="level" value="intermediate" required>
          <br>
         <label for="tur_experienced">experienced</label>
         <input type="radio" id="tur_experienced" name="level" value="experienced" required>
        </div>
          <!-- input pdf -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="tur_pdf">PDF</label>
          <input type="text" id="tur_pdf" name="pdf" class="form-control my-2" required>
        </div>
          <!-- input img -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="tur_img">Image</label>
          <input type="text" id="tur_img" name="img" class="form-control my-2" required>
        </div>
          <!-- submit form -->
        <div class="form-group col-4 d-grid mx-auto">
          <input type="submit" name="submit" value="Create" class="g-btn">
        </div>
      </form>
    </section>
  <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>

    
