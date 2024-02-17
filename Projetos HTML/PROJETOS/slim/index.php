<?php
	
	//DEFINIR O TIPO DE REQUISIÇÃO UTILIZANDO UMA INTERFACE PSR
	use Psr\Http\Message\ResponseInterface as Response;
	use Psr\Http\Message\ServerRequestInterface as Request;
	use Illuminate\Database\Capsule\Manager as Capsule;
	
	//EXECUAT BIBLIOTECA AUTOLAD
	
	require 'vendor/autoload.php';

	//INSTACIAR OBJETO PARA CRAÇÃO DAS ROTAS
	$oApp = new \Slim\App([
		'settings' => [
						'displayErrorDetails' => true
					  ]
	]);
	//RECUPERAR CONTAINER
	$oContainer = $oApp->getContainer();

	//REALIZAR A CONEXAO COM O BANCO DE DADOS
	$oContainer['oDataBase'] = function(){
		//INSTACIA O OBJ DO ILLUMINATE
		$oCapsule = new Capsule;

		$oCapsule->addConnection([
			'driver'				=> 'mysql',
			'host'					=> 'localhost',
			'database'				=> 'slim',
			'username'				=> 'root',
			'password'				=> '',
			'charset'				=> 'utf8',	
			'collation'				=> 'utf8_unicode_ci',
			'prefix'				=> '',	
		]);
		$oCapsule->setAsGlobal();
		$oCapsule->bootEloquent();

		return $oCapsule;
	};

	/*RETORNAR DADOS DE UM CABEÇALHO
	----------------------------------------------------------------*/
	$oApp->get('/usuarios', function(Request $cReq, Response $cResp){
		$oDb = $this['oDataBase'];

		/*EXLUIR TABELA CASO EXISTA 
		----------------------------------------------------*/
		//$oDb->schema()->dropIfExists('usuarios');
		////CRIAR A TABELA
		//$oDb->schema()->create('usuarios', function($cTable){
		//	 $cTable->increments('id');
    	//	 $cTable->string('nome');
    	//	 $cTable->string('email');
    	//	 $cTable->timestamps();
		//});

		/*INSERIR
		----------------------------------------------------*/
		//$oDb->table('usuarios')->insert([
		//	'nome'  => 'Edu Paro',
		//	'email' => 'Eduardo@totvs.com'
		//
		//]);

		/*UPDATE
		----------------------------------------------------*/
		//$oDb->table('usuarios')
		//	->where('id',1)
		//	->update([
		//		'nome'	=>	'Eduardo Paro de Simoni'
		//	]);
		
		/*DELETAR
		----------------------------------------------------*/
		//$oDb->table('usuarios')
		//	->where('id',2)
		//	->delete();

		/*LISTAR
		----------------------------------------------------*/
		$aUsuarios = $oDb->table('usuarios')->get();
			
		foreach($aUsuarios as $cUsuario) {
			echo $cUsuario->nome . '<br>';
		};
		
	});
	
	$oApp->run();

?>