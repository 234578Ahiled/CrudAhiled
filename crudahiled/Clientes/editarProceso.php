<?php
    print_r($_POST);
    if(!isset($_POST['id_cliente'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST["txtNombre"];
    $tel = $_POST["txtTel"];
    $email = $_POST["txtEmail"];

    $sentencia = $bd->prepare("UPDATE clientes SET nombre_cliente = ?, tel_cliente = ?, email_cliente = ? where id_cliente = ?;");
    $resultado = $sentencia->execute([$nombre, $tel, $email, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>