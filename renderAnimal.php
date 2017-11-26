<?php
include_once('html_start.php');

// Take in the animal ID
$animal_id = $_GET['id'];

// Include the database connection file
include_once('connect_to_db.php');
// Set's up $database_connection object

// The SQL for getting a list of animals from the database
$get_animals_sql = "SELECT * FROM animals WHERE id = " . $animal_id;

// Run the SQL
$mysqli_result_object = $database_connection->query($get_animals_sql);

// Echo out a go home link
echo "<a href='index.php'>Go to Home Page</a><br><br>";

// Echo out a go back link
echo "<a href='animals.php'>Go Back to All Mammals</a><br>";

// Check if we got any rows back
if($mysqli_result_object->num_rows < 1) {
  // If we didn't then warn the user!
 die("No animal with the ID of " . $animal_id . " exists!");
}

// Get an associative array from the result object
$animal = $mysqli_result_object->fetch_assoc();

// Code to remove the audio download button
?>
<style>
video::-internal-media-controls-download-button { display:none; }
video::-webkit-media-controls-enclosure { overflow:hidden; }
video::-webkit-media-controls-panel { width: calc(100% + 30px); /* Adjust as needed */ }
</style>
<?php

// Echo out the animal name as the page title
echo "<h1>" . $animal['name'] . "</h1>";
echo "<h3>Sound of the " . $animal['name'] . "</h3>";
echo "<audio controls>";
echo "<source src='" . $animal['sound'] . "' type='audio/mpeg' controlsList='nodownload'>";
// echo "<p><a href='" . $animal['sound'] . "'>download sound</a></p>";
echo "</audio><br>";
echo "<h3>Lifespan: " . $animal['lifespan'] . " </h3>";
echo "<img class='swdphoto' src='" . $animal['photo'] . "'>";
echo "<h3>Description of the " . $animal['name'] . "</h3>";
echo "<p>" . $animal['description'] . "</p>";
echo "<hr>";
echo "<h3>Attributes of the " . $animal['name'] . "</h3>";
echo "<p>" . $animal['attributes'] . "</p>";
echo "<hr>";


include_once('html_end.php');
 ?>
