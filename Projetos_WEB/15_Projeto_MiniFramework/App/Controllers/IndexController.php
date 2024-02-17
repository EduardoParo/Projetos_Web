<?php
	//DEFINIR NAMESPACE PARA PODER UTILIZAR O ARQ COMO OBJETO
	namespace App\Controllers;

	// CHAMAR A CLASSE COM CONTRUTOR DO CONTRTOLER OVIEW
	use MF\Controller\Action;
	//use App\Connection\Connection;
	use MF\Model\Container;
	use App\Models\Produto;
	use App\ModelS\Info;
/*============================================================*
OBJETO PARA ESTABELAR AS ACTIONS DAS ROTAS
==============================================================*/
	class IndexController extends Action {

		public function index(){
			//$this->oView->aDados = array('sofá','Cadeira' );
			//INSTACIAR CONEXÃO
			//$oConn = Connection::getDb();
			////INSTACIAR MODELO
			//$oProduto = new Produto($oConn);

			$oProduto = Container::getModel('Produto');
			$aProdutos = $oProduto->getProdutos();

			$this->oView->aDados = $aProdutos;


			$this->render('index','layout1');
		}

		//METODO INDEX
		public function sobre_nos(){
			//echo 'chegamos ao index';
			//require_once "../App/Views/index/sobreNos.phtml";
			//$this->oView->aDados = array('TESTE','Cadeira' );

			//INSTACIAR CONEXÃO
			//$oConn = Connection::getDb();
			////INSTACIAR MODELO
			//$oInfo = new Info($oConn);
			$oInfo = Container::getModel('Info');
			$aInformacoes = $oInfo->getInfo();

			$this->oView->aDados = $aInformacoes;

			$this->render('sobreNos','layout2');
		}
		//MELHORANDO O METODO INDEX
		
	}
	
	




?>