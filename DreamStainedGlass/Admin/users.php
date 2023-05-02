<?php
   /**
  * connect to database
  */
  include '../private/db_connection.php';
 

  /**
   * Admin only
   */
  session_start();

  if(!isset($_SESSION['admin_id'])){
  header('location:../login.php');
 }

?>

<?php include('../private/shared/admin_header.php')?>
<!-- Imported Public Header -->  

    <!-- Users Table -->

    <section>
      <h1 class="m-5">Users</h1>
      <div class="m-5">
        <a class="g-btn mx-3" href="admin_dashboard.php">Back to Dashboard</a>
        <a class="g-btn align-right" href="users_create.php">Add New</a>  
      </div>
      <?php include('../private/get_users.php'); ?>
  </section>
  <section class="m-5">  
      <table class="table table-bordered my-2" id="users">
        <tr>
          <th>Id Code</th>
          <th>Email</th>
          <th>Username</th>
          <th>Passsword</th>
          <th>Is Admin</th>
          <th>Actions</th>
        </tr>
        
        <?php while($row=$users->fetch_assoc()) {  ?>
          <tr>
            <td><?php echo $row['id_usr']; ?></td>
            <td><?php echo $row['email_usr']; ?></td>
            <td><?php echo $row['username_usr']; ?></td>
            <td><?php echo $row['password_usr']; ?></td>
            <td><?php echo $row['is_admin']; ?></td>
            <td>
              <a class="btn btn-success" href="users_view.php?id=<?php echo $row['id_usr']; ?>">View</a>
              <a class="btn btn-info" href="users_edit.php?id=<?php echo $row['id_usr']; ?>">Edit</a>
              <a class="btn btn-danger" href="users_delete.php?id=<?php echo $row['id_usr']; ?>">Delete</a>
            </td>
            
          </tr>   
          <?php } ?>
        </table>

  </section>

<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>