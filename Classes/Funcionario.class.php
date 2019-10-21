<?php
	class Funcionario{
		private $id;		
		private $nome;
		private $telefone;
		private $email;
		private $senha;
		private $funcao;
				
		public function __construct($id, $nome, $telefone, $email, $senha, $funcao){
			$this->id = $id;			
			$this->nome = $nome;
			$this->telefone = $telefone;
			$this->email = $email;
			$this->senha = $senha;
			$this->funcao = $funcao;
		}
		
		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			if($atributo == 'id' && is_int($valor)){
				$this->$atributo = $valor;
			}

			if($atributo == 'nome' && is_string($valor)){
				$this->$atributo = $valor;
			}

			if($atributo == 'telefone' && is_string($valor)){
				$this->$atributo = $valor;
			}

			if($atributo == 'email' && is_string($valor)){
				$this->$atributo = $valor;
			}
			
			if($atributo == 'senha' && is_string($valor)){
				$this->$atributo = $valor;
			}

			if($atributo == 'funcao' && is_string($valor)){
				$this->$atributo = $valor;
			}
		}

		public function cadastrarFuncionario(){
			$sql = "INSERT INTO funcionario VALUES (DEFAULT, '{$_POST['nome']}','{$_POST['telefone']}', '{$_POST['email']}', '{$_POST['senha']}', '{$_POST['funcao']}')";
			$qry = pg_query($sql);

			return pg_affected_rows($qry) ? true : false;
		}

		public function listarFuncionario(){
			$sql = "SELECT * FROM funcionario";
			$qry = pg_query($sql);

			if(pg_num_rows($qry)){
				pg_fetch_all($qry);				
			}
		}

		public function alterarFuncionario(){
			$sql = "UPDATE funcionario SET nome = '{$this->nome}', senha = '{$this->senha}', remuneracaoHora = {$this->remuneracaoHora} WHERE matricula = {$this->matricula}";
			$qry = pg_query($sql);

			return pg_affected_rows($qry) ? true : false;
		}

		public function excluirFuncionario(){
			$sql = "DELETE FROM funcionario WHERE id = {$this->id}";
			$qry = pg_query($sql);

			return pg_affected_rows($qry) ? true : false;
		}
	}
?>