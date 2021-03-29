<?php

/*vrijednosti za spajanje na bazu*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'casino');

/*spajanje na bazu*/
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

/*provjera veze*/
if (!$link) {
    die("ERROR: Could not connect.". mysqli_connect_error());
}
?>