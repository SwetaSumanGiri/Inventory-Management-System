<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}?>
<html>

<head>
    <title>Orders</title>
    <link rel="stylesheet" href="viewing.css">
    <style>
    body { 
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(./img/start.jpg);
        background-size: cover;
        background-position: center;
    }
    button {
    width: 100px;
    padding: 10px 0;
    text-align: center;
    /* margin: 0px 0px; */
    border-radius: 20px;
    font-weight: bold;
    border: 2px solid #ffc400;
    background: transparent;
    color: white;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
    .back {
        position: relative;
        margin-left:42%;
        /* margin: 10px 730px; */
    }
    .hi {
        margin-top: 30px;
        text-align: center;
        font-family: sans-serif;
        width: 100%;
        font-weight: bold;
        font-size: 50px;
        color: white;
    }
    .footer {
    width: 100%;
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
    <div class="hi">ORDERS</div>
    <?php
$sql = "SELECT * from orders ";
$result = mysqli_query($conn, $sql);
echo "<table><thead><tr><th>User</th><th>Date</th><th>Name</th><th>Qty</th><th>Price</th><th>Amount</th><th>Edit</th><th>Delete</th></tr></thead>";
while ($row = mysqli_fetch_array($result)) {
    echo "
    <td>" . $row['u_id'] . "</td>
    <td>" . $row['o_date'] . "</td>
    <td>" . $row['name'] . "</td>
    <td>" . $row['qty'] . "</td>
    <td>" . $row['price'] . "</td>
    <td>" . $row['amount'] . "</td>
    
    <td><button type='button'><span></span><a href=\"http://localhost/inventory/edit.php?editid=" . $row['o_id'] . "\">Edit</a></button></td>
    <td><button type='button'><span></span><a href=\"http://localhost/inventory/delete.php?did=" . $row['o_id'] . "\">Delete</a></button></td>
    </tr>
";
}

?>
<br>
    <div class="back">
        <button type="button"><span></span><a href="insert_orders.html">ADD</a></button>
        <button type="button"><span></span><a href="homepage.html">BACK</a></button>
    </div>
<br>
    <div class="footer">© 2022 MVJCE Designed by Sweta Suman Giri</div>
</body>

</html>