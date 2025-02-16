<?php

function select($conexion, $sql){
    $resultado = mysqli_query($conexion, $sql);
    $filas = [];
    while($fila = mysqli_fetch_assoc($resultado)){
        $filas[] = $fila;
    }
    return $filas;
}

function query($conexion, $sql){
    return mysqli_query($conexion, $sql);
}

function sanearDatos($value) {
    return htmlspecialchars(trim($value));
}

function validar($value,$type) {
    if (empty($value)) {
        return 'Campo requerido';
    } else {
        switch ($type) {
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return 'Email no válido';
                }
                break;
            case 'number':
                if (!is_numeric($value)) {
                    return 'Debe ser un número';
                }
                break;
        }
    }
}