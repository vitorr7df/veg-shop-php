<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8"> 
		<link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">		
	</head>
	<body>
		<h1>Excluir</h1> 
		
		<?php 
		
			include 'conection.php';
			include 'pessoa.php';
			include 'util.php';
			include 'validapessoa.php';

			function excluirOO($conn, $pessoa){
				
				echo "<br> Nome: ".$pessoa->getNome();
				echo "<br> Email: ".$pessoa->getEmail();
				echo "<br> Senha: ".$pessoa->getSenha();
				echo "<br> Nascimento: ".$pessoa->getNascimento();
				echo "<br> CPF: ".$pessoa->getCpf();
				echo "<br> Telefone: ".$pessoa->getTelefone();
				echo "<br> Cep: ".$pessoa->getCep();
				echo "<br> Endereço: ".$pessoa->getEndereco();
				echo "<br> Cidade: ".$pessoa->getCidade();
				echo "<br> Estado: ".$pessoa->getEstado();
				
				$nome = $pessoa->getNome();
				$email = $pessoa->getEmail();
				$senha = $pessoa->getSenha();
				$nascimento = $pessoa->getNascimento();
				$cpf = $pessoa->getCpf();
				$telefone = $pessoa->getTelefone();
				$cep = $pessoa->getCep();
				$endereco = $pessoa->getEndereco();
				$cidade = $pessoa->getCidade();
				$estado = $pessoa->getEstado();
				
				$sql = "DELETE FROM cadastro.pessoa ";
				$sql .= "WHERE EMAIL = "."'".$pessoa->getEmail()."'". " ";
				
				echo "<br>";
				echo $sql;
				
				if ($conn->query($sql) === TRUE) {
					echo "<br> Registros Excluidos com sucesso";
					function_alert("Registros Excluidos com sucesso");
				} else {
					echo "Error Delete: " . $conn->error;
				}
			}
			
			function excluir() {
						
				if (valida() == true) {
					
					$conn = conectaDB();
					
					$nome = $_POST["nome"];
					$email = $_POST["email"];
					$senha = $_POST["senha"];
					$nascimento = $_POST["nascimento"];
					$cpf = $_POST["cpf"];
					$telefone = $_POST["telefone"];
					$cep = $_POST["cep"];
					$endereco = $_POST["endereco"];
					$cidade = $_POST["cidade"];
					$estado = $_POST["estado"];
			
				
					$pessoa = new Pessoa();
					$pessoa->setNome($nome);
					$pessoa->setEmail($email);
					$pessoa->setSenha($senha);
					$pessoa->setNascimento($nascimento);
					$pessoa->setCpf($cpf);
					$pessoa->setTelefone($telefone);
					$pessoa->setCep($cep);
					$pessoa->setEndereco($endereco);
					$pessoa->setCidade($cidade);
					$pessoa->setEstado($estado);
					
					excluirOO($conn, $pessoa);
				}
			}
			
			if (isset($_POST["excluir"]))
				excluir();

		?>
	</body>
</html>
