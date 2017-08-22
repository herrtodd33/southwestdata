<?php
// Include the database connection file
include_once('../connect_to_db.php');
// Get the new name
$name = $_POST['name'];
// Get the new description
$description = $_POST['description'];
// Get the new attributes
$attributes = $_POST['attributes'];
// Get the new photo
$photo =  $_POST['photo'];
// The SQL for getting a list of plants from the database
$add_plants_sql = "INSERT INTO plants (`name`, `description`, `attributes`, `photo`) VALUES('$name', '$description', '$attributes', '$photo')";
// Run the SQL to Add the plant
if ($database_connection->query($add_plants_sql) === TRUE) {
    // Return success message
    echo "New plant added successfully";
} else {
    // Return error
    echo "Error: " . $add_plants_sql . "<br>" . $database_connection->error;
}
