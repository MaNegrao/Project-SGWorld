
document.getElementById('pEvent').onsubmit = ValidaProjeto;

function ValidaProjeto(){
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

	var emp = document.getElementById("emp");
	var erro_emp = document.getElementById("msg-emp");
	if(emp.value == ""){
		erro_emp.innerHTML = "Please, enter a Company.";
		erro_emp.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_ephone.style.display = "none";
	}

	// valida email
	var email = document.getElementById("email");
	var erro_email = document.getElementById("msg-email");
	if((email.value == "") || (email.value.indexOf("@") == -1)){
		erro_email.innerHTML = "Please, enter a E-mail.";
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

	var desc = document.getElementById("desc");
	var erro_desc = document.getElementById("msg-desc");
	if((desc.value == "")){
		erro_desc.innerHTML = "Please, enter a Description.";
		erro_desc.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_desc.style.display = 'none';
	}

	var nomee = document.getElementById("nomee");
	var erro_nomee = document.getElementById("msg-nomee");
	if((nomee.value == "")){
		erro_nomee.innerHTML = "Please, enter a Event Name.";
		erro_nomee.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_nomee.style.display = 'none';
	}

	var typee = document.getElementById("typee");
	var erro_typee = document.getElementById("msg-typee");
	if((typee.value == "")){
		erro_typee.innerHTML = "Please, enter a Event Type.";
		erro_typee.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_typee.style.display = 'none';
	}

	var qtdp = document.getElementById("qtdp");
	var erro_qtdp = document.getElementById("msg-qtdp");
	if((qtdp.value == "")){
		erro_qtdp.innerHTML = "Please, enter a Amount of Visitors.";
		erro_qtdp.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_qtdp.style.display = 'none';
	}

	/*var img = document.getElementById('imag').files;
	var erro_img = document.getElementById('msgimag');
	if(img.value == ""){
		erro_imag.innerHTML = "Please, send a Image.";
		erro_imag.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_imag.style.display = 'none';
	}*/

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
		alert("Your event project will send successfully!");
};