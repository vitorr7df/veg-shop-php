<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8"> 
		<link href="css/my-login.css" rel="stylesheet">		
	</head>
	<body>
		
		
		<?php
			
			include 'conection.php';
			include 'pessoa.php';
			include 'util.php';
			include 'validapessoa.php';

			function insertOO($conn, $pessoa){
				
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
				
				$sql = "INSERT INTO cadastro.pessoa (nome, email, senha, nascimento, cpf, telefone, cep, endereco, cidade, estado) VALUES ('{$pessoa->getNome()}','$email','$senha','$nascimento','$cpf','$telefone','$cep','$endereco','$cidade','$estado')";								
				
				echo "<br>". $sql;
				
		
				adicionar($conn, $pessoa);
			}
			function adicionar($conn, $pessoa)
			{
				try {
					$insere = $conn->prepare('INSERT INTO cadastro.pessoa (nome, email, senha, nascimento, cpf, telefone, cep, endereco, cidade, estado) VALUES(?,?,?,?,?,?,?,?,?,?);');
					$insere->bind_param('ssssssssss', $pessoa->getNome(), 
											  $pessoa->getEmail(), 
											  $pessoa->getSenha(), 
											  $pessoa->getNascimento(), 
											  $pessoa->getCpf(), 
											  $pessoa->getTelefone(),
											  $pessoa->getCep(),
											  $pessoa->getEndereco(),
											  $pessoa->getCidade(),
											  $pessoa->getEstado());
					
					$result_sql = $insere->execute();
				
					//var_dump($result_sql);
				}
				catch (mysqli_sql_exception $e) {
					//var_dump($e);
					function_alert("Erro no cadastro");
				}
			}
			function cadastrar() {
						
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
					
					insertOO($conn, $pessoa);
					
				}
			}
			
			if (isset($_POST["gravar"]))
				cadastrar();

		?>
	</body>
</html>
