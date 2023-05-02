<?php 
 /**
  * connect to database
  */
 include 'private/db_connection.php';
  /**
  * Assign User
  */
 session_start();
?>

<!-- Imported Public Header --> 
<?php include('private/shared/public_header.php') ?>

<section class="container text-center m-5 p-5">

  <h1>Signup Success</h1>
  <hr>
  <p class="m-4">Thank you for becoming a member.</p>
  <a class="b-btn" href="login.php">Login Now</a>

</section>

<!-- Imported Public Footer --> 
<?php include('private/shared/footer.php') ?>