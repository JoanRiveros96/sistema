<?php
$mysqli = new mysqli("coldivinoamor.com.co", "coldivin", "7)p-z6J4V6hGeG", "coldivin_sistema");
// mysqli_query("SET NAMES 'utf8");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//echo $mysqli->host_info . "\n";

// $mysqli = new mysqli("localhost", "root", "", "sistema", 3306);
// if ($mysqli->connect_errno) {
//     echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }

// echo $mysqli->host_info . "\n";
?>