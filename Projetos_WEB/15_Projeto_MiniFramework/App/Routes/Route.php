<?php
	//DEFINIR  ESTE ARQ COMO REFERENCIA PARA ACESSAR O OBJETO ROUTE
	namespace App\Routes;
	
	use MF\Init\myBootstrap;
	/*=========================================================*
	OBJETO ROUTE 
	===========================================================*/
	class Route extends myBootstrap {
		
		//METODOS HERADADOS DA CLASSE BOSTRAP
		//CONSTRUTOR DO OBJ JA CHAMANDO O METODO PARA CONFIGURAR 
		//METODO PEGAR A ROTA 
		//METODO SETAR A ROTA
		//METODO PARA EXECUTAR A ACAO DENTRO DO CONTROLLER
		//METODO GETURL

		//METODO DAS ROTAS QUE APLICAÇÃO POSSUIR
		protected function initRoutes() {

			//ARRAY QUE PREPARA A ROTA PARA CONSUMIR O CONTROLLER
			$aRoutes['home'] = array(
				'route'		 => '/',
				'controller' => 'indexController',
				'action'	 => 'index'
				 );

			$aRoutes['sobre_nos'] = array(
				'route'		 => '/sobre_nos',
				'controller' => 'indexController',
				'action'	 => 'sobre_nos'
				 );
			$this->setRoutes($aRoutes);

		}
		
	
	}



































?>