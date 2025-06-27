<?php
session_start();
if (isset($_SESSION['discord_id'])) {
    header("Location: main.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login - BalanceZone 💸</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #141e30, #243b55);
      color: white;
      text-align: center;
      padding-top: 100px;
    }
    h1 { font-size: 2rem; }
    a {
      display: inline-block;
      margin-top: 20px;
      background-color: #7289da;
      color: white;
      padding: 12px 24px;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h1>Welcome to BalanceZone 🎰</h1>
  <a href="login.php">🔐 Login with Discord</a>
</body>
</html>
