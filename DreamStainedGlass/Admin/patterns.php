<?php
   @include 'private/db_connection.php';  

   session_start();

   if(!isset($_SESSION['admin_id'])){
    header('location:../login.php');
   }

?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header -->  
    <section>
      <h1 class="m-5">Patterns</h1>
      <div class="m-5">
        <a class="g-btn mx-3" href="admin_dashboard.php">Back to Dashboard</a>
        <a class="g-btn" href="patterns_create.php">Add New</a>
      </div>
    </section>
    <!-- Patterns Table -->
    <section class="m-5">
      <?php include('../private/get_patterns.php'); ?>
      
      <table class="table table-bordered my-2" id="users">
        <tr>
          <th>Id Code</th>
          <th>Title</th>
          <th>Description</th>
          <th>Category </th>
          <th>Skill Level</th>
          <th>Pattern PDF</th>
          <th>Finished Image</th>
          <th>Tutorial PDF</th>
          <th>Action</th>
        
        </tr>
        
        <?php while($row=$patterns->fetch_assoc()) {  ?>
          <tr>
            <td><?php echo $row['id_pat']; ?></td>
            <td><?php echo $row['title_pat']; ?></td>
            <td><?php echo $row['description_pat']; ?></td>
            <td><?php echo $row['type_cat']; ?></td>
            <td><?php echo $row['level_lev']; ?></td>
            <td><?php echo $row['pdf_pat']; ?></td>
            <td><?php echo $row['img_pat']; ?></td>
            <td><?php echo $row['pdf_tur']; ?></td>
            <td>
              <a class="btn btn-success" href="patterns_view.php?id=<?php echo $row['id_pat']; ?>">View</a>
              <a class="btn btn-info" href="patterns_edit.php?id=<?php echo $row['id_pat']; ?>">Edit</a>
              <a class="btn btn-danger" href="patterns_delete.php?id=<?php echo $row['id_pat']; ?>">Delete</a>
            </td>
          </tr>   
          <?php } ?>
        </table>

    </section>

       <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>