<?php
@include '../private/db_connection.php';  

session_start();

if(!isset($_SESSION['user_id'])){
  header('location:../login.php');
}
?>

<?php include('../private/shared/user_header.php') ?>
<!-- Imported Public Header -->  

<section id="c-logout" class="mx-5 text-center py-5">
  <?php 
       /**
         * Get user information.
         */
       $current_user = $_SESSION['user_id'];
       $user_info= "SELECT * FROM users_usr WHERE id_usr = '$current_user' ";

       $run_select = mysqli_query($db_connect, $user_info);

       if(mysqli_num_rows($run_select) > 0) {
          while($row = mysqli_fetch_array($run_select)) {
            //  print_r($row['username_usr']);
          
      ?>
    <div class="row container mx-auto">
      <h2>Hey <?php echo $row['username_usr']; ?>, <br> Do you want to log out?</h2>
    </div>
    <hr>
    <div>
      <a href ="../private/logout.php" class="g-btn col-3 d-grid mx-auto p-3">Logout</a>
      <a href ="user_account.php" class="b-btn col-3 d-grid mx-auto p-3">No</a>

    </div>
    <?php
        }
      }
    ?>
</section>

<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>

