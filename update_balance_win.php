<?php

require_once "config.php";
session_start();

/*echo htmlspecialchars($_SESSION["username"]);*/
$sql = "UPDATE akreditacije SET balance = balance+'1000' WHERE username = '".$_SESSION['username']."'";

if (mysqli_query($link, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($link);
  }

  mysqli_close($link);
  ?>