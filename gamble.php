<?php
include("db.php");
session_start();
$userId = $_SESSION["discord_id"] ?? "testuser";
$bet = intval($_POST["bet"]);
$type = $_POST["mode"];

if ($bet <= 0) die(json_encode(["result" => "Invalid bet."]));

$win = rand(0, 1) ? "win" : "lose";
$change = $win === "win" ? $bet : -$bet;

$conn->query("UPDATE Users SET balance = balance + $change WHERE userID = '$userId'");
$conn->query("INSERT INTO History (userID, game, result, timestamp) VALUES ('$userId', '$type', '$win', UNIX_TIMESTAMP())");

echo json_encode(["result" => $win]);
?>
