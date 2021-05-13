 /* Funcao mostrar Modal
 ----------------------------------------------------------------------*/
 function showModal(){

    //Inicialisa o modal
    $('#telaModal').modal('show');
    // Limpa os inputs
    $('input, textarea').val(''); 


 }

/* Funcao mostrar Modal
 ----------------------------------------------------------------------*/
$(document).on("click","#btnAcessar",function(){
  
        showModal()
        
    //Montagem do Botao Registrar
    $('#titulo_modal').html('Acesso Restrito');
    $('#titulo_modal_div').addClass('modal-header text-danger');
    
     //Ação do botão Registrar
     $("#btn_acessar_modal").click(function() {
        $('#MyForm').submit();
    });

})

/* Funcao mostrar Modal
 ----------------------------------------------------------------------*/
$(document).on("click","#btnRegistrar",function(){
  
    showModal()
    let cHtml ='';
    cHtml+=
   cHtml+='<div class="row form-group ">'
   cHtml+='    <label class="control-label col-sm-4">Nivel de acesso:</label>'
   cHtml+='    <div class="col-sm-8">'
   cHtml+='        <div class="input-group input-group-md">'            
   cHtml+='            <input type="number" id="nNivel" name="nNivel" value="1" class="form-control" min=1 max=3 placeholder="1" required>'
   cHtml+='        </div>'
   cHtml+='    </div>'
   cHtml+='</div>    '

    //Montagem do Botao Registrar
    $('#titulo_modal').html('Registrar Usuário');
    $('#titulo_modal_div').addClass('modal-header text-succes');
    
    $("#btn_acessar_modal").html('Registrar')

    $("#MyForm").append(cHtml);
     //Ação do botão Registrar
     $("#btn_acessar_modal").click(function() {
        $('#MyForm').submit();
    });

})


