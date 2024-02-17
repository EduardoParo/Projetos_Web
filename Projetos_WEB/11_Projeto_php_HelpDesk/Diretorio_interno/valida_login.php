<?php
//Variavel compartilhada entre todas outras paginas dentro da instancia do navegador
	session_start();
	/*===============================================
	Variavel SESSION tornamos publicos para acessar de qualquer lugar da aplicação
	=========================================================*/
	//$_SESSION['x'] = 'olá eu Sou o Eduardo';
	//print_r($_SESSION);
	//echo('<hr />');

	/* Metodo GET
	//impressão da super global GET
	print_r($_GET);

	//Impressão dos indices do array GET dados
	echo $_GET['email'];
	echo '<br/>';
	echo $_GET['senha'];
	*/

	/*====================================================
	Usuários do sistema
	=====================================================*/
	//Variavel que verifica se a autenticação foi realizada
	$lUser = false;
	$cId = null;
	$cPerfil = null;
	$cNome = null;

	$aPerfis = array(1 => 'Administrador', 2 => 'Usuario' );

	$aUsuarios = array(
						array('id'=> '1' ,'email' => 'adm@teste.com.br'  , 'senha' => '123', 'perfil' => '1'),
						array('id'=> '2' ,'email' => 'jose@teste.com.br' ,'senha' =>'123', 'perfil' => '2'),
						array('id'=> '3' ,'email' => 'maria@teste.com.br' ,'senha' =>'123', 'perfil' => '2'),
						array('id'=> '4' ,'email' => 'joao@teste.com.br' ,'senha' =>'123' , 'perfil' => '2'),
	);
	/*	
	//Imprimir usuários
	echo '<pre>';
	print_r($aUsuarios_app);
	echo '</pre>';
	*/

	/*
	//impressão da super global GET
	print_r($_POST);

	//Impressão dos indices do array GET dados
	echo $_POST['email'];
	echo '<br/>';
	echo $_POST['senha'];
	*/

	/*==================================================================================
	Validar o Usuário e Senha percorrer o array OBS cada indice do Array retorna outro array com email e senha
	===================================================================================*/
	foreach ($aUsuarios as $aUser) {

		//print_r($user);//print_r pois é um array
		/*
		echo 'Usuário app : ' . $aUser['email'] . '/' . $aUser['senha'];
		echo '<br/>';
		echo 'Usuário form : ' . $_POST['email']  .'/' . $_POST['senha'];  
		echo'<hr>';
		*/
		if($_POST['email']== $aUser['email'] && $_POST['senha'] == $aUser['senha'] ){
			$lUser = true;

			//mostrar o usuário autenticado
			//echo'<pre>';
			//print_r($aUser);
			//echo'<pre>';

			$cId = $aUser['id'];
			$cPerfil = $aUser['perfil'];
			$cNome =  explode('@',$aUser['email']);

		}

	}
	/*=====================================================
	Controle // As SESSION tem todas as variaveis do fonte em seu array
	========================================================*/
	if ($lUser) {
		echo 'Usuário Autenticado';
		//Cria indice array com indice autenticado = sim

		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $cId;
		$_SESSION['perfil'] = $cPerfil;
		$_SESSION['nome'] = $cNome[0];

		echo '<br/>';
		echo $_SESSION['nome'];

		//$_SESSION['x'] = 'TESTEX';
		//$_SESSION['y'] = 'TESTEY';
		header("Location: home.php");
	}else{
		$_SESSION['autenticado'] = 'NAO';
		//Função header que envia um retorno para a pagina
		//header("Location: index.php?login=erro");
	}
?>