<?php
	//COMPOSER É UM GERENCIADOR DE DEPENDENCIAS
	require_once "../vendor/autoload.php";
	
	//CHAMA O METODO ROUTES QUE CHAMA O CONTROLLER COM AS AÇÕES
	$oRoute = new \App\Routes\Route;

	echo 'Hellow Word';
	//echo '<hr>';
	//print_r($oRoute->getUrl());
	//
	//
	////TESTAR AS CONFIGURAÇÕES DAS ROTAS
	//echo '<hr>';
	//echo ' INDEX <pre>';
	//print_r($oRoute->getRoutes());
	//echo '</pre>';
?>