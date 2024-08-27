<?php
require ('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $alcohol_content = $_POST['alcohol_content'];
    $volume = $_POST['volume'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];

    $smt2 = $db->prepare("UPDATE inventory SET Quantity = :quantity WHERE DrinkID = :id");
    $smt2 -> bindParam(':quantity', $quantity);
    $smt2 -> bindParam(':id', $id);

    $smt2 -> execute();

    $stmt = $db->prepare("UPDATE drinks SET Name = :name, Description = :description, AlcoholContent = :alcohol_content, Volume = :volume, Price = :price,  Image = :image WHERE DrinkID = :id");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':alcohol_content', $alcohol_content);
    $stmt->bindParam(':volume', $volume);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $id);

    $stmt->execute();



    header('Location: admin_dashboard.php?id=' . $id);
}
?>