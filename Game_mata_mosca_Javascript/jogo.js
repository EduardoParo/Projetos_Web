
//Variaveis Globais
var nAltura	 = 0
var nLargura = 0
var nVidas 	 = 1
var nTempo   = 15 //Tempo global de jogo
var nCriaMosquitoTempo = 1500

//var cNivel = window.location.href //Traz o conteudo completo do endereço html
var cNivel = window.location.search //Traz somente apos o ? os atributos
cNivel = cNivel.replace('?', '') //Substituir da string o ? para ' '

	console.log(cNivel)

if(cNivel ==='normal'){
	nCriaMosquitoTempo = 1500
	//console.log(cNivel)
	//console.log(nCriaMosquitoTempo)
}else if(cNivel ==='dificil'){
	nCriaMosquitoTempo = 1000
	//console.log(cNivel)
	//console.log(nCriaMosquitoTempo)
}else if(cNivel ==='chucknorris'){
	//console.log(cNivel)
	//console.log(nCriaMosquitoTempo)
	nCriaMosquitoTempo = 750

}

/*-----------------------------------------------*
|Variavel Function para ajustar oCronometro      |
*------------------------------------------------*/
var fCronometro = setInterval(function(){
	nTempo = nTempo -1
	if(nTempo < 0){
		//alert('Vitoria')
		window.location.href = "vitoria.html"
		clearInterval(fCronometro) // aponta para variavel função Cronometro
		clearInterval(fCriaMosca)
		
	}else{
		//Criar um elemento em html demostrando o tempo
		document.getElementById('cronometro').innerHTML = nTempo
	}
}, 1000)

/*--------------------------------------*
|Function para ajustar o tamanho        |
*---------------------------------------*/
function tamPalcoJogo() {
	//Pegar tamanho da browse
	nAltura  = window.innerHeight
	nLargura = window.innerWidth
}
//Chamada da Function
tamPalcoJogo()

/*--------------------------------------*
|Function  Posicao da Mosca             |
*---------------------------------------*/
function posicaoRandomica(){

	//Verificar se ja existe um Mosquito
	if(document.getElementById('mosquito')){
		document.getElementById('mosquito').remove()

		if(nVidas > 3){
			//alert('GAME OVER')
			window.location.href = "fim_de_jogo.html"
		}else{

			//caso seja removido sem o click ele muda para coracao vazio
			document.getElementById('v' + nVidas).src="imagens/coracao_vazio.png"
			nVidas++
		}
	}
	
	var nPosicaoX = Math.floor( Math.random()* nLargura) -  90
	var nPosicaoY = Math.floor( Math.random()*  nAltura) -  90

	//Controle ifternario 
	//posicaoX =(recebe) se posicaoX < 0 recebe 0 se nao recebe posicaoX
	nPosicaoX = nPosicaoX < 0 ? 0 : nPosicaoX
	nPosicaoY = nPosicaoY < 0 ? 0 : nPosicaoY
	
	//console.log(posicaoX,posicaoY)
	
	//Criar um elemento HTML
	var oMosca = document.createElement('img')

	//Acessando os Atributos
	oMosca.src             =  'imagens/mosca.png'
	oMosca.className       =   tamanhoAleatorio() +' '+ladoAleatorio()//chamada da funcao Tamanho aleatorio
	oMosca.style.left      =   nPosicaoX + 'px'
	oMosca.style.top       =   nPosicaoY + 'px'
	oMosca.style.position  =  'absolute'
	oMosca.id              =  'mosquito'
	oMosca.onclick 		   =   function(){ this.remove()} //remover todo o objeto

	document.body.appendChild(oMosca)

	//console.log(tamanhoAleatorio())
	//console.log(ladoAleatorio())
}
/*--------------------------------------*
|Function   Tamanho dos mosquitos       |
*---------------------------------------*/
function tamanhoAleatorio(){
	var nClasse = Math.floor(Math.random() *3) // valores randomicos ate 3

	switch(nClasse){

		case 0:
		return 'mosca1'

		case 1:
		return 'mosca2'
		
		case 2:
		return 'mosca3'

	}
}
/*--------------------------------------*
|Function lado dos mosquitos       |
*---------------------------------------*/
function ladoAleatorio(){
	var nClasse = Math.floor(Math.random() *2) // valores randomicos ate 2

	switch(nClasse){

		case 0:
		return 'ladoA'

		case 1:
		return 'ladoB'

	}

}