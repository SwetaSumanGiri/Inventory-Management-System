<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";
 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$u_id = $_REQUEST['u_id'];
$o_date = $_REQUEST['o_date'];
$name = $_REQUEST['name'];
$qty = $_REQUEST['qty'];
$price = $_REQUEST['price'];
$amount = $_REQUEST['amount'];

$sql = "INSERT INTO orders  VALUES(NULL, '$u_id','$o_date','$name','$qty','$price','$amount')";

if (mysqli_query($conn, $sql)) {
    
    header('location:orders.php');
     
} else {
    echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>