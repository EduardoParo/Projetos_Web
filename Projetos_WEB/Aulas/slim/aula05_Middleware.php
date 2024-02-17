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
	---------------------MIDDLEWARE--------------------------------
	- ADICIONA CAMADA DE EXECUÇÕES DE CODIGO DENTRO DA SUA APLICAÇÃO
	 ANTES DE EXECUTAR AS ROTAS
	======================================================================*/
	$oApp->add( function($cReq, $cResp,  $cNext){
		$cResp->write('Inicio camada 1 + ');
		//return  $cNext($cReq, $cResp);

		//RECEBE A RESPOSTA DO METODO QUE FOI REQUISIDADO
		$cResp = $cNext($cReq, $cResp);

		$cResp->write(' + Fim da Camada 1 ');

		return  $cResp;

	});

	//MIDDLEWARE 2 CHAMADO PRIMEIRO DEPOIS O 1
	$oApp->add( function($cReq, $cResp,  $cNext){
		$cResp->write('Inicio camada 2 + ');
		return  $cNext($cReq, $cResp);
	});

	/* SO SERA CHAMADO DEPOIS QUE PASSAR PELO MIDLEWARE
	---------------------------------------------------------------*/
	$oApp->get('/usuarios', function(Request $cReq, Response $cResp){
		$cResp->write(' Ação Usuarios');
	});

	$oApp->get('/postagens', function(Request $cReq, Response $cResp){
		$cResp->write(' Ação Postagens ');
	});
	
	$oApp->run();

?>