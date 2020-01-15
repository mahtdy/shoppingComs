<?php $host="localhost";
$user="root";
$password="";
$dbname="mosavi";
$log_host="localhost";
$log_user="root";
$log_password="";
$log_dbname="new_log";
$conn = new mysqli($log_host, $log_user, $log_password, $log_dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$coms_conect = new mysqli($host, $user, $password, $dbname);
mysqli_set_charset($coms_conect,"utf8");
@session_start();
$_SESSION["coms_conect"]=$coms_conect;
?>
