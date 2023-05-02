<?php 
 /**
  * connect to database
  */
  include ('db_connection.php');
  /**
  * get info from database
  */
  $stmt = $db_connect->prepare("SELECT * FROM tutorials_tur");
  //run query
  $stmt->execute();
  //get results
  $tutorials = $stmt->get_result();

?>