<?php
include_once '../config/database.php';
include '../config/functions.php';

$sql = "SELECT * FROM events WHERE id = ".$_GET['evento'];
$datos = select($conexion,$sql);
$resultado = $datos[0];

if (isset($_POST['reservar'])) {
    $name=sanearDatos($_POST['name']);
    $email=sanearDatos($_POST['email']);
    $tickets=sanearDatos($_POST['tickets']);

    $errores = [];
    $errores['name'] = validar($name,'text');
    $errores['email'] = validar($email,'email');
    $errores['tickets'] = validar($tickets,'number');

    if (empty($errores['name']) && empty($errores['email']) && empty($errores['tickets'])) {
        $sql = "INSERT INTO reservations (event_id,email,buyer_name) VALUES (".$_GET['evento'].",'".$email."','".$name."')";
        $sql2 = "UPDATE events SET tickets_sold = tickets_sold + ".$tickets." WHERE id = ".$_GET['evento'];
        query($conexion,$sql);
        query($conexion,$sql2);
        header('Location: index.php');
    } else {
        include 'view_event.php';
        exit();
    }
}


include 'view_event.php';