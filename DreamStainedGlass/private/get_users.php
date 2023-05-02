<?php 
 /**
  * connect to database
  */
  include ('db_connection.php');

  /**
  * get info from database
  */
  $stmt = $db_connect->prepare("SELECT * FROM users_usr");
  //run query
  $stmt->execute();
  //get results
  $users = $stmt->get_result();

?>