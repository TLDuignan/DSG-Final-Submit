<?php 
  /**
  * connect to database
  */
  include ('db_connection.php');
 /**
  * get info from database
  */
  $stmt = $db_connect->prepare("SELECT * FROM patterns_pat");
  //run query
  $stmt->execute(); 
  //get results
  $patterns = $stmt->get_result();

?>
