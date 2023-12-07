<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtTel"]) || empty($_POST["txtEmail"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $tel = $_POST["txtTel"];
    $emai = $_POST["txtEmail"];
    
    $sentencia = $bd->prepare("INSERT INTO clientes (nombre_cliente, tel_cliente, email_cliente) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$tel,$emai]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>