<?php
    class Servico{
        private $id;
        private $nome;
        private $descricao;
        private $valor;

        public function __construct($id, $nome, $descricao, $valor){
            $this->id = $id;
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->valor = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo == 'id' && is_int($valor) ){
                $this->$atributo = $valor;
            }
        
            if( $atributo == 'nome' && is_string($valor) ){
                $this->$atributo = $valor;
            }
        
            if( $atributo == 'descricao' && is_string($valor) ){
                $this->$atributo = $valor;
            }
        
            if( $atributo == 'valor' && is_float($valor) ){
                $this->$atributo = $valor;
            }
        }

        public function cadastrarServico(){
            $sql = "INSERT INTO servicos VALUES (DEFAULT, '{$this->nome}','{$this->descricao}', {$this->valor})";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }
        
        public function alterarServico(){
            $sql = "UPDATE servicos SET nome = '{$this->nome}', descricao = '{$this->descricao}', valor = {$this->valor} WHERE id = '{$this->id}'";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function excluirServico(){
            $sql = "DELETE FROM servicos WHERE id = '{$this->descricao}'";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }

        public function listarServico(){
            $sql = "SELECT * FROM servicos";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                return $res;
            } else {
                return false;
            }
        }

        public function carregarServico(){
            $sql = "SELECT * FROM servicos WHERE id = '{$this->id}'";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                $this->id = $res[0]['id'];
                $this->nome = $res[0]['nome'];
                $this->descricao = $res[0]['descricao'];
                $this->valor = $res[0]['valor'];

                return true;
            } else {
                return false;
            }
        }

    }    
?>