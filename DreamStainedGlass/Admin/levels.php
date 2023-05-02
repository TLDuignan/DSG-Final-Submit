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

    <section>
      <h1 class="m-5">Skill Level</h1>
      <div class="m-5">
        <a class="g-btn mx-3" href="admin_dashboard.php">Back to Dashboard</a>
       <a class="g-btn" href="levels_create.php">Add New</a>
      </div>
    </section>
    <section class="m-5">
     <?php include('../private/get_levels.php'); ?>

      <table class="table table-bordered my-2" id="users">
        <tr>
          <th>Id Code</th>
          <th>Level</th>
        </tr>
        
        <?php while($row=$levels->fetch_assoc()) {  ?>
          <tr>
            <td><?php echo $row['id_lev']; ?></td>
            <td><?php echo $row['level_lev']; ?></td>
            <td>
              <a class="btn btn-success" href="levels_view.php?id=<?php echo $row['id_lev']; ?>">View</a>
              <a class="btn btn-info" href="levels_edit.php?id=<?php echo $row['id_lev']; ?>">Edit</a>
              <a class="btn btn-danger" href="levels_delete.php?id=<?php echo $row['id_lev']; ?>">Delete</a>
            </td>
          </tr>   
        <?php } ?>
        </table>

    </section>

       <!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>