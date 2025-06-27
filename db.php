<?php
$host = "mysql.db.bot-hosting.net";
$user = "u430173_PdX4WiPhIs";
$pass = "yfQY!0c+y0qv^edr=2h0Alx@";
$db = "s430173_balance";

$conn = new mysqli($host, $user, $pass, $db, 3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
