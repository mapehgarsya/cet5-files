<?php
include('./methods/connectDb.php');

$qs_item = "SELECT * FROM items;";
$item_result = mysqli_query($connect, $qs_item);
$item_checkResult = mysqli_num_rows($item_result);

$connect2 = new PDO("mysql:host=localhost;dbname=orderform_db", "root", "");
function fill_options($connect)
{
    $output = '';
    $query = "SELECT * FROM items";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output .= '<option value="' . $row["item_name"] . '">' . $row["item_name"] . '</option>';
    }
    return $output;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CET5: Activity 4</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./main.css">
</head>

<body>
    <div class="maindiv">
        <p class="maintitle">ORDER FORM</p>
        <form action="./methods/getOrder.php" method="POST">
            <div class="cstform">
                <p class="divtitle">Customer</p>
                <p align="right">
                    <label for="">Order Date:</label>
                    <input type="date" class="inputstyle1" value=<?php echo date('Y-m-d'); ?> disabled>
                </p>
                <p align="right">
                    <label for=""> Order Number:</label>
                    <input type="value" class="inputstyle1" name="order_num" value="<?php echo 'MRKN' . '-' . 02 . '-' . date('ymd') . '-' . rand(0001, 9999); ?>">
                </p>

                <div>
                    <div class="inputset">
                        <label for="" class="labelstyle1">Customer Name:</label>
                        <input type="text" class="inputstyle1 inputlength1" name="customer_name" placeholder="Surname, First Name, MI" required>
                    </div>
                    <div class="inputset">
                        <label for="" class="labelstyle1">Address:</label>
                        <input type="text" class="inputstyle1 inputlength2" name="address" placeholder="Street, Barangay, City/Province" required>
                    </div>
                    <div class="inputset">
                        <label for="" class="labelstyle1">Mobile:</label>
                        <input type="number" class="inputstyle1 inputlength1" name="mobile_num" placeholder="09XXXXXXXXX" required>
                    </div>
                    <div class="inputset">
                        <label for="" class="labelstyle1">E-mail:</label>
                        <input type="text" class="inputstyle1 inputlength1" name="email_address" placeholder="emailsample@yahoo.com" required>
                    </div>
                </div>
            </div>

            <div class="orderform">
                <p class="divtitle">Products to Order</p> <br>
                <div class="tablediv">
                    <table class="tablestyle">
                        <thead>
                            <tr>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Description</th>
                                <th>Unit Price</th>
                                <th>Method</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td id="unit">Unit Sample</td>
                                <td><input type="number" name="quantity[]" id="quantity" class="inputstyle1 inputlength4" min="0" value="0"></td>
                                <td>
                                    <select name="productName[]" id="select-event" class="dropdownstyle">
                                        <option value="def">None</option>
                                        <?php
                                        if ($item_checkResult > 0) {
                                            while ($row = mysqli_fetch_assoc($item_result)) {
                                                echo '<option value="' . $row['item_name'] . '">' . $row['item_name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td id="prodCode">
                                    <p>-</p>
                                </td>
                                <td id="desc">
                                    <p>-</p>
                                </td>
                                <td id="price">
                                    <p>Php -</p>
                                </td>
                                <td><button class="add btnstyle1 btncolor1" type="button">Add Item</button></td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                <p align="right" class="total">
                    <label for="">Total:</label>
                    <input type="value" class="inputstyle1" placeholder="0.00 Php" disabled>
                </p>
            </div>

            <div class="btndiv">
                <button type="submit" name="submit" class="btnstyle1 btncolor1">
                    <p>Submit</p>
                </button>
            </div>

        </form>
    </div>
    <a href="./admin.php" class="btnstyle1 btnstyle2">Go To Admin Page</a>
    <script>
        $(document).ready(function() {

            // add item func
            $(document).on('click', '.add', function() {
                var html = '';
                html += '<tr>';
                html += '<td id="unit">-</td>';
                html += '<td><input type="text" name="quantity[]" class="table-input" placeholder="Number of items" /></td>';
                html += '<td><select id="select-event" class="table-select" name="productName[]"><option value="">Select an item</option><?php echo fill_options($connect2); ?></select></td>';
                html += '<td id="prodCode">-</td>';
                html += '<td id="desc">-</td>';
                html += '<td id="price" class="r-align">Php -</td>';
                html += '<td><button type="button" name="remove" class="btnstyle1 btncolor2 remove">Remove</button></td></tr>';
                $('#tbody').append(html);
            });

            // remove item func
            $(document).on('click', '.remove', function() {
                $(this).closest('tr').remove();
            });

            //shows data from table
            $(document).on('click', '#select-event', function() {
                let var1 = {};
                var1.data = document.getElementById('select-event').value;
                if (var1.data === '') return false;
                console.log(var1)
                $.ajax({
                    url: "./methods/getSelected.php",
                    method: "post",
                    data: var1,
                    success: function(response) {
                        let stringLayer = JSON.parse(JSON.stringify(response));
                        let objectLayer = JSON.parse(stringLayer);
                        $('#unit').html(objectLayer[0].unit).removeAttr("id");
                        $('#prodCode').html(objectLayer[0].item_code).removeAttr("id");
                        $('#desc').html(objectLayer[0].item_description).removeAttr("id");
                        $('#price').html("Php " + objectLayer[0].price).removeAttr("id");
                        $('#select-event').removeAttr('id');
                    }
                });
            });
        });
    </script>
</body>

</html>