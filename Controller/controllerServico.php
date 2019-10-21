<?php
    require_once('Classes/Servico.class.php');

    pg_connect("host=localhost port=5432 user=postgres password=123456 dbname=hairstyle");

    $servico = new Servico((int)$_POST['id'], $_POST['nome'], $_POST['descricao'], (float)$_POST['valor']);

    if( $_POST['acao'] === 'cadastrar' ){
        if($servico->cadastrarServico()){            
            echo "Serviço cadastrado com sucesso";
        } else {
            echo "Falha ao cadastrar serviço.";
        }
    }

    if( $_POST['acao'] === 'alterar' ){
        if($servico->alterarServico()){
            echo "Serviço alterado com sucesso.";
        } else {
            echo "Falha ao alterar serviço.";
        }
    }

    if( $_POST['acao'] === 'excluir' ){
        if($servico->excluirServico()){
            echo "Serviço excluído com sucesso.";            
        } else {
            echo "Falha ao excluir serviço.";
        }
    }

    if( $_POST['acao'] === 'listar' ){
        $serv = $servico->listarServico();

        echo "<table border='1px'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
        ";
        foreach( $serv as $servicos ){
            echo "<tr>
                    <td>{$servicos['id']}</td>
                    <td>{$servicos['nome']}</td>
                    <td>{$servicos['descricao']}</td>
                    <td>{$servicos['valor']}</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='id' value='{$servicos['id']}' />
                            <button name='acao' value='carregar'>Carregar</button>
                        </form>
                    </td>
            </tr>";
        }
        echo "</table>";
    }

    if( $_POST['acao'] === 'carregar' && isset($_POST['id']) ){
        $servico->carregarServico();
    }

?>