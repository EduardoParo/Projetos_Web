<?php

	require 'vendor/autoload.php';
	
	//INSTACIAR OBJETO PARA CRAÇÃO DAS ROTAS
	$oApp = new \Slim\App;

	//GET Recuperar dados do Servidor Criação do caminho da ROTA
	$oApp->get('/lista', function(){

		echo "Lista de postagens";
	} );

	//GET Recuperar dados do Servidor Criação do caminho da ROTA
	$oApp->get('/usuarios[/{id}]', function($request, $response){
		$cId = $request->getAttribute('id');
		echo "Lista de usuários: " . $cId;
	} );

	//GET Recuperar dados do Servidor Criação do caminho da ROTA
	$oApp->get('/postagens[/{ano}[{mes}]]', function($request, $response){
		$cAno = $request->getAttribute('ano');
		$cMes = $request->getAttribute('mes');
		echo "Postagens : ".$cAno . $cMes;
	} );

	//GET Recuperar dados do Servidor Criação do caminho da ROTA
	$oApp->get('/lista/{itens:.*}', function($request, $response){
		$aItens = $request->getAttribute('itens');
		
		var_dump(explode("/",$aItens));
	} );

	//GET Recuperar dados do Servidor Criação do caminho da ROTA
	$oApp->get('/meusite', function($request, $response){
		
		//EXECUTA A OUTRA ROTA COM O PARAMETRO
		$cRetorno = $this->get("router")->pathFor("blog", ["id"=>"5"]);
		
	} );

	//GROUP Recuperar dados do Servidor Criação do caminho da ROTA
	$oApp->group('/v1', function($request, $response){
		
		//EXECUTA A OUTRA ROTA COM O PARAMETRO
		this->get('/usuarios', function(){
			echo "Lista de usuários: " . $cId;
		} );

		//EXECUTA A OUTRA ROTA COM O PARAMETRO
		this->get('/postagens', function(){
			echo "Lista de usuários: " . $cId;	
		} );
		
	} );

$oApp->run();