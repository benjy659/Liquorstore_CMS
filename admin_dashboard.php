<?php

require ('connect.php');
include ('HeaderAdmin.php');


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Redirect non-admin users to the home page
if (!isset($_SESSION['AccessLevel']) || $_SESSION['AccessLevel'] != 2) {
    header('Location: liquorhomepage.php?error=noaccess'); // Redirect non-admin users to the home page
    exit();
}



// Get all products from the database
$result = $db->query("SELECT drinks.*, inventory.Quantity,inventory.Alertlevel
                        FROM drinks 
                        LEFT JOIN inventory 
                        ON drinks.DrinkID = inventory.DrinkID");
if ($result->rowCount() > 0) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="js/header.js"></script>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Alcohol Content</th>
            <th>Volume</th>
            <th>Price</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Alert Level</th>
            <th>Actions</th>
            <th>Stock Status</th>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row["Name"]; ?></td>
                <td><?php echo $row["Description"]; ?></td>
                <td><?php echo $row["AlcoholContent"]; ?>%</td>
                <td><?php echo $row["Volume"]; ?>ml</td>
                <td>$<?php echo $row["Price"]; ?></td>
                <td><img src="<?php echo $row["Image"]; ?>" alt="<?php echo $row["Name"]; ?>"></td>
                <td><?php echo $row["Quantity"]; ?></td>
                <td>If Quantity Below <?php echo $row["Alertlevel"]; ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row["DrinkID"]; ?>">Edit</a>
                    <a href="delete_product.php?id=<?php echo $row["DrinkID"]; ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                </td>
                <td>
                    <?php if ($row["Quantity"] < $row["Alertlevel"]): ?>
                        <span style="color:red;">Warning: Low Stock</span>
                    <?php else: ?>
                        <span style="color:green;">In Stock</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php
} else {
    echo "No products found";
}
?>
</body>
</html>