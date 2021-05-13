
<?php
require_once "..\\model\\validarUpload.php";

$oVld = new validacoes\validarUpload();

$oArquivo 	= $_FILES['file'];

//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
if($oArquivo['error'] != 0){
	die("Não foi possivel fazer o upload, erro: <br />". $oVld->aErros[$oArquivo['error']]);
	header('Location:/26_Projeto_APS/');


}

if (!$oVld->validarExtensao($oArquivo['name'])){
	header('Location:/26_Projeto_APS/?login=erro1');



}
if(!$oVld->validarTamanho($oArquivo['size'])){
	header('Location:/26_Projeto_APS/?login=erro2');

}
if(sizeof($_POST) >= 1){
	$oVld->regNome($oArquivo['tmp_name'],$oArquivo['name']);
	header('Location:/26_Projeto_APS/');
	exit;
}

if(!$oVld->moveUpload($oArquivo['tmp_name'], $oArquivo['name'])){

	header('Location:/26_Projeto_APS/?login=erro3');

}else{
	// Iniciar Sessão 
	session_start();
            
	//Atribui Valores a Sessão
	$_SESSION['nId']   = 1;
	echo print_r($_SESSION);
	
	header('Location:/26_Projeto_APS/?login=sucesso');

}		





?>