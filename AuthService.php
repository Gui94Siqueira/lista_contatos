<?php
session_start();
require_once 'Usuario.php';
require_once 'UsuarioDAO.php';

$type = filter_input(INPUT_POST, "type");

if ($type === "register") {

    $new_nome = filter_input(INPUT_POST, "new_nome");
    $new_email = filter_input(INPUT_POST, "new_email", FILTER_SANITIZE_EMAIL);
    $new_password = filter_input(INPUT_POST, "new_password");
    $confirm_password = filter_input(INPUT_POST, "confirm_password");

    if ($new_email && $new_nome && $new_password) {
        if ($new_password === $confirm_password) {
            // Etapa de segurança: criação de senha segura e geração de token
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(25));

            // Criação do usuário de dados por uso do UsuarioDAO
            $usuario = new Usuario(null, $new_nome, $hashed_password, $new_email, $token);
            $usuarioDAO = new UsuarioDAO();
            $success = $usuarioDAO->create($usuario);

            if($success) {
                $_SESSION['token'] = $token;
                header('Location: index.php');
                exit();
            } else {
                echo "Erro ao registrar no banco de dados";
                exit();
            }
            
        } else {
            echo "Senhas incompativeis!";
        }
    } else {
        echo "Dados de input inválidos!";
    }
} elseif ($type === "login") {
}
