<<?php
require ('connect.php');
require ('header.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$sql = "SELECT DrinkID, Name, Description, AlcoholContent, Volume, Price, Image FROM drinks";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liquor Store</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="js/header.js"></script>
</head>
<body>
    <div class="container">
    <?php
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        do {
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
        } while ($row = $result->fetch(PDO::FETCH_ASSOC));
    } else {
        echo "No products found";
    }
    ?>
    </div>
</body>
</html>