
<?php
	class Pessoa{
		private $nome;
		private $email;
		private $senha;
		private $nascimento;
		private $cpf;
		private $telefone;
		private $cep;
		private $endereco;
		private $cidade;
		private $estado;
		
		function setNome($nome) {$this->nome = $nome;}
		function getNome() {return $this->nome;}
		function setEmail($email) {$this->email = $email;}
		function getEmail() {return $this->email;}
		function setSenha($senha) {$this->senha = $senha;}
		function getSenha() {return $this->senha;}
		function setNascimento($nascimento) {$this->nascimento = $nascimento;}
		function getNascimento() {return $this->nascimento;}
		function setCpf($cpf) {$this->cpf = $cpf;}
		function getCpf() {return $this->cpf;}
		function setTelefone($telefone) {$this->telefone = $telefone;}
		function getTelefone() {return $this->telefone;}
		function setCep($cep) {$this->cep = $cep;}
		function getCep() {return $this->cep;}
		function setEndereco($endereco) {$this->endereco = $endereco;}
		function getEndereco() {return $this->endereco;}
		function setCidade($cidade) {$this->cidade = $cidade;}
		function getCidade() {return $this->cidade;}
		function setEstado($estado) {$this->estado = $estado;}
		function getEstado() {return $this->estado;}
		
	}
?>
