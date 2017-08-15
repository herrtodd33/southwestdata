<?php
include_once('html_start.php');
?>
<h1>Plants</h1>
<a href="index.php">Go back home</a>
<hr>
<?php
// Include the database connection file
include_once('connect_to_db.php');
// Set's up $database_connection object

// The SQL for getting a list of plants from the database
$get_plants_sql = "SELECT * FROM plants ORDER BY name ASC";

// Run the SQL
$mysqli_result_object = $database_connection->query($get_plants_sql);

// Get an associative array from the result object
$associative_array_of_plants = $mysqli_result_object->fetch_all(MYSQLI_ASSOC);

// Start the table
echo "<table border='1' cellpadding='16'>";

// Render the header row of the table
echo "<tr><td>Name</td><td>Photo</td></tr>";

// Loop through each of the plants and make the links to the plant render page
foreach($associative_array_of_plants as $plant) {
  echo "<tr>";
  echo "<td>";
  echo $plant["name"];
  echo "</td>";
  echo "<td>";
  echo "<a href='renderPlant.php?id=" . $plant['id'] . "'>";
  echo "<img style='width:100px; height:100px; border-radius:12px;' src='" . $plant['photo'] . "'></a><br><br>";
  echo "</td>";
  echo "</tr>";
}

// End the table
echo "</table>";

include_once('html_end.php');
?>
