<?php
    include('connectDb.php');

    if(isset($_POST["submit"])) {
        $orderNum = $_POST['order_num'];
        $customerNum = 'MRKN'. '-' . 02 . '-' . rand(1, 5);
        $customerName = $_POST['customer_name'];
        $emailAddress = $_POST['email_address'];
        $address = $_POST['address'];
        $mobileNum = $_POST['mobile_num'];

        $sql = "INSERT INTO `customer` (`customer_number`, `name`, `home_address`, `email_address`, `mobile_number`) 
        VALUES ('$customerNum', '$customerName', '$address', '$emailAddress', '$mobileNum');";
        mysqli_query($connect, $sql);

        for($a = 0; $a < count($_POST["itemNum"]); $a++) {

            $get = "SELECT * FROM items WHERE item_name = '" . $_POST["productName"][$a]. "';";
            $items_result =  mysqli_query($connect, $get);
            $items_checkResult = mysqli_num_rows($items_result);
            $data = [];

            if ($items_checkResult > 0) {
                while ($row = mysqli_fetch_assoc($items_result)) {
                    // $insertToOrderDetails = "INSERT INTO `order_details` (`order_number`, `item_code`, `quantity`) VALUES ('$orderNum', '" .$row["prodCode"] ."', '".$_POST["quantity"][$a]."')";
                    $insertToOrders = "INSERT INTO `orders` (`customer_number`, `order_number`, `order_amount`) VALUES ('$customerNum', '2', '".$_POST["quantity"][$a] * $row["order_amount"]."')";
                    // mysqli_query($connect, $insertToOrderDetails);
                    mysqli_query($connect, $insertToOrders); 
                }
            }

           
        }
    }

    header("Location: ../index.php?order=success");

?>