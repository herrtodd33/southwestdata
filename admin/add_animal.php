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
// Get the new lifespan
$lifespan =  $_POST['lifespan'];
// Get the new sound
$sound =  $_POST['sound'];
// The SQL for getting a list of animals from the database
$add_animals_sql = "INSERT INTO animals (`name`, `description`, `attributes`, `photo`, `lifespan`, `sound`)
VALUES('$name', '$description', '$attributes', '$photo', '$lifespan', '$sound' )";
// Run the SQL to Add the animal
if ($database_connection->query($add_animals_sql) === TRUE) {
    // Return success message
    echo "New animal added successfully";
} else {
    // Return error
    echo "Error: " . $add_animals_sql . "<br>" . $database_connection->error;
}
