<?php
	
	//DEFINIR O TIPO DE REQUISIÇÃO UTILIZANDO UMA INTERFACE PSR
	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	
	//EXECUAT BIBLIOTECA AUTOLAD
	
	require 'vendor/autoload.php';

	//INSTACIAR OBJETO PARA CRAÇÃO DAS ROTAS
	$oApp = new \Slim\App;


	/*=========================================================================
	***************Tipos de Requisições ou Verbos HTTP*************************
	GET    -> Recupera recursos do servidor (SELECT)
	POST   -> Criar dados no servidor       (INSERT)
	PUT    -> Atualiza dados no servidor    (UPDATE)
	DELETE -> Deleta dados no servidor      (DELETE)
	==========================================================================*/
	/*GET Postagens Recuperar dados do Servidor Criação do caminho da ROTA
	-----------------------------------------------------------------------*/
	$oApp->get('/postagens', function (Request $cRequest, Response $cResponse) {
	   echo "Lista de postagens";
		return $cResponse;
	});
	
	/*GET Usuarios Recuperar dados do Servidor Criação do caminho da ROTA
	-----------------------------------------------------------------------*/
	$oApp->get('/usuarios', function (Request $cRequest, Response $cResponse) {
	   
		//GETBODY RECUPERA O CAMINHO DO E ESCREVE DENTRO DO BODY COM PADRAO PSR7
		$cResponse->getBody()->write("Testando");

		return $cResponse;
		
	});

	/*POST Usuarios INSERT dados do Servidor Criação do caminho da ROTA
	-----------------------------------------------------------------------*/
	$oApp->post('/usuarios/adiciona', function (Request $cRequest, Response $cResponse) {
	   
		//RECUPERAR DADOS DO POST
		$aPost = $cRequest->getParsedBody();
		$cNome = $aPost['nome'];
		$cEmail = $aPost['email'];

		/*APOS RECEBER OS DADOS PODEMOS SALVAR NO BANCO*/

		//RETORNAR RESPOSTA A REQUISIÇÃO
		return $cResponse->getBody()->write("SUCESSO AO POSTAR " . $cNome . " - " .$cEmail);
		
		
	});

	/*PUT Usuarios ATUALIZA dados do Servidor Criação do caminho da ROTA
	-----------------------------------------------------------------------*/
	$oApp->put('/usuarios/atualiza', function (Request $cRequest, Response $cResponse) {
	   
		//RECUPERAR DADOS DO POST
		$aPost = $cRequest->getParsedBody();
		$cNome = $aPost['id'];
		$cEmail = $aPost['nome'];
		$cEmail = $aPost['email'];

		/*APOS RECEBER OS DADOS PODEMOS ATUALIZAR NO BANCO*/

		//RETORNAR RESPOSTA A REQUISIÇÃO
		return $cResponse->getBody()->write("SUCESSO AO ATUALIZAR " . $cNome . " - " .$cEmail);
		
	});
	
	
	$oApp->run();

	/*DELETE Usuarios ATUALIZA dados do Servidor Criação do caminho da ROTA
	-----------------------------------------------------------------------*/
	$oApp->delete('/usuarios/remove/{id}', function (Request $cRequest, Response $cResponse) {
	   
		//RECUPERAR DADOS 
		$cId = $cRequest->getAttritbute('id');
		

		/*APOS RECEBER OS DADOS PODEMOS DELETAR NO BANCO*/

		//RETORNAR RESPOSTA A REQUISIÇÃO
		return $cResponse->getBody()->write("SUCESSO AO DELETAR " . $cId);
		
	});
	
	
	$oApp->run();

?>