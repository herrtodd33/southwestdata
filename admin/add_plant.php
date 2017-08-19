<?php
// Include the database connection file
include_once('../connect_to_db.php');
// Get the new name
$name = $_POST['name'];
// Get the new description
$description = $_POST['description'];
// Get the new attributes
$attributes = $_POST['attributes'];
// Get the new name
$photo =  $_POST['photo'];
// The SQL for getting a list of plants from the database
$add_plants_sql = "INSERT INTO plants ('id', 'name', 'description', 'attributes', 'photo') VALUES(NULL, '$name', '$description', '$attributes', '$photo')";
// Echo the SQL
echo "Running SQL: " . $add_plants_sql;
// Run the SQL to Add the plant
$mysqli_result_object = $database_connection->query($add_plants_sql);
echo $mysqli_result_object;
// Echo out the result
print_r($mysqli_result_object);
