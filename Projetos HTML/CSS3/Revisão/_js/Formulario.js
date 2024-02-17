function validacao(){
	var nome= document.getElementById("nome");
	var sobrenome= document.getElementById("sobrenome");
	var email= document.getElementById("email");
	var senha= document.getElementById("senha");
	var csenha= document.getElementById("csenha");
	

	if(nome.value==""){
		alert('hahahahaha');		
		document.form.nome.focus();
		return false;
	}
	if(sobrenome.value==""){
		alert('hahahahaha');
	
		document.form.sobrenome.focus();
		return false;
	}
	

}