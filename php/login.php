<?php
session_start();

// Verificar se os campos de login foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar as credenciais (isso é um exemplo, substitua por sua lógica de autenticação)
    $username = "usuario"; // Substitua pelo seu nome de usuário
    $password = "senha"; // Substitua pela sua senha

    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        // Iniciar a sessão
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        // Redirecionar para o dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Se as credenciais estiverem incorretas, redirecione de volta para a página de login
        header("Location: index.php");
        exit();
    }
} else {
    // Se não veio por POST, redirecione para o index
    header("Location: index.php");
    exit();
}
?>
