<?php
@include '../private/db_connection.php';  

session_start();

if(!isset($_SESSION['user_id'])){
  header('location:../login.php');
}
?>

<?php include('../private/shared/user_header.php') ?>
<!-- Imported Public Header -->  
<section id="Shop" class="mx-5 px-3 py-3">
  <div class="container pt-5 mt-5">
    <h1 class="text-center">Shop Essentials</h1>
    <hr>
  </div>
</section>
<!-- SHOP TOOLS -->
<section id="tools">
  <h2 class="mx-5 px-3 py-3">Glass Tools</h2>
  <div class="row container-fluid justify-content-center">
    <!-- new product -->
    <div class="card text-center col-lg-3 col-md-4 col-sm-12 bg-light bg-gradient bg-opacity-75 m-3">
      <img src="../assets/images/toyo_dry_wheel_supercutter.png" class="img-fluid justify-content-center m-auto my-4" alt="toyo-dry-wheel-supercutter" width="300" height="300">
      <h4 class="m-3">Toyo Dry Wheel Supercutter</h4>
      <p>$28.95</p>
      <a class="g-btn" href="https://www.delphiglass.com/mosaic-supplies/tools-supplies/toyo-dry-wheel-supercutter">View Product</a>
    </div>
    <!-- new product -->
    <div class="card text-center col-lg-3 col-md-4 col-sm-12 bg-light bg-gradient bg-opacity-75 m-3">
      <img src="../assets/images/fid_pack.png" class="img-fluid justify-content-center m-auto my-4" alt="Studio pro fid pack" width="300" height="300">
      <h4 class="m-3">Studio Pro Fid Pack</h4>
      <p>$6.95</p>
      <a class="g-btn" href="https://www.delphiglass.com/lead-came-supplies/came-saws-tools/studio-pro-fid-pack">View Product</a>
    </div>
    <!-- new product -->
    <div class="card text-center col-lg-3 col-md-4 col-sm-12 bg-light bg-gradient bg-opacity-75 m-3">
      <img src="../assets/images/homasote_board.png" class="img-fluid justify-content-center m-auto my-4" alt="24x24 Homasote Board" width="300" height="300">
      <h4 class="m-3">Homasote Board</h4>
      <p>$17.95</p>
      <a class="g-btn" href="https://www.delphiglass.com/soldering-supplies/supplies-accessories/24-x-24-x-1-2-homasote-board">View Product</a>
    </div>
    <!-- new product -->
    <div class="card text-center col-lg-3 col-md-4 col-sm-12 bg-light bg-gradient bg-opacity-75 m-3">
      <img src="../assets/images/breaker_pliers.png" class="img-fluid justify-content-center m-auto my-4" alt="Breaker/Grozer Pliers" width="300" height="300">
      <h4 class="m-3">Breaker / Grozer Pliers</h4>
      <p>$12.95</p>
      <a class="g-btn" href="https://www.delphiglass.com/glass-cutters-tools/pliers-nippers/3-8-breaker-grozer-pliers">View Product</a>
    </div>
    <!-- new product -->
    <div class="card text-center col-lg-3 col-md-4 col-sm-12 bg-light bg-gradient bg-opacity-75 m-3">
      <img src="../assets/images/soldering_station.png" class="img-fluid justify-content-center m-auto my-4" alt="Weller Complete Soldering Station" width="300" height="300">
      <h4 class="m-3">Weller Soldering Station</h4>
      <p>$134.95</p>
      <a class="g-btn" href="https://www.delphiglass.com/soldering-supplies/soldering-irons-tips/weller-complete-soldering-station">View Product</a>
    </div>
    <!-- new product -->
    <div class="card text-center col-lg-3 col-md-4 col-sm-12 bg-light bg-gradient bg-opacity-75 m-3">
      <img src="../assets/images/gryphon_studio_grinder.png" class="img-fluid justify-content-center m-auto my-4" alt="Gryphon Studio Grinder" width="300" height="300">
      <h4 class="m-3">Gryphon Studio Grinder</h4>
      <p>$199.95</p>
      <a class="g-btn" href="https://www.delphiglass.com/grinders-accessories/glass-grinders/gryphon-studio-grinder">View Product</a>
    </div>
     
  </div>
</section>



<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>

