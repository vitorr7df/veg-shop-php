
<?php
	function conectaDB() {
		echo "conectaDB";
		
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "cadastro";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
		
		return $conn;
	}
?>
