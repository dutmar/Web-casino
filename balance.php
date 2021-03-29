<?php

require_once "config.php";

session_start();

$sql = mysqli_query($link, "SELECT balance FROM akreditacije WHERE username = '".$_SESSION['username']."'");
$result = mysqli_fetch_array($sql);

echo "Balance: ".$result['balance'];

?>