<?php

require "config.php";

$sql = mysqli_query($link, "UPDATE akreditacije SET balance, balance + 50 WHERE username = '".$_SESSION['username']."'");
$result = mysqli_fetch_array($sql);
?>