<?php
   @include 'private/db_connection.php';  

   session_start();

   if(!isset($_SESSION['admin_id'])){
   header('location:../login.php');
}

?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header -->  

    <!-- Users Table -->

    <section class="container">
      <h1 class="m-5">Tutorials</h1>
      <div class="m-5">
        <a class="g-btn mx-3" href="admin_dashboard.php">Back to Dashboard</a>
        <a class="g-btn" href="tutorials_create.php">Add New</a>
      </div>
     <?php include('../private/get_tutorials.php'); ?>
    </section> 

    <section class="m-5">
      <table class="table table-bordered">
        <tr>
          <th>Id Code</th>
          <th>Title</th>
          <th>Description</th>
          <th>Category </th>
          <th>Skill Level</th>
          <th>PDF</th>
          <th>Finished Image</th>
          <th>Actions</th>
        </tr>
        
        <?php while($row=$tutorials->fetch_assoc()) {  ?>
        <tr>
          <td><?php echo $row['id_tur']; ?></td>
          <td><?php echo $row['title_tur']; ?></td>
          <td><?php echo $row['description_tur']; ?></td>
          <td><?php echo $row['type_cat']; ?></td>
          <td><?php echo $row['level_lev']; ?></td>
          <td><?php echo $row['pdf_tur']; ?></td>
          <td><?php echo $row['img_tur']; ?></td>
          <td>
            <a class="btn btn-success" href="tutorials_view.php?id=<?php echo $row['id_tur']; ?>">View</a>
             <a class="btn btn-info" href="tutorials_edit.php?id=<?php echo $row['id_tur']; ?>">Edit</a>
            <a class="btn btn-danger" href="tutorials_delete.php?id=<?php echo $row['id_tur']; ?>">Delete</a>
          </td>
        </tr>   
        <?php } ?>
      </table>

    </section>

     <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>