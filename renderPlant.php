<?php
include_once('html_start.php');

// Take in the plant ID
$plant_id = $_GET['id'];

// Include the database connection file
include_once('connect_to_db.php');
// Set's up $database_connection object

// The SQL for getting a list of plants from the database
$get_plants_sql = "SELECT * FROM plants WHERE id = " . $plant_id;

// Run the SQL
$mysqli_result_object = $database_connection->query($get_plants_sql);

// Echo out a go home link
echo "<a href='index.php'>Go to Home Page</a><br>";

// Echo out a go back link
echo "<a href='plants.php'>Go Back to All Plants</a><br>";


// Check if we got any rows back
if($mysqli_result_object->num_rows < 1) {
  // If we didn't then warn the user!
 die("No plant with the ID of " . $plant_id . " exists!");
}

// Get an associative array from the result object
$plant = $mysqli_result_object->fetch_assoc();

// Echo out the plant name as the page title
echo "<h1>" . $plant['name'] . "</h1>";
echo "<img class='swdphoto' src='" . $plant['photo'] . "'>";
echo "<h3>Description of the " . $plant['name'] . "</h3>";
echo "<p>" . $plant['description'] . "</p>";
echo "<hr>";
echo "<h3>Attributes of the " . $plant['name'] . "</h3>";
echo "<p>" . $plant['attributes'] . "</p>";
echo "<hr>";
echo "<h3>Photo of the " . $plant['name'] . "</h3>";


include_once('html_end.php');
 ?>
