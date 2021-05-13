<?php    
    $cUrl = substr($_SERVER["REQUEST_URI"],23);
    $cMsg = '';

    if( $cUrl != false ){

        if($cUrl == "erro1"){ 
            $cMsg = "Extensão de arquivo inválido !";


        }else if($cUrl == "erro2"){ 
            $cMsg = "Tamanho de arquivo inválido !";
        

        }elseif($cUrl == "erro3"){ 

            $cMsg = "Acesso negado !";
 
        }

        echo "<script>";
        echo "alert('".$cMsg."')";
        echo "</script>";
    }
    
?>

<!-- Section MODAL
      ----------------------------------------------------------->
        <!-- Modal -->
        <div class="modal fade" id="telaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
                <!--Container-->
                <div class="modal-content">
              
                        <div id="titulo_modal_div" class="modal-header      text-danger">
                            <h5 class="modal-title" id="titulo_modal">Acesso Restrito</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
               
                    <!--Seção Formulario 
                    ----------------------------------------------------------------------------------------->
                    <div id="conteudo_modal" class="modal-body">

                        <!--Formulario
                         ---------------------------------------->
                            <div class="row form-group p-3">
                                <form method="POST" action="app/controller/upload.php" enctype="multipart/form-data" id="MyForm">


                                    <label class="control-label mb-2">Informe uma imagem para autenticação</label> 
                                    <input name="file" type="file"><br><br>
                                    
                                    
                                  
                                </form>
                            </div>
                           
                            <div class="modal-footer">
                                <button type="button" id="btn_acessar_modal" 		class="btn btn-secondary bg-success" 		data-dismiss="modal" >Acessar</button>
                                <button type="button" id="btn_voltar_modal" 		class="btn btn-secondary bg-danger" 		data-dismiss="modal">Voltar</button>
                              
                            </div>       
                    
                    </div>

            </div>
        </div>