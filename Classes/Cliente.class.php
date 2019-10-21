<?php
    class Cliente{
        private $id;
        private $nome;
        private $telefone;
        private $email;

        public function __construct($id, $nome, $telefone, $email){
            $this->id = $id;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->email = $email;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            if( $atributo == 'id' && is_int($valor)){
                $this->$atributo = $valor;
            }

            if( $atributo == 'nome' && is_string($valor)){
                $this->$atributo = $valor;
            }

            if( $atributo == 'telefone' && is_string($valor)){
                $this->$atributo = $valor;
            }

            if( $atributo == 'email' && is_string($valor)){
                $this->$atributo = $valor;
            }
        }

        public function cadastrarCliente(){
            $sql = "INSERT INTO clientes VALUES (DEFAULT, '{$this->nome}', '{$this->telefone}', '{$this->email}')";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }
        
        public function alterarCliente(){
            $sql = "UPDATE clientes SET nome = '{$this->nome}', telefone = '{$this->telefone}', email = '{$this->email}' WHERE id = '{$this->id}'";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }
        
        public function excluirCliente(){
            $sql = "DELETE FROM clientes WHERE id = '{$this->id}'";
            $qry = pg_query($sql);

            return pg_affected_rows($qry) ? true : false;
        }
        
        public function listarCliente(){
            $sql = "SELECT * FROM clientes";
            $qry = pg_query($sql);

            if (pg_num_rows($qry)){
                $res = pg_fetch_all($qry);

                return $res;
            } else {
                return false;
            }
        }

        public function carregarCliente(){
            $sql = "SELECT * FROM clientes WHERE id = '{$this->id}'";
            $qry = pg_query($sql);

            if( pg_num_rows($qry) ){
                $res = pg_fetch_all($qry);

                $this->id = $res[0]['id'];
                $this->nome = $res[0]['nome'];
                $this->telefone = $res[0]['telefone'];
                $this->email = $res[0]['email'];

                return true;
            } else {
                return false;
            }
        }
    }
?>