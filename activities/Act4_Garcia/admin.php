<?php
    include('./methods/connectDb.php');

    $qs_customer = "SELECT * FROM customer ORDER BY name ASC;";
    $customer_result = mysqli_query($connect, $qs_customer);
    $customer_checkResult = mysqli_num_rows($customer_result);

    $qs_items = "SELECT * FROM items ORDER BY item_name ASC;";
    $items_result = mysqli_query($connect, $qs_items);
    $items_checkResult = mysqli_num_rows($items_result);

    $qs_orders = "SELECT * FROM orders ORDER BY order_number ASC;";
    $orders_result = mysqli_query($connect, $qs_orders);
    $orders_checkResult = mysqli_num_rows($orders_result);

    $qs_orderDetails = "SELECT * FROM order_details ORDER BY order_number ASC;";
    $orderDetails_result = mysqli_query($connect, $qs_orderDetails);
    $orderDetails_checkResult = mysqli_num_rows($orderDetails_result);

    error_reporting(0)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CET5: Activity 4 - Admin</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <!-- CUSTOMER TABLE -->
    <div class="admindiv">
        <p class="admintitle">Customer Data</p>
        <?php
            if ($_GET['delcustomer'] === 'success') {
                echo "<div id='delsuc' class=''>
                            <div class='d-flex d-flex-end'>
                                <p>Item successfully delete!</p>
                                <button class='d-flex-end' onclick='closeDelSuccess()'>Close</button>
                            </div>
                        </div>";
            }
            
        ?>
        <table class="tablestyle">
            <thead>
                <tr>
                    <th>Customer number</th>
                    <th>Customer name</th>
                    <th>Home address</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($customer_checkResult > 0) {
                    while ($row = mysqli_fetch_assoc($customer_result)) {
                        echo "<tr>";
                        echo "<td>" . $row['customer_number'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['home_address'] . "</td>";
                        echo "<td>" . $row['email_address'] . "</td>";
                        echo "<td>" . $row['mobile_number'] . "</td>";
                        echo "<td>" . '<a href="./methods/delCustomer.php?id=' . $row['id'] . '" class="btnstyle3">Delete</a>' . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- ITEMS TABLE -->
    <div class="admindiv">
        <p class="admintitle">Items Data</p>
        <?php
            if ($_GET['delitem'] === 'success') {
                echo "<div id='delsuc' class=''>
                            <div class='d-flex d-flex-end'>
                                <p>Item successfully delete!</p>
                                <button class='d-flex-end' onclick='closeDelSuccess()'>Close</button>
                            </div>
                        </div>";
            }
            
        ?>
        <table class="tablestyle">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Unit</th>
                    <th>Inventory Quantity</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <button>
                    Add an item
                </button>
                <?php
                if ($items_checkResult > 0) {
                    while ($row = mysqli_fetch_assoc($items_result)) {
                        echo "<tr>";
                        echo "<td>" . $row['item_code'] . "</td>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['unit'] . "</td>";
                        echo "<td>" . $row['inventory_qty'] . "</td>";
                        echo "<td>" . $row['item_description'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . '<a href="./methods/delItem.php?id=' . $row['id'] . '" class="">Delete</a>' . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <!-- add item form -->
        <form method="POST" action="./methods/addItem.php" class="dispNone">
            <div class="inputset">
                <label for="" class="labelstyle1">Item Code</label>
                <input type="text" class="inputstyle1 inputlength1" name="item_code" placeholder="" required>
            </div>
            <div class="inputset">
                <label for="" class="labelstyle1">Item Name</label>
                <input type="text" class="inputstyle1 inputlength1" name="item_name" placeholder="" required>
            </div>
            <div class="inputset">
                <label for="" class="labelstyle1">Unit</label>
                <input type="text" class="inputstyle1 inputlength1" name="unit" placeholder="" required>
            </div>
            <div class="inputset">
                <label for="" class="labelstyle1">Inventory Quantity</label>
                <input type="text" class="inputstyle1 inputlength1" name="inventory_qty" placeholder="" required>
            </div>
            <div class="inputset">
                <label for="" class="labelstyle1">Item Description</label>
                <input type="text" class="inputstyle1 inputlength1" name="item_description" placeholder="" required>
            </div>
            <div class="inputset">
                <label for="" class="labelstyle1">Price</label>
                <input type="text" class="inputstyle1 inputlength1" name="price" placeholder="" required>
            </div>
            <button type="submit" >Add</button>
        </form>
    </div>
    <!-- ORDERS TABLE -->
    <div class="admindiv">
        <p class="admintitle">Orders Data</p>
        <?php
            if ($_GET['delorder'] === 'success') {
                echo "<div id='delsuc' class=''>
                            <div class='d-flex d-flex-end'>
                                <p>Item successfully delete!</p>
                                <button class='d-flex-end' onclick='closeDelSuccess()'>Close</button>
                            </div>
                        </div>";
            }
            
        ?>
        <table class="tablestyle">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Customer Number</th>
                    <th>Order Date</th>
                    <th>Order Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($orders_checkResult > 0) {
                    while ($row = mysqli_fetch_assoc($orders_result)) {
                        echo "<tr>";
                        echo "<td>" . $row['order_number'] . "</td>";
                        echo "<td>" . $row['customer_number'] . "</td>";
                        echo "<td>" . $row['order_date'] . "</td>";
                        echo "<td>" . $row['order_amount'] . "</td>";
                        echo "<td>" . '<a href="./methods/delOrder.php?id=' . $row['id'] . '" class="">Delete</a>' . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- ORDER DETAILS TABLE -->
    <div class="admindiv">
        <p class="admintitle">Order Details</p>
        <?php
            if ($_GET['delorderdetails'] === 'success') {
                echo "<div id='delsuc' class=''>
                            <div class='d-flex d-flex-end'>
                                <p>Item successfully delete!</p>
                                <button class='d-flex-end' onclick='closeDelSuccess()'>Close</button>
                            </div>
                        </div>";
            }
            
        ?>
        <table class="tablestyle">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Item Code</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($orderDetails_checkResult > 0) {
                    while ($row = mysqli_fetch_assoc($orderDetails_result)) {
                        echo "<tr>";
                        echo "<td>" . $row['order_number'] . "</td>";
                        echo "<td>" . $row['item_code'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>" . '<a href="./methods/delOrderDetails.php?id=' . $row['id'] . '" class="">Delete</a>' . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        // close delete success notif
        function closeDelSuccess() {
            let closeButton = document.getElementById('delsuc')

            closeButton .classList.add('dispNone')

        }
    </script>
</body>
</html>