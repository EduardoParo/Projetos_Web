<?php
	/*==========================================
	MF -> METODOS DO FRAMEWORK
	============================================*/
	namespace MF\Init;

	/*===================================================*
	OBJETO QUE NAO PODE SER INSTACIADO SOMENTE HERDADO
	=====================================================*/
	abstract class myBootstrap {
		private $aRoutes;
		
		//METODO DA CLASSE FILHA
		abstract protected function initRoutes();

		//CONSTRUTOR DO OBJ JA CHAMANDO O METODO PARA CONFIGURAR 
		public function __construct(){
			$this->initRoutes();
			$this->run($this->getUrl());
		}
		//METODO GETURL
		protected function getUrl() {
			//return parse_url('www.google.com/gmail?x', PHP_URL_PATH);
			//SEPARA O PCTH DA URL SOMENTE DEPOIS DA /
			return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		}
		
		//METODO PEGAR A ROTA 
		public function getRoutes(){
			return $this->aRoutes;
		}

		//METODO SETAR A ROTA
		public function setRoutes(array $aRoutes){
			return $this->aRoutes = $aRoutes;
		}
		//METODO PARA EXECUTAR A ACAO DENTRO DO CONTROLLER
		protected function run($cUrl){
			//echo ' -> '. $cUrl .' <- ';
			foreach ($this->getRoutes() as $cPath => $aRoutes) {
					//echo '<hr>';
					//echo 'Routes <pre>';
					//print_r($aRoutes);
					//echo '</pre>';
					//echo '<hr>';
				//COMPARAR O ROUTE COM A ROUTE ESCRITA
				if($cUrl == $aRoutes['route']){
					//echo $aRoutes['controller'];
					//INSTACIA A CLASSE CONTROLER, PORÉM JA A ROTA
					$cClass = "App\\Controllers\\" . ucfirst($aRoutes['controller']); //UCFIRST DEIXA SEMPRE O PRIMEIRO CARACTER SEJA MAIUSCULO
					//print_r($cClass);
					$oController =  new $cClass;

					//print_r($oController);
					$oAction = $aRoutes['action'];
					$oController->$oAction();

				}
				
			}
		}
	
	}

?>