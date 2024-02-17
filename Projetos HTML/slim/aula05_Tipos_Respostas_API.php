<?php
	
	//DEFINIR O TIPO DE REQUISIÇÃO UTILIZANDO UMA INTERFACE PSR
	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	
	//EXECUAT BIBLIOTECA AUTOLAD
	
	require 'vendor/autoload.php';

	//INSTACIAR OBJETO PARA CRAÇÃO DAS ROTAS
	$oApp = new \Slim\App([
		'settings' => [
						'displayErrorDetails' => true
					  ]
	]);
	/*====================================================================
	---------------------TIPOS DE RESPOSTAS--------------------------------
	- CABEÇALHO, TEXTO, JSON, XML
	======================================================================*/

	/*RETORNAR DADOS DE UM CABEÇALHO
	----------------------------------------------------------------*/
	$oApp->get('/header', function(Request $cReq, Response $cResp){
		
		$cResp->write('Esse é um retorno header');

		//SOMENTE É PERMITIDO REQUISICAO DO TIPO PUT
		$cResp->withHeader('alow','PUT')
			  ->withHeader('Content-Length',10);
	});

	/*RETORNAR OBJ JSON
	----------------------------------------------------------------*/
	$oApp->get('/json', function(Request $cReq, Response $cResp){
		
		return $cResp->withJson([
			"nome" => "Eduardo",
			"email" =>"eduardo@totvs.com"
		]);


	});
/*RETORNAR OBJ JSON
	----------------------------------------------------------------*/
	$oApp->get('/xml', function(Request $cReq, Response $cResp){
		
		
		$cXml = file_get_contents('arquivo');
		$cResp->write($cXml);

		return $cResp->withHeader('Content-Type', 'application/xml');

	});
		