<?php
include_once('html_start.php');

// Take in the bird ID
$bird_id = $_GET['id'];

// Include the database connection file
include_once('connect_to_db.php');
// Set's up $database_connection object

// The SQL for getting a list of birds from the database
$get_birds_sql = "SELECT * FROM birds WHERE id = " . $bird_id;

// Run the SQL
$mysqli_result_object = $database_connection->query($get_birds_sql);

// Echo out a go home link
echo "<a href='index.php'>Go to Home Page</a><br>";

// Echo out a go back link
echo "<a href='birds.php'>Go Back to All Birds</a><br>";


// Check if we got any rows back
if($mysqli_result_object->num_rows < 1) {
  // If we didn't then warn the user!
 die("No bird with the ID of " . $bird_id . " exists!");
}

// Get an associative array from the result object
$bird = $mysqli_result_object->fetch_assoc();

// Echo out the bird name as the page title
echo "<h1>" . $bird['name'] . "</h1>";
echo "<h3>Sound of the " . $bird['name'] . "</h3>";
echo "<audio controls>";
echo "<source src='" . $bird['sound'] . "' type='audio/mpeg'>";
echo "<p><a href='" . $bird['sound'] . "'>download sound</a></p>";
echo "</audio><br>";
echo "<h3>Lifespan: " . $bird['lifespan'] . " </h3>";
echo "<img class='swdphoto' src='" . $bird['photo'] . "'>";
echo "<h3>Description of the " . $bird['name'] . "</h3>";
echo "<p>" . $bird['description'] . "</p>";
echo "<hr>";
echo "<h3>Attributes of the " . $bird['name'] . "</h3>";
echo "<p>" . $bird['attributes'] . "</p>";
echo "<hr>";
echo "<h3>Photo of the " . $bird['name'] . "</h3>";


include_once('html_end.php');
 ?>
