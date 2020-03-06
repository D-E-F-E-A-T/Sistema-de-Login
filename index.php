<?php
	

	require'config.php';

	session_start();	



	if(!empty($_SESSION['logado'])) {

		$id = $_SESSION['logado'];

		$sql = "SELECT * FROM usuario WHERE id = :id";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0 ) {

			$sql = $sql->fetch();

			$nome = $sql['nome'];
		}

		else {

			

			header("Location:login.php");
			exit;
		}

		
	}

	else {

		header("Location:login.php");
		exit;
	}



?>

<h2>Bem vindo ao sistema prezado <?php echo $nome; ?>.</h2>
<hr/>

<br/><button><a href="sair.php">Sair do sistema</a></button>
