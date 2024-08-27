<?php
require ('connect.php');
require ('header.php');

if (isset($_GET['search-input'])) {
    $searchTerm = strtolower($_GET['search-input']);

    // Prepare an SQL statement to search for products
    $stmt = $db->prepare("SELECT DrinkID, Name, Description, AlcoholContent, Volume, Price, Image FROM drinks WHERE LOWER(Name) LIKE :searchTerm");

    // Bind the search term to the SQL statement
    $stmt->bindValue(':searchTerm', "$searchTerm%");

    // Execute the statement
    $stmt->execute();

    // Fetch all the matching rows
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liquor Store</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="js/header.js"></script>
    <script>
        window.onload = function() {
            if(performance.navigation.type == 1){
                window.location.href = 'liquorhomepage.php';
            }
        }
    </script>
</head>
<body>
    <div id="results">
        <?php
            $numResults = count($results);
            echo "<h2>$numResults results found</h2>";
        ?>
    </div>
    <?php
    if ($results) {
        foreach ($results as $row) {
    ?>
        <div class="product-card">
            <img src="<?php echo $row["Image"]; ?>" alt="<?php echo $row["Name"]; ?>">
            <h2><?php echo $row["Name"]; ?></h2>
            <p><?php echo $row["Description"]; ?></p>
            <p>Alcohol Content: <?php echo $row["AlcoholContent"]; ?>%</p>
            <p>Volume: <?php echo $row["Volume"]; ?>ml</p>
            <p>Price: $<?php echo $row["Price"]; ?></p>
        </div>
    <?php
        } 
    } else {
        echo "<h2>Sorry we don not have any products for $searchTerm.</h2>";
    }
    ?>
</body>
</html>