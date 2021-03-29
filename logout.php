<?php

session_start();

/*sve varijable na null*/
$_SESSION = array();

session_destroy();

header("location: login.php");
exit;

?>