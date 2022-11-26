
<?php
	function validaNome() { 
		$nome = $_POST["nome"];
		if(strlen($nome)<=2) {
		  echo "Preencha o nome com no mínimo 2 caracteres."; 
		  }
		else {
		  echo $nome;
		  echo "<br>";
		  return true;
		}
		
	}
			
	function validaIdade() { 
		$nascimento = $_POST["nascimento"];
	  
		echo "Data de Nascimento:  $nascimento";
		echo "<br>"; 
		return true;
	}
	
	function validaEmail() { 
		$email = $_POST["email"];
		echo "Email:  $email"; 
		echo "<br>"; 
		return true;
	}
	
	function validaSenha() {
		$senha = $_POST["senha"];
		$pattern = '/^([ a-zA-Z0-9@ *#]{8,15})$/';
		
		if ($senha === FALSE) {
		  echo "A senha deve ter no mínimo 8 caracteres 
		  e no máximo 15 caracteres.";
		} else {
		  return true;
		}
	}
	
	function valida() {
				
		$resp = true;
					
		$validacao = array(validaNome(), 
		validaIdade(), 
		validaEmail(),
	  	validaSenha());
					
		for($i=0; $i < sizeof($validacao); $i++)
			{
				if ($validacao[$i] == false) {
				$resp = false;
				break;
				}
			}
					
			return $resp;
	}
?>
