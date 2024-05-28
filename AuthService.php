<?php
require_once 'Usuario.php';
require_once 'UsuarioDAO.php';

$type = filter_input(INPUT_POST, "type");

if($type === "register"){

    $new_nome = filter_input(INPUT_POST, "new_nome");
    $new_email = filter_input(INPUT_POST, "new_email", FILTER_SANITIZE_EMAIL);
    $new_password = filter_input(INPUT_POST, "new_password");
    $confirm_password = filter_input(INPUT_POST, "confirm_password");

    $usuario = new Usuario(null, $new_nome, $new_password, $new_email, null);
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->create($usuario);
    header('Location: index.php');
} elseif($type ==="login") {

}



?>
