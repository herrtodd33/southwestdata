<?php
// Include the database connection file
include_once('../connect_to_db.php');
// The SQL for getting a list of plants from the database
$add_plants_sql = "INSERT INTO plants id, name, description, attributes, photo VALUES(NULL, $_POST['name'], $_POST['description'], $_POST['attributes'], $_POST['photo'])";
// Run the SQL to Add the plant
$mysqli_result_object = $database_connection->query($add_plants_sql);
// Echo out the result
print_r($mysqli_result_object);
