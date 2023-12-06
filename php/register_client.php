<?php
$host = 'localhost';
$dbname = 'postgres';
$user = 'postgres';
$password = '123';

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Erro ao conectar ao banco de dados.";
} else {
    try {
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $dataNascimento = $_POST['data_nascimento'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $sql = "INSERT INTO tbcliente (clicodigo, nome, sobrenome, data_nascimento) VALUES ($codigo, '$nome', '$sobrenome', '$dataNascimento');
                INSERT INTO tbcontato (email, telefone, clicodigo) VALUES ('$email', '$telefone', $codigo)";

        // Executa a query
        $result = pg_query($conn, $sql);

        if ($result) {
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Erro ao cadastrar cliente: " . pg_last_error($conn);
        }
    } catch (Exception $e) {
        echo "Erro ao cadastrar cliente: " . $e->getMessage();
    }
}
?>
