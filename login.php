<?php
$client_id = "1388220410696306749";
$redirect_uri = urlencode("https://your-vercel-project.vercel.app/callback.php");
header("Location: https://discord.com/api/oauth2/authorize?client_id=$client_id&redirect_uri=$redirect_uri&response_type=code&scope=identify");
exit;
?>
