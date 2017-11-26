<?php include_once('html_start.php'); ?>
<h2><a href="plants.php" class="main-link"><i class="fa fa-tree" aria-hidden="true"></i> View All Plants</a>
  - <a href="searchPlant.php" class="main-link"><i class="fa fa-search"></i> Search for a Plant</a></h2>
<hr>
<h2><a href="animals.php" class="main-link"><i class="fa fa-linux" aria-hidden="true"></i> View All Mammals</a>
  - <a href="searchAnimal.php" class="main-link"><i class="fa fa-search"></i> Search for a Mammal</a></h2>
<hr>
<h2><a href="birds.php" class="main-link"><i class="fa fa-twitter" aria-hidden="true"></i> View All Birds</a>
  - <a href="searchBird.php" class="main-link"><i class="fa fa-search"></i> Search for a Bird</a></h2>

<br><br>

<form method="POST" action="/backend/submitsuggestion.php">
    <textarea placeholder="Enter your suggestion here..." name="suggestion" rows="4" cols="50"></textarea>
    <br>
    <input type="submit" value="Submit Suggestion">
</form>

<?php include_once('html_end.php'); ?>
