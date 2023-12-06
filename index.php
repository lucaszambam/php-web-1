<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="login-container">
        <h2>Bem vindo!</h2>
        <form action="php/login.php" method="POST">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>