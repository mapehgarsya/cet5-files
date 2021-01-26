<?php
    include "connectDb.php"; 

    $id = $_GET['id']; 
    $del = mysqli_query($connect,"delete from items where id = '$id'"); 

    if($del) {
        mysqli_close($connect); 
        header("location:../admin.php?delitem=success"); 
        exit;	
    } else {
        echo "Error deleting record"; 
    }

?>