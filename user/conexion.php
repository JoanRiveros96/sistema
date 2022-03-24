<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "sistema");
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