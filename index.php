<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Hair Style - Sua beleza no lugar certo</title>
</head>
<body>
    <h1 align="center">Sejam bem-vindos ao Hair Style</h1>
    <hr>

    <form method="post" align="center">
        <label for="id">ID:</label> <br>
        <input type="text" name="id" id="id" readonly="readonly" value="$_GET['id']" />
        <br>
        <label for="matricula">Matrícula:</label> <br>
        <input type="text" name="matricula" id="matricula" />
        <br>
        <label for="name">Nome:</label> <br>
        <input type="text" name="name" id="name" value="Informe seu nome completo" />
        <br>
        <label for="senha">Senha: </label> <br>
        <input type="password" name="senha" id="senha" />
        <br>
        <label for="remuneracaoHora">Remuneração Hora:</label> <br>
        <input type="text" step="0.01" name="remuneracaohora" id="remuneracaoHora" />
        <br> <br>
        <button type="submit">Enviar Dados</button> <button type="reset">Limpar Dados</button>
    </form>
    <hr>
    
    <?php
        require_once('Controller/cadastrarFuncionario.php');
    ?>

    <a href="View/listaFuncionario.php">Funcionários cadastrados</a>
</body>
</html>