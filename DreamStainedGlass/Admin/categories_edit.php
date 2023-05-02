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
    $cat_id = mysqli_real_escape_string($db_connect, $_POST['cat_id']);
    $type = mysqli_real_escape_string($db_connect, $_POST['type']);

    // updating database
    $update = "UPDATE categories_cat SET type_cat='$type' WHERE id_cat='$cat_id' ";
    
    //run query
    $run_update = mysqli_query($db_connect, $update);
    
   //check if code excuted correctly and send message.
    if($run_update){
      $_SESSION['message'] = "Category Update Successfully";
      header("Location: categories_edit.php");
      exit(0);
    }else{
      $_SESSION['message'] = "Category Not Updated";
      header("Location: categories_edit.php");
      exit(0);
    }

   }

?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header --> 

    <section class="container mt-5 pt-5">
      <div>
       <a class="g-btn" href="Categories.php">Go Back</a>
      </div>

      <div class="text-center">
        <h2>Edit Category</h2>
      </div>

      <!-- Display error message -->
      <?php include('message.php') ?>
      <hr>
    </section>

     <!-- Form input -->
    <section class="container">
      <?php 
        /**
         * check id exists.
         */
        if (isset($_GET['id'])) {
          $cat_id = mysqli_real_escape_string($db_connect, $_GET['id']);
          $select = "SELECT * FROM categories_cat WHERE id_cat='$cat_id' ";
          $run_select = mysqli_query($db_connect, $select);

          if(mysqli_num_rows($run_select) > 0) {
              $cat_id = mysqli_fetch_array($run_select);
            
      ?>
      <form action="categories_edit.php" method="post">
          <!-- input category id -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <input type="hidden" name="cat_id" value="<?=$cat_id['id_cat']; ?>">
        </div>
         <!-- input Category -->
        <div class="form-group col-5 mx-auto text-center pt-2">
          <label for="edit_cat_type">Category</label>
          <input type="text" name="type" id="edit_cat_type" class="form-control my-2" value="<?=$cat_id['type_cat']; ?>" required>
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

    </section>

    <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>