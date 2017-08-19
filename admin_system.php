<?php
// Get the password function from the server
include('get_password.php');
// Get the password from the function
$password = getPassword();
// Get the attempted login from the user
$login = $_POST["password"];
// Check if the attempt matches the server password
if($login == $password) {
    echo "Welcome!";
} else {
    echo "login failed!";
}
