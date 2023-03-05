<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_REQUEST['name'];
$email_id = $_REQUEST['email_id'];
$mno = $_REQUEST['mno'];
$password = $_REQUEST['password'];

$sql = "INSERT INTO users  VALUES(NULL,'$name','$password','$email_id','$mno')";

if (mysqli_query($conn, $sql)) {
    
    header('location:start.html');
    
} else {
    echo "ERROR: Hush! Sorry $sql. "
    . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>