<!DOCTYPE html>
<?php
	require 'conn.php';
	session_start();
 
	if(!ISSET($_SESSION['user'])){
		header('location:index.php');
	}
?>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary"></h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h3>Bem vindo!</h3>
			<br />
			<?php
				$id = $_SESSION['user'];
				$sql = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
				$sql->execute();
				$fetch = $sql->fetch();
			?>
			<p style="text-align:center;">Nesta pagina será exibida os projetos realizado pelo laboratório de cadastro</p>
            
            <!--<center><h4><?php echo $fetch['firstname']." ". $fetch['lastname']?></h4></center>-->
			<a href = "logout.php">Logout</a>
		</div>
	</div>
</body>
</html>