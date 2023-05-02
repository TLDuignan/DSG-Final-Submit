<?php
  http_response_code(404);
  include('404.php'); // provide your own HTML for the error page
  die();
?>

<?php include('private/shared/404_header.php')?>
<!-- Imported Public Header --> 
    <div class="container p-5 m-5">
    <h1 class="text-center p-5 m-5">404 Error - Page Not Found!</h1>
    </div>

  <?php include('private/shared/footer.php')?>