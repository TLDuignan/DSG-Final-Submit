<?php
@include '../private/db_connection.php';  

session_start();

if(!isset($_SESSION['user_id'])){
   header('location:../login.php');
}
?>

<?php include('../private/shared/user_header.php') ?>
<!-- Imported Public Header -->  

<section id="tutorials" class="mx-5 px-3 py-3">
  <div class="container">
    <h2>Tutorial Gallery</h2>
    <hr>
  </div>
   <!-- Tutorials -->
  <div class="row container-fluid justify-content-center mb-5">
    <!-- get tutorials from database -->
    <?php include('../private/get_tutorials.php');  ?>
    <?php while($row=$tutorials->fetch_assoc()){ ?>

    <div class="col-md-7">
        <img class="img-fluid rounded mb-3" src="../assets/images/<?php echo $row['img_tur'];?>"  width="500" height="300" alt="image of completed stained glass pattern">
      </div>
      <div class="col-md-5">
        <h3><?php echo $row['title_tur'];?></h3>
        <p><?php echo $row['description_tur'];?></p>
        <p class="m-4">Skill Level: <?php echo $row['level_lev'];?></p>
        <p class="m-4">Type: <?php echo $row['type_cat'];?></p>
        <a class="g-btn m-4" href="../assets/pdf/<?php echo $row['pdf_tur'];?>" download="<?php echo $row['title_tur']; ?>">Download Tutorial</a>
      </div>
      <hr>
    <?php } ?>
  </div>
</section>

<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>
   
  




   