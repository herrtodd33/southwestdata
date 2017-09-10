<?php
include_once('html_start.php');

$searchterm = $_POST['searchterm'];

echo "<h1>Results</h1>";
echo "<hr>";

// Include the database connection file
include_once('connect_to_db.php');
// Set's up $database_connection object

// The SQL for getting a list of animals from the database
$get_animals_sql = "SELECT * FROM animals WHERE name LIKE '%" . $searchterm . "%'";

// Run the SQL
$mysqli_result_object = $database_connection->query($get_animals_sql);

// Check if we got any rows back
if($mysqli_result_object->num_rows < 1) {
  // If we didn't then warn the user!
 die($mysqli_result_object->num_rows . " results were found matching <b>" . $searchterm . "</b>");
}
// Echo out a go back link
echo "<a href='animals.php'>Go Back to All Mammals</a><br>";

// Get an associative array from the result object
$associative_array_of_animals = $mysqli_result_object->fetch_all(MYSQLI_ASSOC);

// Let them know how many results came back
echo $mysqli_result_object->num_rows . " results were found matching <b>" . $searchterm . "</b><br><br>";

// Start the table
echo "<table border='1' cellpadding='16'>";

// Render the header row of the table
echo "<tr><td>Name</td><td>Photo</td></tr>";

// Loop through each of the animals and make the links to the animal render page
foreach($associative_array_of_animals as $animal) {
  echo "<tr>";
  echo "<td>";
  echo $animal["name"];
  echo "</td>";
  echo "<td>";
  echo "<a href='renderAnimal.php?id=" . $animal['id'] . "'>";
  echo "<img style='width:100px; height:100px; border-radius:12px;' src='" . $animal['photo'] . "'></a><br><br>";
  echo "</td>";
  echo "</tr>";
}

// End the table
echo "</table>";
include_once('html_end.php');
