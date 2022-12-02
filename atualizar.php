<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8"> 
		<link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">		
	</head>
	<body>
		<h1>SUCESSO</h1> 
		
		<?php
		
			include 'conection.php';
			include 'pessoa.php';
			include 'util.php';
			include 'validapessoa.php';
			
			function updateOO($conn, $pessoa){
				
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
				
				$sql = "UPDATE cadastro.pessoa set ";
				$sql .= "NOME = " ."'".$pessoa->getNome()."'". ", ";
				$sql .= "SENHA = " ."'".$pessoa->getSenha()."'". ", ";
				$sql .= "NASCIMENTO = " ."'".$pessoa->getNascimento()."'". ", ";
				$sql .= "CPF = " ."'".$pessoa->getCpf()."'". ", ";
				$sql .= "TELEFONE = " ."'".$pessoa->getTelefone()."'". ", ";
				$sql .= "CEP = " ."'".$pessoa->getCep()."'". " ";
				$sql .= "ENDERECO = " ."'".$pessoa->getEndereco()."'". " ";
				$sql .= "CIDADE = " ."'".$pessoa->getCidade()."'". " ";
				$sql .= "ESTADO = " ."'".$pessoa->getEstado()."'". " ";
				$sql .= "WHERE EMAIL = "."'".$pessoa->getEmail()."'". " ";
				
				echo "<br>";
				echo $sql;
				
				if ($conn->query($sql) === TRUE) {
					echo "<br> Registros Atualizados com sucesso";
					function_alert("Registros Atualizados com sucesso");
				} else {
					echo "Error update: " . $conn->error;
				}
			}
			
			function atualizar() {
						
				if (valida() == true) {
					
					// abre conexão com o banco de dados
					$conn = conectaDB();
					
					// recuperando dados via POST
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
					
					updateOO($conn, $pessoa);
				}
			}
			
			if (isset($_POST["atualizar"]))
				atualizar();

		?>
	</body>
</html>
