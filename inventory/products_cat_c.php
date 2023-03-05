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
    <title>Data Storage</title>
    <link rel="stylesheet" href="products.css">
    <style>
    body {
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(./img/1.jpg);
        background-size: cover;
        background-position: center;
    }

    .back {
        position: relative;
        margin-left:48%;
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
    <div class="hi">DATA STORAGE</div>
    <?php
$sql = "SELECT * from products where category='Data Storage' ";
$result = mysqli_query($conn, $sql);
echo "<table><thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Description</th></tr></thead>";
while ($row = mysqli_fetch_array($result)) {
    echo "
    <td>" . $row['p_id'] . "</td>
    <td>" . $row['name'] . "</td>
    <td>" . $row['price'] . "</td>
    <td>" . $row['description'] . "</td>
    </tr>
";
}

?>
<br>
    <div class="back">
        <button type="button"><span></span><a href="products.html">BACK</a></button>
    </div>
<br>

<div class="footer">© 2022 MVJCE Designed by Sweta Suman Giri</div>
</body>

</html>