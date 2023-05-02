<?php
   @include 'private/db_connection.php';  

   session_start();

   if(!isset($_SESSION['admin_id'])){
    header('location:../login.php');
   }

?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header -->  

    <!-- Categories Table -->

    <section class="contanier">
      <h1 class="m-5">Categories</h1>
      <div class="m-5">
       <a class="g-btn mx-3" href="admin_dashboard.php">Back to Dashboard</a>
       <a class="g-btn" href="categories_create.php">Add New</a>
      </div>
  </section>
  <section class="m-5">
      <?php include('../private/get_categories.php'); ?>
      <table class="table table-bordered my-2" id="categories">
        <tr>
          <th>Id Code</th>
          <th>Category Type</th>
          <th>Action</th>
        </tr>
        
        <?php while($row=$categories->fetch_assoc()) {  ?>
          <tr>
            <td><?php echo $row['id_cat']; ?></td>
            <td><?php echo $row['type_cat']; ?></td>
            <td>
              <a class="btn btn-success" href="categories_view.php?id=<?php echo $row['id_cat']; ?>">View</a>
              <a class="btn btn-info" href="categories_edit.php?id=<?php echo $row['id_cat']; ?>">Edit</a>
              <a class="btn btn-danger" href="categories_delete.php?id=<?php echo $row['id_cat']; ?>">Delete</a>
            </td>
          </tr>   
          <?php } ?>
        </table>

  </section>

  <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>