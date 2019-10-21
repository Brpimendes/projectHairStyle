<?php
    require_once('Classes/Funcionario.class.php');

    pg_connect("host=localhost port=5432 user=postgres password=123456 dbname=hairstyle");

    $func = new Funcionario($_POST['id'], $_POST['nome'], $_POST['telefone'], $_POST['email'], $_POST['senha'], $_POST['funcao']);

    if( $_POST['acao'] === 'cadastrar' ){
        if($func->cadastrarFuncionario()){            
            echo "Funcionário cadastrado com sucesso";
        } else {
            echo "Falha ao cadastrar funcionário.";
        }
    }

    if( $_POST['acao'] === 'alterar' ){
        if($func->alterarFuncionario()){
            echo "Funcionario alterado com sucesso.";
        } else {
            echo "Falha ao alterar funcionário.";
        }
    }

    if( $_POST['excluir'] === 'excluir' ){
        if($func->excluirFuncionario()){
            echo "Funcionario excluído com sucesso.";            
        } else {
            echo "Falha ao excluir funcionário";
        }
    }
?>