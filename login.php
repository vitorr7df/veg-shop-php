<!DOCTYPE html>
<html>
	<head> 
		<meta charset="UTF-8"> 
		<link href="bootstrap-5.2.1-dist/css/bootstrap.min.css" rel="stylesheet">		
	</head>
	<body>
		<img src="./img/construction.jpg"> 
		
		<?php
			
			include 'conection.php';
			include 'pessoa.php';
			include 'util.php';
	
			function autenticarBind($conn, $pessoa){
				
				echo "<br> Email: ".$pessoa->getEmail();
				
				$stm = $conn->prepare('SELECT NOME, EMAIL FROM cadastro.pessoa WHERE EMAIL=? and SENHA=?');
				
				$stm->bind_param('ss', $pessoa->getEmail(), $pessoa->getSenha());
				
				$stm->execute();
						
				$autenticado = 0;
				
				$result = $stm->get_result();
				
				try {
					while($row = mysqli_fetch_assoc($result)) {
						var_dump($row);
						echo "<br>". " - Nome: " . $row["NOME"];
						echo "<br>". " - Email: " . $row["EMAIL"];
						$autenticado=1;
					}
				}
				catch (mysqli_sql_exception $e) {
					$autenticado=0;
				}
				
				echo "<br>"."<br>"."Valor Interno login ".$autenticado;
				
				$_SESSION['autenticado'] = $autenticado;
				
				if ($autenticado == 1) {
					$inactive = 10;

					$_SESSION['expire'] = time() + $inactive; // static expire
					
					redirect("index.html");
				}
				else
					redirect("login.html");
			}
						
			function autenticar() {
						
				if (isset($_POST["email"]) && isset($_POST["senha"])) {
					
					// abre conexão com o banco de dados
					$conn = conectaDB();
					
					$pessoa = new Pessoa();
					$pessoa->setEmail($_POST["email"]);
					$pessoa->setSenha($_POST["senha"]);

					autenticarBind($conn, $pessoa);
					
				}
			}
			
			if (isset($_POST["autenticar"]))
				autenticar();

		?>
	</body>
</html>
