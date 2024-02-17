<?php
	
	namespace MyApp\controllers;

	class Home {
		protected $container;
		protected $view;

		//METODO CONSTRUTOR
		public function __construct($view){
			$this->view = $view;		
		}

		public function index($cReq, $cResp){

			//$r = $this->container->get('request');
			//var_dump($this->container);

		//	$view = $this->container->get('View');
			var_dump($this->view);

			return $cResp->write('Teste index');
		}
	}

?>