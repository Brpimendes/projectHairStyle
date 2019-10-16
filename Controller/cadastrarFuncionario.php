<?php
    require_once('Classes/Funcionario.class.php');

    pg_connect("host=localhost port=5432 user=postgres password=123456 dbname=hairstyle");

    $func = new Funcionario($_POST['id'], $_POST['nome'], $_POST['senha'], $_POST['telefone'], 
                            $_POST['email'], $_POST['funcao']);

    if($_POST['cadastrar']){
        if(isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['funcao'])){
            if($func->cadastrarFuncionario()){        
                echo "Funcionário cadastrado com sucesso";
            } else {
                echo "Falha ao cadastrar funcionário.";
            }
        }
    }

    if($_POST['alterar']){
        if(isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['funcao'])){
            if($func->alterarFuncionario()){        
                echo "Funcionário cadastrado com sucesso";
            } else {
                echo "Falha ao cadastrar funcionário.";
            }
        }
    }

    if(isset($_POST['excluir']) && isset($_POST['id'])){
        if($func->excluirFuncionario()){
            echo "Funcionário excluido com sucesso.";
        } else {
            echo "Falha ao excluir clientes.";
        }
    }
?>