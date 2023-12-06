<?php
$host = 'localhost';
$dbname = 'postgres';
$user = 'postgres';
$password = '123';

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$conn) {
    echo "Erro ao conectar ao banco de dados.";
    exit();
}

$condicao = '';
if (isset($_GET['filtroNome'])) {
    $filtro = $_GET['filtroNome'];
    $condicao .= " WHERE nome LIKE '%$filtro%'";
}
$query = "SELECT tbcliente.clicodigo as codigo,
                 nome,
                 sobrenome,
                 data_nascimento,
                 email,
                 telefone 
           FROM tbcliente 
      LEFT JOIN tbcontato 
            ON tbcliente.clicodigo = tbcontato.clicodigo
            $condicao
      ORDER BY tbcliente.clicodigo";

$result = pg_query($conn, $query);

if (!$result) {
    echo "Erro ao consultar clientes.";
    exit();
}

$clientes = array();
while ($data = pg_fetch_object($result)) {
    require_once('model/cliente.php');
    $cliente = new \Model\Cliente();
    $cliente->setCodigo($data->codigo);
    $cliente->setNome($data->nome);
    $cliente->setSobrenome($data->sobrenome);
    $cliente->setDataNascimento($data->data_nascimento);
    $cliente->getContato()->setEmail($data->email);
    $cliente->getContato()->setTelefone($data->telefone);
    $clientes[] = $cliente;
    
}

return $clientes;
?>