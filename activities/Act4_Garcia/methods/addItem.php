<?php
    include('connectDb.php');

    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $unit = $_POST['unit'];
    $inventory_qty = $_POST['inventory_qty'];
    $item_description = $_POST['item_description'];
    $price = $_POST['price'];

    $insertItem = "INSERT INTO `items` (item_code, `item_name`, `unit`, `inventory_qty`, `item_description`, `price`) 
    VALUES ('$item_code', '$item_name', '$unit', '$inventory_qty', '$item_description', '$price');";
    mysqli_query($connect, $insertItem);
    header("Location: ../admin.php?create=success");
?>