<?php
	session_start();
	require_once 'conn.php'  
	if(ISSET($_POST['register'])){
		if($_POST['firstname'] != "" || $_POST['username'] != "" || $_POST['password'] != ""){
			try{
				$firstname = $_POST['Nome'];
				$lastname = $_POST['Sobrenome'];
				$username = $_POST['Usuário'];
				// md5 encrypted
				// $password = md5($_POST['password']);
				$password = $_POST['senha'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `member` VALUES ('', '$firstname', '$lastname', '$username', '$password')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"Conta criada com sucesso","alert"=>"info");
			$conn = null;
			header('location:index.php');//Modificar e colocar a URL
		}else{
			echo "
				<script>alert('Preencha todos os campos!')</script>
				<script>window.location = 'registration.php'</script>
			";
		}
	}
?>