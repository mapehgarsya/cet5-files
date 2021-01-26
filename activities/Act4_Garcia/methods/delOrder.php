<?php
    include "connectDb.php"; 

    $id = $_GET['id']; 
    $del = mysqli_query($connect,"delete from orders where id = '$id'"); 

    if($del) {
        mysqli_close($connect); 
        header("location:../admin.php?delorder=success"); 
        exit;	
    } else {
        echo "Error deleting record"; 
    }

?>