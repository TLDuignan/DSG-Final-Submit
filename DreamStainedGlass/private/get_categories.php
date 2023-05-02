<?php 
  /**
  * connect to database
  */
  include ('db_connection.php');
  /**
   * get info from database
   */
  $stmt = $db_connect->prepare("SELECT * FROM categories_cat");
  // run query
  $stmt->execute();
  //get results
  $categories = $stmt->get_result();

?>