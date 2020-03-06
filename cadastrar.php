
<?php

	require'config.php';

	session_start();

	if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

		
		$nome = addslashes($_POST['nome']);

		$email = addslashes($_POST['email']);

		$senha = $_POST['senha'];

		$sql = "SELECT * FROM usuario WHERE email = :email";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":email",$email);
		$sql->execute();

		if($sql->rowCount() > 0) {

			foreach($sql->fetchAll() as $info) {

			
			}

			
		}

		if($email != $info['email']) {

		$sql = "INSERT INTO usuario(nome,email,senha) VALUES(:nome,:email,:senha)";
		$sql = $pdo->prepare($sql);

		$sql->bindValue(":nome",$nome);
		$sql->bindValue(":email",$email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		echo ' Cadastro feito com sucesso! clique em "efetuar o login".';


	} 

	else {

		echo " Email já existe! Tente novamente.";
	}

}

?>
<h1>Cadastre-se</h1>

<form method="POST">

	Nome: <input type="text" name="nome"/><br/><br/>

	Email: <input type="email" name="email"/><br/><br/>

	Senha: <input type="senha" name="senha"/><br/><br/>

	<input type="submit" value="Cadastrar"/>


</form>

<hr/> 

<button><a href="login.php"> Efetuar o Login </a></button>