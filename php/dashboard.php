<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Bem-vindo! <?=$_SESSION['username']?>!</h2>
        <div class=header-dashboard>
            <button id="openModalBtn">Incluir</button>
            <form action="" method="GET">
                <label for="filtroNome">Filtrar Nome:</label>
                <input type="text" id="filtroNome" name="filtroNome">
                <input type="submit" value="Filtrar">
            </form>
        </div>
        <h3>Clientes Cadastrados:</h3>

        <table id="clientesTable">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Data de Nascimento</th>
                    <th>Endereço de e-mail</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $clientes = include('list_clients.php');
                foreach ($clientes as $cliente) {
                    echo "<tr>";
                    echo "<td>{$cliente->getCodigo()}</td>";
                    echo "<td>{$cliente->getNome()}</td>";
                    echo "<td>{$cliente->getSobrenome()}</td>";
                    echo "<td>{$cliente->getDataNascimento()}</td>";
                    echo "<td>{$cliente->getContato()->getEmail()}</td>";
                    echo "<td>{$cliente->getContato()->getTelefone()}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Cadastrar Cliente:</h3>
                <form action="register_client.php" method="POST">
                    <label for="codigo">Código:</label>
                    <input type="text" id="codigo" name="codigo" required><br><br>
                    
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required><br><br>
                    
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" id="sobrenome" name="sobrenome" required><br><br>
                    
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>
                    
                    <label for="email">Endereço de e-mail:</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" required><br><br>
                    
                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </div>
    </div>

    <script>
    const modal = document.getElementById("myModal");
    const btn = document.getElementById("openModalBtn");
    const span = document.getElementsByClassName("close")[0];

    // Quando o usuário clicar no botão, abre o modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Quando o usuário clicar no elemento de fechar, fecha o modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>
</html>
