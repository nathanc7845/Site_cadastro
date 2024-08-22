<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Login</title>
<link rel="stylesheet" href="./css/style2.css">
</head>
<body>

<h1>ESCOLA ESTADUAL PRESIDENTE DUTRA</h1>


<div class="container">
    <form action="" method="POST">
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" required>

        <label for="rg">RG:</label>
        <input type="text" id="rg" name="rg" required>

        <label for="data_expedicao">Data de Expedição:</label>
        <input type="date" id="data_expedicao" name="data_expedicao" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>

        <button type="submit" name="cadastro">Cadastrar</button>
        <button type="submit" name="login">Login</button>
        <button type="remove" name="remover">Remover Dados</button>
    </form>
</div>
<?php
        $servername = "localhost";
        $username = "root";
        $password = ""; 
$dbname = "site_cadastro";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cadastro'])) {
        $nome_completo = $_POST['nome_completo'];
        $rg = $_POST['rg'];
        $data_expedicao = $_POST['data_expedicao'];
        $cpf = $_POST['cpf'];

    
        $sql = "INSERT INTO usuarios (nome_completo, rg, data_expedicao, cpf) VALUES ('$nome_completo', '$rg', '$data_expedicao', '$cpf')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Dados cadastrados com sucesso!</p>";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['login'])) {
        $cpf = $_POST['cpf'];

        
        $sql = "SELECT * FROM usuarios WHERE cpf='$cpf'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<p>Login realizado com sucesso!</p>";
        } else {
            echo "<p>CPF não encontrado!</p>";
        }
    } elseif (isset($_POST['remover'])) {
        $cpf = $_POST['cpf'];

 
        $sql = "DELETE FROM usuarios WHERE cpf='$cpf'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Dados removidos com sucesso!</p>";
        } else {
            echo "Erro ao remover dados: " . $conn->error;
        }
    }
}

$conn->close();
?>
</body>
</html>