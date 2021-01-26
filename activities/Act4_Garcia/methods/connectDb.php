<?php
    $connect = new mysqli('localhost', 'root', '', 'orderform_db');

    if ($connect -> connect_errno) {
        die('Could not connect:');
        exit();
    }
?>