<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dream Stained Glass <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <link rel="stylesheet" href="assets/css/styles.css">
  <link href="favicon.ico" rel="icon">
  <script src="assets/js/validation.js" defer></script>

</head>
  <body>
    <!-- NavBar -->
      
    <nav class="navbar navbar-expand-lg">
      <div id="navbar-cont" class="container-fluid">
        <div id="banner">
          <a  class="navbar-brand" href="index.php">
            <div id="brand"> 
              <img id="logo" class="img-fluid" src="assets/images/DSG-Logo.png" alt="Dream stained glass Logo" width="127" height="127">
              <h1>Dream Stained Glass</h1>
            </div>
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-menu" id="navbarNav">
          <ul class="nav-list navbar-nav">
            <li class="nav-item">
              <a class="nav-link"  href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->