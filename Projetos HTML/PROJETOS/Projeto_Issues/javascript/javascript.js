

$(document).ready(function () {
    CriarTabela()
   
})

 /* Funcao mostrar Modal
 ----------------------------------------------------------------------*/
$(document).on("click","#btnRegistrar",function(){
  
        $('#telaModal').modal('show')
        document.getElementById('titulo_modal').innerHTML = 'Registrar Issue'
        document.getElementById('titulo_modal_div').className='modal-header text-success'
        //document.getElementById('conteudo_modal').innerHTML = 'Despesa foi cadastrado com sucesso !'
        document.getElementById('btn_voltar_modal').innerHTML='voltar'
        document.getElementById('btn_voltar_modal').className = 'btn btn-secondary bg-success'
        document.getElementById("btn_registrar_modal").onclick = function() {
            gravarRegistro();
        };
})

 /* Classe Objeto Issue
 ----------------------------------------------------------------------*/
class Issue{
    constructor(analista,descricao,numero,rotina){
        this.cAnalista = analista
        this.cDescricao=descricao
        this.cNumero = numero
        this.cRotina = rotina
    }   
}

 /* Classe Objeto Registros
 ----------------------------------------------------------------------*/
class Registros{
    constructor(){
        let nIdInicial = localStorage.getItem('nId') //buscar o item id

        if(nIdInicial === null){
            localStorage.setItem('nId',0)
        }
    }

    //Metodo Proximo ID em Local Storage
    getProximoId(){
        let nProximoId = localStorage.getItem('nId') //buscar o item id
        return parseInt(nProximoId)+1

    }

    //Metodo Gravar os dados na Local Storage
    gravar(d){
        
        //Variavel id recebe o retorno do metodo proximoid que adiciona +1 no item ja existente         
        let nId = this.getProximoId()

        //Grava no indice id o objeto despena em formato JASON no Local Storage 
        localStorage.setItem(nId,JSON.stringify(d))// converte objeto em Jason
        
        //Grava o o retorno do metodo proximoid 
        localStorage.setItem('nId',nId)
    }

    //Metodo pegar todos registros
    todosRegistros(){
       let aRegistros = Array()


       //Pegar o niD ja cadastrado
       let nId = localStorage.getItem('nId')
    
       for(let nI = 1; nI <= nId; nI++){
            let aIssue = Array()
           // Pega o Jason registrado e converte em um objeto JS
            aIssue = JSON.parse(localStorage.getItem(nI))

            if(aIssue ===null){
                continue //ele pula oregistro
            }

           aIssue.nId = nI
           //Adicionar a despesa no array Despesas
           aRegistros.push(aIssue)
       }
       return aRegistros
    }
    //Metodo Remover
    remover(nId){
            localStorage.removeItem(nId)

    }

}

/*================================================================
Variaveis Globais
==================================================================*/
let oRegistros = new Registros()

/*=================================================================
Gravar Despesas
==================================================================*/
function gravarRegistro(oEdit=null){
    if(oEdit !=null){
        oRegistros.remover(oEdit)  
    }
    let oAnalista = document.getElementById('analista')
    let oDescricao = document.getElementById('descricao')
    let oNumero = document.getElementById('numero')
    let oRotina = document.getElementById('rotina')

    let oIssue = new Issue(
        oAnalista.value,
        oDescricao.value,
        oNumero.value,
        oRotina.value
        )

        //Realizar a gravação dos dados
        oRegistros.gravar(oIssue)
        window.location.reload()
}
/*=================================================================
Mostrar Tabela de Dados
==================================================================*/
function CriarTabela() {
    let aLista = Array()
    
    aLista =  oRegistros.todosRegistros()

    let aColunas = [{ "sTitle": "Analista"  , "data": "cAnalista"     , "bSortable": true                     },
                    { "sTitle": "Descrição" , "data": "cDescricao"    , "bSortable": true                     },
                    { "sTitle": "Número"    , "data": "cNumero"       , "bSortable": true                     },
                    { "sTitle": "Rotina"    , "data": "cRotina"       , "bSortable": true , "sWidth": "15%"   },
                    { "sTitle": "Ações"     , "data": null            , render: function (data, type, row){

                        let botoes = '<div>'
                        botoes += '<button type="button" class="btn btn-primary btn-xs" onClick="Editar('+ row.nId +')">'
                        botoes += '<span class="icon fa fa-edit"></span></button>'
                        botoes += '<button type="button" class="btn btn-danger  btn-xs" onclick="Deletar('+ row.nId +')" >'
                        botoes += '<span class="icon fas fa-times"> </span></button>'
                        botoes += '</div>'
                        
                        return botoes

                    }, "sWidth": "10%"}];


    $('#tabelaDados').DataTable({
        "data":  aLista,
        "aoColumns": aColunas,
        "responsive": true,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "sDom": "tIipr",
        "bPaginate": true,


    });
}
/*=================================================================
Pesquisar Registros
==================================================================*/
$(document).on("keyup","#pesquisar",function(){

    var tb = $('#tabelaDados').DataTable();
    tb.search(this.value).draw();
    tb.draw();

})
/*=================================================================
Funçao Deletar
==================================================================*/
function Deletar(nId){
        //console.log(nId)
        //JQUERY
        $('#telaModal').modal('show')
        document.getElementById('titulo_modal').innerHTML = 'Excluir'
        document.getElementById('titulo_modal_div').className='modal-header text-danger'
        
        document.getElementById('conteudo_modal').innerHTML = 'Tem certeza que deseja excluir o item : ' +nId
        
        document.getElementById('btn_voltar_modal').innerHTML='Não'
        document.getElementById('btn_voltar_modal').className = 'btn btn-secondary bg-danger'
        document.getElementById('btn_voltar_modal').onclick=function(){                                                      
        window.location.reload()
        }
            
        document.getElementById('btn_registrar_modal').innerHTML='Sim'
        document.getElementById('btn_registrar_modal').className = 'btn btn-secondary bg-success'
        document.getElementById('btn_registrar_modal').onclick=function(){
        oRegistros.remover(nId)                                                        
        window.location.reload()
        }
 }
 function Editar(nId) {
    let oAnalista = document.getElementById('analista')
    let oDescricao = document.getElementById('descricao')
    let oNumero = document.getElementById('numero')
    let oRotina = document.getElementById('rotina')

    //Pega o Jason registrado e converte em um objeto JS
    oIssue = JSON.parse(localStorage.getItem(nId))
    
    $('#telaModal').modal('show')
    document.getElementById('titulo_modal').innerHTML = 'Alterar Issue'

    oAnalista.value  = oIssue.cAnalista
    oDescricao.value = oIssue.cDescricao
    oNumero.value    = oIssue.cNumero
    oRotina.value    = oIssue.cRotina

    document.getElementById("btn_registrar_modal").innerHTML ='Alterar'

    document.getElementById("btn_registrar_modal").onclick = function() {
            gravarRegistro(nId);
        };
    

 }