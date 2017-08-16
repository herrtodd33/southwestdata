<?php
include_once('html_start.php');
?>
<h1>Animals</h1>
<a href="index.php">Go back home</a>
<hr>
<h5>Click on photo below</h5>
<?php
// Include the database connection file
include_once('connect_to_db.php');
// Set's up $database_connection object

// The SQL for getting a list of animals from the database
$get_animals_sql = "SELECT * FROM animals ORDER BY name ASC";

// Run the SQL
$mysqli_result_object = $database_connection->query($get_animals_sql);

// Get an associative array from the result object
$associative_array_of_animals = $mysqli_result_object->fetch_all(MYSQLI_ASSOC);

// Start the table
echo "<table border='1' cellpadding='10'>";

// Render the header row of the table
echo "<tr><td><b><center>Name</td><td><b><center>Photo</td></tr>";

// Loop through each of the animals and make the links to the animal render page
foreach($associative_array_of_animals as $animal) {
  echo "<tr>";
  echo "<td>";
  echo "<center>";
  echo $animal["name"];
  echo "</td>";
  echo "<td>";
  echo "<a href='renderAnimal.php?id=" . $animal['id'] . "'>";
  echo "<img style='width:130px; height:130px; border-radius:12px;' src='" . $animal['photo'] . "'></a><br><br>";
  echo "</td>";
  echo "</tr>";
}

// End the table
echo "</table>";

include_once('html_end.php');
?>
