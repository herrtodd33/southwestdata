<!DOCTYPE html>
<html>
<head>
  <title>SouthWest Data</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1>Birds</h1>
<a href="index.php">Go back home</a>
<hr>
<?php
// Include the database connection file
include_once('connect_to_db.php');
// Set's up $database_connection object

// The SQL for getting a list of birds from the database
$get_birds_sql = "SELECT * FROM birds ORDER BY name ASC";

// Run the SQL
$mysqli_result_object = $database_connection->query($get_birds_sql);

// Get an associative array from the result object
$associative_array_of_birds = $mysqli_result_object->fetch_all(MYSQLI_ASSOC);

// Start the table
echo "<table border='1' cellpadding='16'>";

// Render the header row of the table
echo "<tr><td>Name</td><td>Photo</td></tr>";

// Loop through each of the birds and make the links to the bird render page
foreach($associative_array_of_birds as $bird) {
  echo "<tr>";
  echo "<td>";
  echo $bird["name"];
  echo "</td>";
  echo "<td>";
  echo "<a href='renderBird.php?id=" . $bird['id'] . "'>";
  echo "<img style='width:100px; height:100px; border-radius:12px;' src='" . $bird['photo'] . "'></a><br><br>";
  echo "</td>";
  echo "</tr>";
}

// End the table
echo "</table>";
 ?>
</body>
</html>
