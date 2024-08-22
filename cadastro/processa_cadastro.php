<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = $_POST['nome_completo'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $data_expedicao = $_POST['data_expedicao'];

    try {
        $stmt = $conn->prepare("INSERT INTO site (nome_completo, rg, cpf, data_expedicao) VALUES (:nome_completo, :rg, :cpf, :data_expedicao)");
        $stmt->bindParam(':nome_completo', $nome_completo);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_expedicao', $data_expedicao);
        
        $stmt->execute();

        echo "Cadastro realizado com sucesso!";
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    $conn = null;
}
?>
