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

    // Comprobar que quedan entradas para vender
    $sql_entrada="SELECT total_tickets,tickets_sold FROM events WHERE id = ".$_GET['evento'];
    $datos_entrada = select($conexion,$sql_entrada);
    $total_entradas = $datos_entrada[0]['total_tickets'];
    $entradas_vendidas = $datos_entrada[0]['tickets_sold']+ $tickets;
    if ($entradas_vendidas > $total_entradas) {
        $errores['tickets'] = 'No hay suficientes entradas. Se han vendido todos';
    }

    if (empty($errores['name']) && empty($errores['email']) && empty($errores['tickets'])) {
        $sql = "INSERT INTO reservations (event_id,email,buyer_name,quantity) VALUES (".$_GET['evento'].",'".$email."','".$name."',".$tickets.")";
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