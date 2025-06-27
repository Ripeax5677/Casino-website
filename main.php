<?php
session_start();
if (!isset($_SESSION["discord_id"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BalanceZone 💸</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #141e30, #243b55);
      color: white;
      margin: 0;
      padding: 0;
      text-align: center;
    }
    header {
      background-color: rgba(0,0,0,0.5);
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    #logo {
      height: 50px;
    }
    #userinfo {
      font-size: 1rem;
    }
    main {
      padding: 40px;
    }
    .game {
      background: rgba(255,255,255,0.1);
      padding: 20px;
      border-radius: 10px;
      margin: 20px auto;
      width: 300px;
    }
    button {
      background: #00cec9;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
    }
    input {
      padding: 8px;
      border: none;
      border-radius: 5px;
      width: 80px;
      text-align: center;
    }
  </style>
</head>
<body>
  <header>
    <img id="logo" src="logo.png" alt="Logo">
    <div id="userinfo">👤 Loading...</div>
  </header>
  <main>
    <h1>BalanceZone 🎰</h1>
    <div class="game">
      <h2>🪙 Coinflip</h2>
      <input type="number" id="bet" placeholder="Bet 💰" min="1" />
      <button onclick="gamble('coinflip')">Flip!</button>
    </div>
    <div class="game">
      <h2>🃏 Blackjack</h2>
      <input type="number" id="bet2" placeholder="Bet 💰" min="1" />
      <button onclick="gamble('blackjack')">Play!</button>
    </div>
    <div class="game">
      <h2>🎰 Slots</h2>
      <input type="number" id="bet3" placeholder="Bet 💰" min="1" />
      <button onclick="gamble('slots')">Spin!</button>
    </div>
  </main>

  <script>
    async function loadUser() {
      const res = await fetch("get_user.php");
      const data = await res.json();
      document.getElementById("userinfo").textContent = `👤 ${data.username} | 💰 ${data.balance}`;
    }

    async function gamble(mode) {
      const bet = document.getElementById("bet" + (mode === 'coinflip' ? '' : mode === 'blackjack' ? '2' : '3')).value;
      const res = await fetch("gamble.php", {
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `bet=${bet}&mode=${mode}`
      });
      const data = await res.json();
      alert(`Result: ${data.result}`);
      loadUser();
    }

    loadUser();
  </script>
</body>
</html>
