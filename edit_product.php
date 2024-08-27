<?php
    // Include the database configuration file
    require ('connect.php');
    include ('edit_header.php');
    // Get the ID from the URL
    $id = $_GET['id'];

    // Prepare the SQL query
    $sql = "SELECT drinks.*, inventory.Quantity 
            FROM drinks 
            LEFT JOIN inventory 
            ON drinks.DrinkID = inventory.DrinkID 
            WHERE drinks.DrinkID = :id";

    // Initialize a statement
    $stmt = $db->prepare($sql);

    // Bind the ID to the statement
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch the product data
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit  Product</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="js/header.js"></script>
</head>
<body>
    <div class="edit_container">
        <form id="edit_form" method="post"  action="update_product.php">
            <img id="product_image" src="<?php echo $product['Image']; ?>" alt="Product Image">
            <h1>Edit This Product</h1>
            <input type="hidden" name="id" value="<?php echo $product['DrinkID']; ?>">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $product['Name']; ?>"><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"><?php echo $product['Description']; ?></textarea><br>
            <label for="alcohol_content">Alcohol Content:</label><br>
            <input type="text" id="alcohol_content" name="alcohol_content" value="<?php echo $product['AlcoholContent']; ?>"><br>
            <label for="volume">Volume:</label><br>
            <input type="text" id="volume" name="volume" value="<?php echo $product['Volume']; ?>"><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value="<?php echo $product['Price']; ?>"><br>
            <label for="quantity">Quantity:</label><br>
            <input type="text" id="quantity" name="quantity" value="<?php echo $product['Quantity']; ?>"><br>
            <label for="image">Image:</label><br>
            <input type="text" id="image" name="image" value="<?php echo $product['Image']; ?>"><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
