<?php
$username = "root";
$password = "";
$host = "localhost";
$database = "comentarios_api";
$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error){
  echo "Error al conectar a la base de datos " . mysqli_connect_error();
  die();
}
?>
