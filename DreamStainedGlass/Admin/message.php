<?php 
  /**
   * check to see if any messages are set.
   */
  if(isset($_SESSION['message'])):
?>

 <!-- Create error and success messages. -->

<div class="alert alert-warning" role="alert">
  <p class="text-center"><strong><?= $_SESSION['message']; ?></strong></p>
</div>

<?php
  /**
  * deletes message
  */
  unset($_SESSION['message']);
  endif;
?>