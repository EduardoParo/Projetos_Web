<?php
	session_start();

	/*==============================================
	Imprimir  pulando em linhas o array action da pagina com os names definidos
	*==============================================*/
	echo '<pre>';
	print_r($_POST);
	echo '<pre>';

	/*==============================================
	Abrir um arq caso não exista criar um arq
	*==============================================*/
	//Atribuir os valores do array para as variaveis substituindo por - o caracter # caso exista

	$cTitulo    =  str_replace('#', '-',$_POST['titulo'] );//POST dados form
	$cCategoria =  str_replace('#', '-',$_POST['categoria'] );
	$descricao  =  str_replace('#', '-',$_POST['descricao'] );

	//implode('#',$_POST)// Converte um array em uma string DESAFIO
	$cTexto  =  $_SESSION['id'] . ' #' ;
	$cTexto .= $cTitulo   		. ' #' ;
	$cTexto .= $cCategoria		. ' #' ;
	$cTexto .= $descricao ;
	$cTexto .= PHP_EOL ; //pula uma linha (End OFF LINE)
	echo $cTexto;

	
	$cArquivo = fopen('../Diretorio_interno/backup.txt', 'a');
	fwrite($cArquivo, $cTexto);
	fclose($cArquivo);

	header('Location: abrir_chamado.php')

?>