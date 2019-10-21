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

        if( isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['valor']) && isset($_POST['acao']) || isset($_POST['id']) && isset($_POST['acao']) ){
            require_once('Controller/controllerServico.php');
        }
    ?>

    <form method="post" align="center">
        <label for="id">ID</label> <br>
        <input type="text" name="id" id="id" readonly="readonly" value="<?php echo $servico->id ?>"/>
        <br>
        
        <label for="nome">Nome:</label> <br>
        <input type="text" name="nome" id="nome" placeholder="Ex: Manicure" value="<?php echo $servico->nome ?>" />
        <br>

        <label for="descricao">Descrição do Serviço: </label> <br>
        <textarea type="text" name="descricao" id="descricao" placeholder="Cuidar das mãos da cliente, realizando..." width="150px" value="<?php echo $servico->descricao ?>"></textarea>
        <br>

        <label for="valor">Valor:</label> <br>
        <input type="text" name="valor" id="valor" placeholder="Ex: 85.50" value="<?php echo $servico->valor ?>" />
        <br> <br>

        <button name="acao" value="cadastrar">cadastrar</button>
        <button name="acao" value="alterar">Alterar</button>
        <button name="acao" value="excluir">Excluir</button>
        <button name="acao" value="listar">Listar</button>
    </form>
</body>
</html>