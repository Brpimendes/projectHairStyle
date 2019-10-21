<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">    
    <title>Hair Style - Sua beleza no lugar certo</title>
</head>
<body>
    <h1>Sejam bem-vindos ao Hair Style</h1>

    <?php
        if(isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['funcao'])){
            require_once('Controller/controllerFuncionario.php');
        }
    ?>

    <form method="post">
        <label for="id">ID:</label> <br>
        <input type="text" name="id" id="id" readonly="readonly" value="<?php echo $func->id ?>" />
        <br>

        <label for="nome">Nome:</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex: Fulano da Silva" />
        <br>

        <label for="telefone">Telefone:</label> <br>
        <input type="text" name="telefone" id="telefone" placeholder="(xx) xxxxx-xxxx" />
        <br>

        <label for="email">Email:</label> <br>
        <input type="text" name="email" id="email" placeholder="mail@mail.com" />
        <br>

        <label for="senha">Senha: </label> <br>
        <input type="password" name="senha" id="senha" />
        <br>

        <label for="funcao">Função:</label> <br>
        <input type="text" name="funcao" id="funcao" placeholder="Ex: cabeleireiro" />
        <br> <br>

        <button name="acao" value="cadastrar">cadastrar</button>
        <button name="acao" value="alterar">Alterar</button>
        <button name="acao" value="excluir">Excluir</button>
        <button name="acao" value="listar">Listar</button>
    </form>
</body>
</html>