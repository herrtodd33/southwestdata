<?php
include_once('html_start.php');
?>
  <h1>Search for a Mammal</h1>
  <a href="index.php">Go back home</a>
  <hr>
  <form action="processAnimalSearch.php" method="POST">
    <input type="text" name="searchterm" size="50" placeholder="Enter mammal name or part of the mammal name" autofocus>
    <input type="submit" value="Search">
  </form>
<?php
include_once('html_end.php');
?>
