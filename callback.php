<?php
session_start();
$client_id = "YOUR_DISCORD_CLIENT_ID";
$client_secret = "YOUR_DISCORD_CLIENT_SECRET";
$redirect_uri = "https://your-vercel-project.vercel.app/callback.php";

$code = $_GET['code'];

$data = array(
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'code' => $code,
    'redirect_uri' => $redirect_uri,
    'scope' => 'identify'
);

$ch = curl_init('https://discord.com/api/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
curl_close($ch);
$token = json_decode($response)->access_token;

$ch = curl_init('https://discord.com/api/users/@me');
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer $token"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$user = json_decode(curl_exec($ch));
curl_close($ch);

$_SESSION['discord_id'] = $user->id;
$_SESSION['username'] = $user->username;
header("Location: index.html");
exit;
?>
