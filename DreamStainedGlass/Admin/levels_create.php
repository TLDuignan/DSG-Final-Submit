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
    $level = mysqli_real_escape_string($db_connect, $_POST['level']);

    // insert into database
    $insert = "INSERT INTO level_lev(level_lev) VALUES ('$level')";

    //run query
    $run_insert = mysqli_query($db_connect, $insert);
    
    //check if code excuted correctly and send message.
    if($run_insert){
      $_SESSION['message'] = "New Level Created Successfully";
      header("Location: levels_create.php");
      exit(0);
    }else{
      $_SESSION['message'] = "New Level Not Created";
      header("Location: levels_create.php");
      exit(0);
    }

   }
?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header --> 

    <section class="container mt-5 pt-5">
      <div class="text-center">
        <h2>Create Level</h2>
      </div>
      <div>
       <a class="g-btn m-3" href="levels.php">Go Back</a>
      </div>
      <hr>
      <div>
        <!-- Display error message -->
        <?php include('message.php') ?>
      <div>
    </section>
    
    <!-- Form -->
    <section class="container">
      <form action="levels_create.php" method="post">
        <!-- input skill level -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="create_level">Skill Level</label>
          <input type="text" name="level" id="create_level" class="form-control my-2" required>
        </div>
        <!-- submit form -->
        <div class="form-group col-4 d-grid mx-auto">
          <input type="submit" name="submit" value="Create" class="g-btn">
        </div>
      </form>

    </section>

    <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>