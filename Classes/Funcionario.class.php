<?php
	
	class Funcionario{
		private $id;
		private $nome;
		private $senha;
		private $telefone;
		private $email;
		private $funcao;
		
		public function __construct($id, $matricula, $nome, $senha, $remuneracaoHora){
			$this->id = $id;
			$this->nome = $nome;
			$this->senha = $senha;
			$this->telefone = $telefone;
			$this->email = $email;
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
			
			if($atributo == 'senha' && is_string($valor)){
				$this->$atributo = $valor;
			}

			if($atributo == 'telefone' && is_string($valor)){
				$this->$atributo = $valor;
			}

			if($atributo == 'email' && is_string($valor)){
				$this->$atributo = $valor;
			}

			if($atributo == 'funcao' && is_string($valor)){
				$this->$atributo = $valor;
			}
		}

		public function cadastrarFuncionario(){
			$sql = "INSERT INTO funcionario VALUES (DEFAULT, '{$_POST['name']}', '{$_POST['senha']}')";
			$qry = pg_query($sql);

			return pg_affected_rows($qry) ? true : false;
		}

		public function alterarFuncionario(){
			$sql = "UPDATE funcionario SET nome = {$this->nome}, senha = {$this->senha}, telefone = {$this->telefone},
			email = {$this->email} WHERE id = {$this->id}";
			$qry = pg_query($sql);

			return pg_affected_rows($qry) ? true : false;
		}

		public function excluirFuncionario(){
			$sql = "DELETE FROM funcionario WHERE id = {$this->id}";
			$qry = pg_query($sql);

			return pg_affected_rows($qry) ? true : false;
		}

		public function listarFuncionario(){
			$sql = "SELECT * FROM funcionario";
			$qry = pg_query($sql);

			if(pg_num_rows($qry)){
				$res = pg_fetch_all($qry);
				echo "<table>";
					echo "<tr>";
						echo "<th>ID</th>";
						echo "<th>Nome</th>";
						echo "<th>Senha</th>";
						echo "<th>Telefone</th>";
						echo "<th>Email</th>";
						echo "<th>Função</th>";
					echo "</tr>";
					foreach($res as $func){
						echo "<tr>";
							echo "<td>$func->id</td>";
							echo "<td>$func->nome</td>";
							echo "<td>$func->senha</td>";
							echo "<td>$func->telefone</td>";
							echo "<td>$func->email</td>";
							echo "<td>$func->funcao</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
		}
	}
?>