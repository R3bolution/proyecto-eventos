<?php 
include_once '../config/database.php';
include '../config/functions.php';

try {
    $sql = "SELECT * FROM events";
    $resultado = select($conexion,$sql);
    include 'list_event.php';
} catch (Exception $e) {
    echo $e->getMessage();
}