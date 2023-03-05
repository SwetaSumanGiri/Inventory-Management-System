<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['editid'];
$sql = "SELECT * from `orders`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$date = $row['o_date'];
$name = $row['name'];
$qty = $row['qty'];
$price = $row['price'];
$amount = $row['amount'];
?>
<html>
    <head>
        <title>Edit Orders</title>
        <link rel="stylesheet" href="new_user_form.css">
        <style>
            body
{
    margin: 80;
    padding: 0;
    font-family: sans-serif;
    /* background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url("./img/start.jpg"); */
    background-position: center;
    background-size: cover;
}
.footer {
    width: 88%;
    position: absolute;
    bottom: 5%;
    transform: translateY(-90%);
    text-align: center;
    color: white;
    font-family: sans-serif;
  }
        </style>
    </head>
    <body> 
        <form class="box" action="#"  method="post" >
            <h1 class="dem">EDIT ORDERS</h1>
            <input type="text" name="o_date" placeholder="DATE: <?php echo $date; ?>" required>
            <input type="text" name="name" placeholder="NAME: <?php echo $name; ?>" required>
            <input type="text" name="qty" placeholder="QUANTITY: <?php echo $qty; ?>" required>
            <input type="text" name="price" placeholder="PRICE: <?php echo $price; ?>" required pattern="[0-9]{1,7}" title="Digits ONLY">
            <input type="text" name="amount" placeholder="AMOUNT: <?php echo $amount; ?>" required pattern="[0-9]{1,7}" title="Digits ONLY">
            <input type="submit" name="submit" value="SAVE">
            </a>
        </form>
    <div class="footer">© 2022 MVJCE Designed by Sweta Suman Giri</div>
    </body>
</html>
<?php

if (isset($_POST['submit'])) {
    $date = mysqli_real_escape_string($conn, $_POST['o_date']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);

    $date = stripcslashes($date);
    $qty = stripcslashes($qty);
    $qty = stripcslashes($qty);
    $price = stripcslashes($price);
    $amount = stripcslashes($amount);

    $query = "UPDATE `orders` SET `name` = '$name', `o_date` = '$date', `qty` = '$qty', `price` = '$price', `amount` = '$amount' where o_id='$id'";
    if (mysqli_query($conn, $query)) {
        header('location:orders.php');
    } else {
        echo " $query. "
        . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>