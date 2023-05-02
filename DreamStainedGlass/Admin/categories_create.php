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
    $type = mysqli_real_escape_string($db_connect, $_POST['type']);

    // insert into database
    $insert = "INSERT INTO categories_cat(type_cat) VALUES ('$type')";

    //run query
    $run_insert = mysqli_query($db_connect, $insert);
      
    //check if code excuted correctly and send message.
    if($run_insert){
      $_SESSION['message'] = "New Category Created Successfully";
      header("Location: categories_create.php");
      exit(0);
      
    }else{
      $_SESSION['message'] = "New Category Not Created";
      header("Location: categories_create.php");
      exit(0);
    }
  }

?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header --> 

    <section class="container mt-5 pt-5">
      <div>
        <a class="g-btn" href="categories.php">Go Back</a>
      </div>

      <div class="text-center">
        <h2>Create Category</h2>
      </div>

      <!-- Display error message -->
      <?php include('message.php') ?>
      <hr>
    </section>

     <!-- Form -->
    <section class="container">
      <form action="categories_create.php" method="post">
        <!-- input category type -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="create_cat_type">Category Type</label>
          <input type="text" name="type" id="create_cat_type" class="form-control my-2" required>
        </div>
        <!-- submit form -->
        <div class="form-group col-4 d-grid mx-auto">
          <input type="submit" name="submit" value="Create" class="g-btn">
        </div>
      </form>

    </section>

    <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>