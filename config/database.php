<?php

try {
    $host='localhost';
    $user='root';
    $password='';
    $dbname='festival';
    $conexion=mysqli_connect($host,$user,$password,$dbname);
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}