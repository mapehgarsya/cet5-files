<?php
    include "connectDb.php"; 

    $id = $_GET['id']; 
    $del = mysqli_query($connect,"delete from customer where id = '$id'"); 

    if($del) {
        mysqli_close($connect); 
        header("location:../admin.php?delcustomer=success"); 
        exit;	
    } else {
        echo "Error deleting record"; 
    }

?>