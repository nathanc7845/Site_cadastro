<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./css/style2.css">
    <script>
        function confirmarLimpeza(event) {
            if (!confirm("Você deseja mesmo limpar essas informações?")) {
                event.preventDefault(); 
                document.getElementById('formCadastro').reset(); 
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Formulário de Cadastro</h2>
        </div>
        <form id="formCadastro" action="processa_cadastro.php" method="POST">
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" id="nome_completo" name="nome_completo" required>

            <label for="rg">RG:</label>
            <input type="text" id="rg" name="rg" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>

            <label for="data_expedicao">Data de Expedição:</label>
            <input type="date" id="data_expedicao" name="data_expedicao" required>

            <div class="button-group">
                <input type="submit" value="Cadastrar" class="btn cadastrar">
                <button type="submit" formaction="login.php" class="btn login">Login</button>
                <br><br>
                <a href="#" onclick="confirmarLimpeza(event);" class="btn limpar">Limpar</a>
            </div>
        </form>
    </div>
</body>
</html>
