<?php
include 'db.php';
if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $sql = "delete from orders where o_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:orders.php');
    } else {
        die(mysqli_error($conn));
    }
}
