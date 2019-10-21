<?php
    require_once('Classes/Cliente.class.php');

    pg_connect("host=localhost port=5432 user=postgres password=123456 dbname=hairstyle");

    $cliente = new Cliente((int)$_POST['id'], $_POST['nome'], $_POST['telefone'], $_POST['email']);

    if( $_POST['acao'] === 'cadastrar' ){
        if($cliente->cadastrarCliente()){            
            echo "Cliente cadastrado com sucesso";
        } else {
            echo "Falha ao cadastrar cliente.";
        }
    }

    if( $_POST['acao'] === 'alterar' ){
        if($cliente->alterarCliente()){
            echo "Cliente alterado com sucesso.";
        } else {
            echo "Falha ao alterar cliente.";
        }
    }

    if( $_POST['acao'] === 'excluir' ){
        if($cliente->excluirCliente()){
            echo "Cliente excluído com sucesso.";            
        } else {
            echo "Falha ao excluir cliente";
        }
    }

    if( $_POST['acao'] === 'listar' ){
        $cli = $cliente->listarCliente();

        echo "<table border='1px'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ação</th>
                </tr>
        ";
        foreach( $cli as $clientes ){
            echo "<tr>
                    <td>{$clientes['id']}</td>
                    <td>{$clientes['nome']}</td>
                    <td>{$clientes['telefone']}</td>
                    <td>{$clientes['email']}</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='id' value='{$clientes['id']}' />
                            <button name='acao' value='carregar'>Carregar</button>
                        </form>
                    </td>
            </tr>";
        }
        echo "</table>";
    }

    if( $_POST['acao'] === 'carregar' && isset($_POST['id']) ){
        $cliente->carregarCliente();
    }
?>