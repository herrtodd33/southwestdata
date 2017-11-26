<?php
$suggestion = $_POST['suggestion'];

// Include the database connection file
include_once('../connect_to_db.php');
// Set's up $database_connection object

// The SQL for getting a list of animals from the database
$add_suggestion_query = "INSERT INTO `swd`.`suggestions` (`suggestion`) VALUES ('" . $suggestion . "')";

// Run the SQL
$output = $database_connection->query($add_suggestion_query);

?>

Submitted suggestion!

<meta http-equiv="refresh" content="0; url=http://southwestdata.info/" />
