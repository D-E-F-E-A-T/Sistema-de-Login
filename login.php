

<button><a href="cadastrar.php">Cadastrar</a></button><br/>
<hr/>

<form method="POST">
 
 Email: <input type="email" name="email"/><br/><br/>

 Senha: <input type="password" name="senha"/><br/><br/>

 <input type="submit" value="Entrar"/>


</form>

<?php
	

	require'config.php'; 

	session_start();

	

	
	if(!empty($_POST['email'])) {
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];

		$sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {

			$sql = $sql->fetch();

			$_SESSION['logado'] = $sql['id'];


			header("Location:index.php");
			exit;
		
		}

		else {
			echo "email ou senha inválidos! clique em cadastrar ou insira as informações corretas.";

		
		}

	

	
	}


?>


