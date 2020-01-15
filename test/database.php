<? session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>