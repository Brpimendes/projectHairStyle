<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">    
    <title>Hair Style - Sua beleza no lugar certo</title>
</head>
<body>
    <h1 align="center">Sejam bem-vindos ao Hair Style</h1>
    <hr>

    <?php
        #ini_set('display_errors', false);

        if( isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['acao']) || isset($_POST['id']) && isset($_POST['acao']) ){
            require_once('Controller/controllerCliente.php');
        }
    ?>

    <form method="post" align="center">
        <label for="id">ID</label> <br>
        <input type="text" name="id" id="id" readonly="readonly" value="<?php echo $cliente->id ?>"/>
        <br>
        
        <label for="nome">Nome:</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex: Fulano da Silva" value="<?php echo $cliente->nome ?>" />
        <br>

        <label for="telefone">Telefone: </label> <br>
        <input type="text" name="telefone" id="telefone" placeholder="(xx) xxxxx-xxxx" value="<?php echo $cliente->telefone ?>" />
        <br>

        <label for="email">Email:</label> <br>
        <input type="text" name="email" id="email" placeholder="mail@mail.com" value="<?php echo $cliente->email ?>" />
        <br> <br>

        <button name="acao" value="cadastrar">cadastrar</button>
        <button name="acao" value="alterar">Alterar</button>
        <button name="acao" value="excluir">Excluir</button>
        <button name="acao" value="listar">Listar</button>
    </form>
</body>
</html>