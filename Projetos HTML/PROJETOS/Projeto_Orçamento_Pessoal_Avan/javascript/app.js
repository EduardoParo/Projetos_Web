//alert("incluido ")
/*===================================================================
Class Despesa Objeto
=====================================================================*/
class Despesa{
	constructor(ano, mes, dia, tipo, descricao, valor){
		this.cAno = ano
		this.cMes = mes
		this.cDia = dia
		this.cTipo = tipo
		this.cDescricao = descricao
		this.cValor = valor
	}
	//Metodo Validar Dados retorno T ou F verificar se os campos estao corretos
	validarDados(){
		//Variavel i Percorrer os indices da variavel this objeto LITERAL
		for(let i in this){
			//console.log(i, this[i])
			if(this[i] == undefined || this[i] == '' || this[i] == null){
			
				return false
			}
			return true
		}

	}
}
/*===================================================================
Class Gravar dados na Local Storage
=====================================================================*/
class Bd{
	//Construtor
	constructor(){
		let nIdInicial = localStorage.getItem('nId') //buscar o item id
		//console.log(id)

		if(nIdInicial === null){
			localStorage.setItem('nId',0)
		}

	}
	/*Metodo Gravar os dados na Local Storage
	----------------------------------------------------------------------*/
	getProximoId(){
		let nProximoId = localStorage.getItem('nId') //buscar o item id
		//console.log(id)
		//console.log(parseInt(proximoId)+1)
		return parseInt(nProximoId)+1

	}

	/*Metodo Gravar os dados na Local Storage
	---------------------------------------------------------------------*/
 	gravar(d){
		
		//Variavel id recebe o retorno do metodo proximoid que adiciona +1 no item ja existente 		
		let nId = this.getProximoId()

		//Grava no indice id o objeto despena em formato JASON no Local Storage	
		localStorage.setItem(nId,JSON.stringify(d))// converte objeto em Jason
		
		//Grava o o retorno do metodo proximoid 
		localStorage.setItem('nId',nId)
	}

	/*Metodo Para acessar todos os Registros do Local Storage e retornar em uma variavel
	---------------------------------------------------------------------*/
	todosRegistros(){
		let aDespesas = Array()
		let nId = localStorage.getItem('nId')

		//Acessar todas as desespesas cadasrradas en LocakStorage
		for( let nI =1; nI<= nId; nI++){

			let aDespesa = JSON.parse(localStorage.getItem(nI))
			//console.log(aDespesa)
			//Verificar se o item foi removido
			if(aDespesa ===null){
				continue //ele pula oregistro
			}

			aDespesa.nId = nI
			//Adicionar a despesa no array Despesas
			aDespesas.push(aDespesa)

		}
		return aDespesas

	}
	/*Metodo Pesquisar
	---------------------------------------------------------------*/
	pesquisar(oDespesa){	
		//console.log(oDespesa)
		let aDespesasFiltradas = Array()


		aDespesasFiltradas = this.todosRegistros()
		//console.log(  aDespesasFiltradas)
		
		

		//Filtro Ano
		if(oDespesa.cAno != ''){
			//console.log(aDespesasFiltradas.filter(d => d.cAno == oDespesa.cAno))
			aDespesasFiltradas = aDespesasFiltradas.filter(d => d.cAno == oDespesa.cAno)
		}
		//Filtro Mes
		if(oDespesa.cMes != ''){
			
			console.log(aDespesasFiltradas.filter(d => d.cMes == oDespesa.cMes))
			aDespesasFiltradas = aDespesasFiltradas.filter(d => d.cMes == oDespesa.cMes)
		}
		//Filtro Dia
		if(oDespesa.cDia != ''){
			//console.log(aDespesasFiltradas.filter(d => d.cDia == oDespesa.cDia))
			aDespesasFiltradas = aDespesasFiltradas.filter(d => d.cDia == oDespesa.cDia)
		}
		//Filtro Tipo
		if(oDespesa.cTipo != ''){
			//console.log(aDespesasFiltradas.filter(d => d.cDia == oDespesa.cDia))
			aDespesasFiltradas = aDespesasFiltradas.filter(d => d.cTipo == oDespesa.cTipo)
		}
		//Filtro Descricao
		if(oDespesa.cDia != ''){
			//console.log(aDespesasFiltradas.filter(d => d.cDia == oDespesa.cDia))
			aDespesasFiltradas = aDespesasFiltradas.filter(d => d.cDescricao == oDespesa.cDescricao)
		}
		//Filtro Valor
		if(oDespesa.cValor != ''){
			//console.log(aDespesasFiltradas.filter(d => d.cDia == oDespesa.cDia))
			aDespesasFiltradas = aDespesasFiltradas.filter(d => d.cValor == oDespesa.cValor)
		}
		return aDespesasFiltradas
	}

	/*Metodo Remover Registro
	---------------------------------------------------------------*/
	remover(nId){
		localStorage.removeItem(nId)

	}

}

/*================================================================
Variaveis Globais
==================================================================*/
let oBd = new Bd()

/*=================================================================
Cadastrar Despesas
==================================================================*/
function cadastrarDespesa(){
	let oAno = document.getElementById('ano')
	let oMes = document.getElementById('mes')
	let oDia = document.getElementById('dia')
	let oTipo = document.getElementById('tipo')
	let oDescricao = document.getElementById('descricao')
	let oValor = document.getElementById('valor')

	//console.log(ano.value)
	//console.log(mes.value, dia.value, tipo.value, descricao.value, valor.value)

	let oDespesa = new Despesa(
		oAno.value,
		oMes.value,
		oDia.value,
		oTipo.value,
		oDescricao.value,
		oValor.value,
		)
	//console.log(despesa)
	//objeto bd q esta publico metodo gravar
	if(oDespesa.validarDados()){
		//Realizar a gravação dos dados
		//oBd.gravar(oDespesa)

		//JQUERY
		$('#modalRegistra').modal('show')
		document.getElementById('titulo_modal').innerHTML = 'Sucesso'
		document.getElementById('titulo_modal_div').className='modal-header text-success'
		document.getElementById('conteudo_modal').innerHTML = 'Despesa foi cadastrado com sucesso !'
		document.getElementById('btn_voltar_modal').innerHTML='voltar'
		document.getElementById('btn_voltar_modal').className = 'btn btn-secondary bg-success'

		//Limpar conteudo depois da gravação
		//console.log(oAno.value)
		oAno.value = ""
		oMes.value = ""
		oDia.value = ""
		oTipo.value = ""
		oDescricao.value = ""
		oValor.value = ""

	}else{
		//JQUERY
		$('#modalRegistra').modal('show')
		document.getElementById('titulo_modal').innerHTML = 'Falha'
		document.getElementById('titulo_modal_div').className='modal-header text-danger'
		document.getElementById('conteudo_modal').innerHTML = 'Verifique se os campos foram preenchidos corretamente '
		document.getElementById('btn_voltar_modal').innerHTML='Corrigir'
		document.getElementById('btn_voltar_modal').className = 'btn btn-secondary bg-danger'
	}

}
/*==============================================================================
Tela consulta
================================================================================*/
/*==============================================================================
Funcao para Mostrar e carregar a lista
================================================================================*/
function mostrarLista(aDespesas = Array(), filtro = false){

	if(aDespesas.length ==0 && filtro == false){

		//Armazenar no array aDespesas todos os registros do Storage
		aDespesas = oBd.todosRegistros()
	}
	//console.log(aDespesas)
	//Selecionando o elemento tBody da tabela
	let oListaDespesas = document.getElementById('listaDespesas') 
	//Limpar o conteudo da Lista quando e chamado via pesquisa
	oListaDespesas.innerHTML =''
	//Percorrer o array, do metodo despesa
	//Objetos do tipo array possui o METODO PADRAO ForEach que permite percorrer todos os itens atraves do PARAMETRO d padrao
	aDespesas.forEach(function(d){
		//console.log(d)
		//Inserir Linhas <tr> no HTML
		let oLinha = oListaDespesas.insertRow()
		//console.log(oListaDespesas)
		//Inserir colunas no HTML <td>
		oLinha.insertCell(0).innerHTML = `${d.cDia} / ${d.cMes} / ${d.cAno}`

		//ajustar o tipo
		switch(d.cTipo){
			case '1': d.cTipo = 'Alimentação'
			break
			case '2': d.cTipo = 'Eduacação'
			break
			case '3': d.cTipo = 'Laser'
			break
			case '4': d.cTipo = 'Saude'
			break
			case '5': d.cTipo = 'Transporte'
			break
		}
		//console.log(d.cTipo)
		oLinha.insertCell(1).innerHTML = d.cTipo
		oLinha.insertCell(2).innerHTML = `${d.cDescricao}`
		oLinha.insertCell(3).innerHTML = `${d.cValor}`

		//Criar a Coluna de Exclusao
		let oBtn = document.createElement("button")
		oBtn.className = 'btn btn-danger'
		oBtn.innerHTML = '<i class="fas fa-times"</i>'
		oBtn.id = `id_despesa_${d.nId}`
		oBtn.onclick = function(){
			//alert('teste pegar id : '+ d.nId)
			//pegar o id do objeto btn e retirar o texto para deixar somente o numero do id
			let nId = oBtn.id.replace('id_despesa_','')
			oBd.remover(nId)
			window.location.reload()
		}
		oLinha.insertCell(4).append(oBtn)

	})	

}
/*==============================================================================
Funcao PESQUISAR
================================================================================*/
function pesquisarDespesa(){
	let cAno       = document.getElementById('ano').value
	let cMes 	   = document.getElementById('mes').value
	let cDia 	   = document.getElementById('dia').value
	let cTipo 	   = document.getElementById('tipo').value
	let cDescricao = document.getElementById('descricao').value
	let cValor     = document.getElementById('valor').value

	let oDespesa = new Despesa(cAno, cMes, cDia, cTipo, cDescricao, cValor)

	aListaDespesas = oBd.pesquisar(oDespesa)

	this.mostrarLista(aListaDespesas, true)

}
