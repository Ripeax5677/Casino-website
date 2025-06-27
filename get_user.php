<?php
include("db.php");
session_start();
$userId = $_SESSION["discord_id"] ?? "testuser";
$username = $_SESSION["username"] ?? "Guest";

$res = $conn->query("SELECT balance FROM Users WHERE userID = '$userId'");
$row = $res->fetch_assoc();
echo json_encode([
  "username" => $username,
  "balance" => $row["balance"] ?? 0
]);
?>
