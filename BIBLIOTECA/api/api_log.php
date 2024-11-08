<?php
include_once('../php/conexao.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $email = $conn->real_escape_string($email);
    $senha = $conn->real_escape_string($senha);

    $query = "SELECT * FROM usuario WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        
        if (password_verify($senha, $usuario['senha'])) {
            if ($usuario['tipo_usuario'] == 'admin') {
                header('Location: indm.php');
                exit();
            } else {
                header('Location: index.php');
                exit();
            }
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
}
?>
