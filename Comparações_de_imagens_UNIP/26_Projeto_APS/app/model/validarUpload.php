<?php

namespace validacoes;
require_once "conexao.php";

class validarUpload{

    private $cPasta = '../foto/';
    private $nTamanho = 1024*1024*100;
    private $aExtensao =  array('png', 'jpg', 'jpeg', 'gif');
    public $aErros = array(
                "0"=>'Não houve erro',
                "1"=>'O arquivo no upload é maior que o limite do PHP',
                "2"=>'O arquivo ultrapassa o limite de tamanho especificado no HTML',
                "3"=>'O upload do arquivo foi feito parcialmente',
                "4"=>'Não foi feito o upload do arquivo'
                );
    /*---------------------------------------------
    Validar Extensoes
    -----------------------------------------------*/
    function validarExtensao($cNomeArqui){
        
        $cExt = explode('.',$cNomeArqui);
        $cExt= end($cExt);

        if(array_search($cExt, $this->aExtensao) === false){		
        
            return false;
        }else{
            return true;
        }
        
    }

    /*---------------------------------------------
    Validar Tamanho do Arquivo
    -----------------------------------------------*/
    function validarTamanho($nTamnho){
        
        if ($this->nTamanho < $nTamnho){
           
            return false;
        }else{
            return true;
        }
        
    }

    /*---------------------------------------------
    Mover o arquivo para o Servidor
    -----------------------------------------------*/
    function moveUpload($cTemp, $cNome){
        //Remover caracteres especiais
        $cNome = urlencode($cNome);

        //Verificar se é possivel mover o arquivo para a pasta escolhida
	    if(move_uploaded_file($cTemp, '../foto/temp/' .  $cNome)){
            //$this->regNome($cNome);
            //Após realizar o Upload do Arq realizar a comparação
            if($this->compArq('../foto/temp/'. $cNome)){
                
                return true;
            }
	    }else{
	    	return false;
        }
    }
      /*---------------------------------------------
    Mover o arquivo para o Servidor
    -----------------------------------------------*/
    function compArq($cArq){
        //Realiza a leitura interna do arquivo
        $cArquivo1 = file_get_contents($cArq);

        $aArquivos = $this->getAll();

        $nX=0;
        while($nX <= sizeof($aArquivos) -1){
            $cArqInterno =  $this->cPasta . $aArquivos[$nX]['nome_imagem'];
            $cArqInterno = file_get_contents( $cArqInterno );
            if($cArquivo1 ==   $cArqInterno){
                return true;
            }
            $nX++;
        }
        return false;
      
    }
    /*---------------------------------------------
    Salvar nome do arquivo no banco de dados
    -----------------------------------------------*/
    function regNome($cTemp, $cNome){

        move_uploaded_file($cTemp, $this->cPasta .  $cNome);
        
        $oCon = new \conexao\connection();
        $cQuery = "INSERT INTO "            ;
        $cQuery .= "             pessoa "   ;
        $cQuery .= " (nome_imagem) "         ;
        $cQuery .=" VALUES "                ;
        $cQuery .=" ('$cNome') "         ;

        $oDb = $oCon->getDb();
        $oQuery = $oDb->prepare($cQuery);
        $oQuery->execute();

        return $oQuery->fetchAll(\PDO::FETCH_ASSOC);
	  
    }

    /*---------------------------------------------
    Buscar nome dos arquivos cadastrados no banco de dados
    -----------------------------------------------*/
    function getAll(){
        
        $oCon = new \conexao\connection();

        $cQuery = "SELECT * FROM "            ;
        $cQuery .= "             pessoa "   ;

        $oDb = $oCon->getDb();
        $oQuery = $oDb->prepare($cQuery);
        $oQuery->execute();

        return $oQuery->fetchAll(\PDO::FETCH_ASSOC);
	  
    }
        
    



}





?>