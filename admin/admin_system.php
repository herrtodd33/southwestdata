<?php
// Get the password function from the server
include('../get_password.php');
// Get the password from the function
$password = getPassword();
// Get the attempted login from the user
$login = $_POST["password"];
// Check if the attempt matches the server password
if($login == $password) {
    // Successful login proceed with admin panel
    ?>
    <h2>Plants</h2>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Attributes</td>
            <td>Photo</td>
        </tr>
        <tr>
            <form action="/admin/add_plant.php" method="POST">
                <td>(autogen) <input type="submit" value="add"></td>
                <td><input type="text" name="name" placeholder="Name"></td>
                <td><input type="text" name="description" placeholder="Description"></td>
                <td><input type="text" name="attributes" placeholder="Attributes"></td>
                <td><input type="text" name="photo" placeholder="Photo URL"></td>
            </form>
        </tr>
        <?php
        // Include the database connection file
        include_once('../connect_to_db.php');
        // Set's up $database_connection object

        // The SQL for getting a list of plants from the database
        $get_plants_sql = "SELECT * FROM plants ORDER BY name ASC";

        // Run the SQL
        $mysqli_result_object = $database_connection->query($get_plants_sql);

        // Get an associative array from the result object
        $associative_array_of_plants = $mysqli_result_object->fetch_all(MYSQLI_ASSOC);

        // Loop through each of the plants and make the links to the plant render page
        foreach($associative_array_of_plants as $plant) {
          echo "<tr>";
          echo "<td>";
          echo $plant["id"];
          echo "</td>";
          echo "<td>";
          echo $plant["name"];
          echo "</td>";
          echo "<td>";
          echo $plant["description"];
          echo "</td>";
          echo "<td>";
          echo $plant["attributes"];
          echo "</td>";
          echo "<td>";
          echo "<img style='width:30px; height:30px; border-radius:3px;' src='" . $plant['photo'] . "'><br><i>" . $plant['photo'] . "</i>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
    </table>
    <?php
} else {
    // Incorrect login display error
    echo "Incorrect login...";
}
