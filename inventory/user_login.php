
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    $name = stripcslashes($name);
    $pwd = stripcslashes($pwd);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE name='$name' AND password='$pwd' ")
    or die("Database failed to connect" );
    $row = mysqli_fetch_array($result);
    if ($row['name'] == $name && $row['password'] == $pwd) {
        $_SESSION['uname'] = $_POST['name'];
        echo "<link rel='stylesheet' href='http://localhost/inventory/user_login.css'>";
        echo " <style>";
        echo "  .banner";
        echo "{";
        echo "width: 100%;";
        echo "height: 100vh;";
        echo "background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(./img/1.jpg);";
        echo "background-size: cover;";
        echo "background-position: center;";
        echo "}";
        echo ".content a";
        echo "{";
        echo "font-size: 17px";
        echo "}";
        echo ".footer";
        echo " {";
        echo   "    width: 100%;";
        echo   "    position: absolute;";
        echo   "    bottom: 5%;";
        echo   "    transform: translateY(-90%);";
        echo   "    text-align: center;";
        echo   "    color: white;";
        echo   "    font-family: sans-serif;";
        echo   "  }";
        echo "</style>";
        echo "<div class='banner'>";
        echo "<div class='content'>";?>

    <h1>Welcome <?php echo $_SESSION['uname']; ?></h1>
    <?php
echo "<h1>INVENTORY MANAGEMENT</h1>";
        echo "<p><h2>Track your Products and Orders</h2></p>";
        echo "<div>";
        echo "<button type='button'><span></span><a href='http://localhost/inventory/start.html'>LOGOUT</a></button>";
        echo "<button type='button'><span></span><a href='http://localhost/inventory/homepage.html'>HOME PAGE</a></button>";
        echo "</div>";
        echo "</div>";

        echo "<div class='footer'>© 2022 MVJCE Designed by Sweta Suman Giri</div>";
        echo "</div>";
    } else {
        echo " <script>alert('Oops!! failed to login!!Username or password incorrect') ;</script>";
        echo "<script>location.href='http://localhost/inventory/user_login.html'</script>";
    }
}
mysqli_close($conn);

?>
<title>Welcome</title>