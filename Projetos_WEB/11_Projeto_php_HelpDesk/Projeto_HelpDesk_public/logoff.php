<?php

	session_start();

	//Imprimir Array da Sessão
	echo'<pre>';
	print_r($_SESSION);
	echo '</pre>';
	
	/*==============================================
	Remover indices do array de sessão -> unset()
	*==============================================*/
	//unset($_SESSION['x']);
//
	////Imprimir Array da Sessão
	//echo'<pre>';
	//print_r($_SESSION);
	//echo '</pre>';
	
	/*==============================================
	Destroir a variavel de sessão -> session_destroy()
	==============================================*/
	session_destroy();

	//Imprimir Array da Sessão
	echo'<pre>';
	print_r($_SESSION);
	echo '</pre>';

	header('Location: index.php')

?>