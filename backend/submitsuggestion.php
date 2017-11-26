<?php
$suggestion = $_POST['suggestion'];

// Include the database connection file
include_once('../connect_to_db.php');
// Set's up $database_connection object

// The SQL for getting a list of animals from the database
$add_suggestion_query = "INSERT INTO suggestions (id, suggestion) VALUES (NULL, " . $suggestion . ")";

// Run the SQL
$database_connection->query($add_suggestion_query);

?>

Submitted suggestion!
