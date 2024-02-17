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


	/*======================================================================
	---------------CONTAINER DEPENDENCY INJECTION--------------------------
	========================================================================*/
	class Servico{

	};
	//$oServico = new Servico;

	/*======================================================================
	CONTAINER PIMPLE -> CRIA UMA DEPENDENCIA DO SERVICO ACIMA
	========================================================================*/
	$oContainer = $oApp->getContainer();
	//INSTACIA O OBJ CLASS SERVICO
	$oContainer['servico'] = function(){
		return new Servico;
	};

	/*GET RECUPERA OS DADOS DO CAMINHO COM DEPENDENCIA
	------------------------------------------------------------------------------*/
	$oApp->get('/servico', function(Request $cReq, Response $cResp){
		
		$oServico = $this->get('servico');
		var_dump($oServico);
	});
	/*====================================================================
	--------------------CONTROLLERS COMO SERVICO--------------------------
	====================================================================*/
	$oContainer = $oApp->getContainer();
	//INJEÇÃO DE DEPENDENCIAS
	$oContainer['Home'] = function(){
		return new MyApp\controllers\Home(new MyApp\View);
	};
	/*GET COM UMA ROTA QUE APONTA PARA O METODO INDEX
	----------------------------------------------------------------------*/
	$oApp->get('/usuario', 'Home:index' );
		

	
	
	$oApp->run();

?>