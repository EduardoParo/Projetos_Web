<?php
    namespace MF\Controller;
    /*=========================================================
    CLASSE COM O ACTION QUE DEFINE OBJ OVIEW
    ==========================================================*/
    abstract class Action {
        protected $oView; //PROTECTED A CLASSE FILHA CONSEGUE VISUALIZAR E MANIPULAR

        public function __construct(){
            $this->oView = new \stdClass();
        }

        public function render($cView, $cLayout){
            //$this->content();
            $this->oView->cPage = $cView;
            //VERIFICAR SE O LAYOUT EXISTE
            if(file_exists("../App/Views/".$cLayout.".phtml")){
                require_once"../App/Views/".$cLayout.".phtml";
            }else{
                //APENAS CHAMAR O CONTEUDO DA VIES SEM O LAYOUT
                $this->content();
            }
		}

        protected function content(){
            $cClassAtual = get_class($this);
            $cClassAtual = str_replace('App\\Controllers\\', '', $cClassAtual);

            $cClassAtual = strtolower(str_replace('Controller', '', $cClassAtual));

            //echo $cClassAtual;
            require_once "../App/Views/".$cClassAtual."/" .$this->oView->cPage. ".phtml";
        }

    }

?>