<?php
@include '../private/db_connection.php';  

session_start();

if(!isset($_SESSION['user_id'])){
  header('location:../login.php');
}
?>

<?php include('../private/shared/user_header.php') ?>
<!-- Imported Public Header -->  

<section id="patterns" class="mx-5 px-3 py-3">
  <div class="container">
    <h2>Pattern Gallery</h2>
    <hr>
  </div>
  <div class="row container-fluid justify-content-center">

    <?php include('../private/get_patterns.php');  ?>

    <?php while($row=$patterns->fetch_assoc()){ ?>

    <div class="card text-center col-lg-3 col-md-4 col-sm-12 bg-light bg-gradient bg-opacity-75 m-3">
        <img class="img-fluid justify-content-center m-auto my-4" src="../assets/images/<?php echo $row['img_pat'];?>" alt="image of completed stained glass pattern" width="200" height="200"/>
        <h3><?php echo $row['title_pat']; ?></h3>
        <hr>
        <h4 class="m-3"><?php echo $row['description_pat']; ?></h4>
        <p>Skill Level: <?php echo $row['level_lev'];?></p>
        <p>Type: <?php echo $row['type_cat'];?></p>
        <a class="g-btn" href="../assets/pdf/<?php echo $row['pdf_pat'];?>" download="<?php echo $row['title_pat']; ?>">Download Pattern</a>
      </div>
    <?php } ?>
  </div>
</section>

<!-- Imported Public Footer --> 
<?php include('../private/shared/footer.php') ?>