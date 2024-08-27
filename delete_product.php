<?php
require ('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt2 = $db->prepare("DELETE FROM inventory WHERE DrinkID = :id");
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();

    $stmt = $db->prepare("DELETE FROM drinks WHERE DrinkID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: admin_dashboard.php');
}
?>