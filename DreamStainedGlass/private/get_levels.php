<?php 
/**
  * connect to database
  */
  include ('db_connection.php');

 /**
  * get info from database
  */
  $stmt = $db_connect->prepare("SELECT * FROM level_lev");
  //run query
  $stmt->execute();
  //get results 
 $levels = $stmt->get_result();

?>