<?php
//Including Database configuration file.
    include "./utils/connect_db.php";
//Getting value of "search" variable from "script.js".
    if (isset($_POST['search'])) {
//Search box value assigning to $society variable.
        $society = $_POST['search'];
//Search query.
        $query = $bdd -> prepare("SELECT society FROM clients WHERE society LIKE '%$society%' LIMIT 5");
//Query execution
        $query -> execute();//Creating unordered list to display result.
   echo '
<ul>
   ';
   //Fetching result from database.
   while ($result = $query -> fetchAll(PDO::FETCH_ASSOC)) {
       ?>
   <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
   <li onclick='fill("<?php echo $result['society']; ?>")'>
   <a>
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo $result['society']; ?>
   </li></a>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}}
?>
</ul>