
document.getElementById('nacE').onclick = function(){
	document.getElementById("cpf").disabled = true;
	document.getElementById("cpf").value = "";
	document.getElementById("passp").disabled = false;
	document.getElementById("nacio").disabled = false;
	document.getElementById("mensagem-doc").innerHTML = "Please, Write your Passaport and Select your place of birth.";
};

document.getElementById('nacN').onclick = function(){
	document.getElementById("cpf").disabled = false;
	document.getElementById("passp").value = "";
	document.getElementById("passp").disabled = true;
	document.getElementById("nacio").disabled = true;
	document.getElementById("mensagem-doc").innerHTML = "Por favor, Digite o seu CPF.";
};

function fMasc(objeto,mascara) {
	obj=objeto
	masc=mascara
	setTimeout("fMascEx()",1)
}
function fMascEx() {
	obj.value=masc(obj.value)
}
function mCPF(cpf){
	cpf=cpf.replace(/\D/g,"")
	cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
	cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
	cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
	return cpf
}

document.getElementById("form-cadastro").onsubmit = validaCadastro;

function validaCadastro(){
	var contErro = 0;

	// valida o primeiro nome
	var fnome = document.getElementById("fname");
	var ferro_nome = document.getElementById("msg-fname");
	if(fnome.value == ""){
		ferro_nome.innerHTML = "Please, enter your first name.";
		ferro_nome.style.display = 'block';
		contErro+=1;
	}
	else{
		ferro_nome.style.display = "none";
	}

	// valida o ultimo nome
	var lnome = document.getElementById("lname");
	var lerro_nome = document.getElementById("msg-lname");
	if(lnome.value == ""){
		lerro_nome.innerHTML = "Please, enter your last name.";
		lerro_nome.style.display = 'block';
		contErro+=1;
	}
	else{
		lerro_nome.style.display = "none";
	}

	//valida data de nascimento
	var date = document.getElementById("nasc");
	var erro_date = document.getElementById("msg-date");
	if(date.value == ""){
		erro_date.innerHTML = "Please, enter your date of birth.";
		erro_date.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_date.style.display = "none";
	}


	// validação do campo nacionalidade
	var nacE = document.getElementById("nacE");
	var nacN = document.getElementById("nacN");
	var erro_nation = document.getElementById("msg-nation");
	if(!nacE.checked & !nacN.checked){
		erro_nation.innerHTML = "Please, select your nationality.";
		erro_nation.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_nation.style.display = 'none';
	}	

	//valida documento
	var ncpf = document.getElementById("cpf");
	var npassp = document.getElementById("passp");
	var erro_doc = document.getElementById("msg-doc");
	if((ncpf.value == "" ) && (npassp.value="")){
		erro_doc.innerHTML = "Please, enter your document number.";
		erro_doc.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_doc.style.display = "none";
	}

	//valida cep/zip
	var cep = document.getElementById("cep");
	var erro_cep = document.getElementById("msg-cep");
	if(cep.value == ""){
		erro_cep.innerHTML = "Please, enter a ZIP Code.";
		erro_cep.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_cep.style.display = "none";
	}

	// valida cidade
	var cidade = document.getElementById("cidade");
	var erro_cidade = document.getElementById("msg-cidade");
	if(cidade.value == ""){
		erro_cidade.innerHTML = "Please, enter a city.";
		erro_cidade.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_cidade.style.display = 'none';
	}

	// valida endereco
	var rua = document.getElementById("rua");
	var erro_rua = document.getElementById("msg-rua");
	if(rua.value == ""){
		erro_rua.innerHTML = "Please, enter your adress.";
		erro_rua.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_rua.style.display = "none";
	}

	// valida telefone
	var phone = document.getElementById("phone");
	var erro_phone = document.getElementById("msg-phone");
	if(phone.value == ""){
		erro_phone.innerHTML = "Please, enter your phone.";
		erro_phone.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_phone.style.display = "none";
	}

	// valida telefone de emergencia
	var ephone = document.getElementById("ephone");
	var erro_ephone = document.getElementById("msg-ephone");
	if(ephone.value == ""){
		erro_ephone.innerHTML = "Please, enter a emergency phone.";
		erro_ephone.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_ephone.style.display = "none";
	}

	// valida email
	var email = document.getElementById("email");
	var erro_email = document.getElementById("msg-email");
	if((email.value == "") || (email.value.indexOf("@") == -1)){
		erro_email.innerHTML = "Please, enter a E-mail";
		erro_email.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_email.style.display = 'none';
	}

	//confirma email
	var cemail = document.getElementById("cemail");
	var erro_cemail = document.getElementById("msg-cemail");
	if((cemail.value == "") || (cemail.value.indexOf("@") == -1) || (cemail.value != email.value)){
		erro_cemail.innerHTML = "Emails do not match.";
		erro_cemail.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_cemail.style.display = 'none';
	}

	//valida senha
	var senha = document.getElementById("senha");
	var erro_senha = document.getElementById("msg-senha");
	if(senha.value == ""){
		erro_senha.innerHTML = "Please, Enter a password.";
		erro_senha.style.display = 'block';
		contErro+=1;
	}
	else if (senha.value.length < 8){
		erro_senha.innerHTML = "Enter a combination of at least 6 letters and numbers, and/or special characters.";
		erro_senha.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_senha.style.display = 'none';
	}

	// confirma senha
	var csenha = document.getElementById("csenha");
	var erro_csenha = document.getElementById("msg-csenha");
	if((csenha.value == "") || (senha.value != csenha.value)){
		erro_csenha.innerHTML = "Passwords do not match.";
		erro_csenha.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_csenha.style.display = 'none';
	}	

	// valida termos
	var terms = document.getElementById("terms");
	var erro_terms = document.getElementById("msg-terms");
	if(!terms.checked){
		erro_terms.innerHTML = "You must agree to the Terms and Conditions to continue.";
		erro_terms.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_terms.style.display = 'none';
	}		

	if(contErro > 0)
		return false;
	else
		alert("Registration completed successfully!");
};