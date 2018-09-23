
document.getElementById('nacE').onclick = function(){
	document.getElementById("cpf").disabled = true;
	document.getElementById("cpf").value = "";
	document.getElementById("passp").disabled = false;
	document.getElementById("nacio").disabled = false;
	document.getElementById("mensagem-doc").innerHTML = "Please, Write your Passaport.";
};

document.getElementById('nacN').onclick = function(){
	document.getElementById("cpf").disabled = false;
	document.getElementById("passp").value = "";
	document.getElementById("passp").disabled = true;
	document.getElementById("nacio").disabled = true;
	document.getElementById("mensagem-doc").innerHTML = "Por favor, Digite o seu CPF.";
};

document.getElementById("form-cadastro").onsubmit = validaCadastro;