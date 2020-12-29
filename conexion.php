<?php
$connection = mysqli_connect('192.168.25.190', 'root', 'monty1945motita');
if (!$connection) {
    die("No Se Ha Podido Conectar Con El Servidor" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'hot');
if (!$select_db) {
    die("No Se Ha Podido Seleccionar La Base De Datos" . mysqli_error($connection));
}
