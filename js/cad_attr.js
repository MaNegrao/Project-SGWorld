
document.getElementById('form-Attr').onsubmit = ValidaCadAttr;

function ValidaCadAttr(){
	var contErro = 0;

	// valida o primeiro nome
	var nameat = document.getElementById("nameat");
	var erro_nameat = document.getElementById("msg-nameat");
	if(nameat.value == ""){
		erro_nameat.innerHTML = "Please, enter your first name.";
		erro_nameat.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_nameat.style.display = "none";
	}

	var tp = document.getElementById("tp");
	var erro_tp = document.getElementById("msg-tp");
	if(tp.value == ""){
		erro_tp.innerHTML = "Please, enter your first name.";
		erro_tp.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_tp.style.display = "none";
	}

	var capac = document.getElementById("capac");
	var erro_capac = document.getElementById("msg-capac");
	if(capac.value == ""){
		erro_capac.innerHTML = "Please, enter your first name.";
		erro_capac.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_capac.style.display = "none";
	}

	var desc = document.getElementById("desc");
	var erro_desc = document.getElementById("msg-desc");
	if(desc.value == ""){
		erro_desc.innerHTML = "Please, enter your first name.";
		erro_desc.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_desc.style.display = "none";
	}

	var terms = document.getElementById("terms");
	var erro_terms = document.getElementById("msg-terms");
	if(!terms.checked){
		erro_terms.innerHTML = "You must agree to the Terms and Conditions to continue.";
		erro_terms.style.display = 'block';
		contErro+=1;
		return false;
	}
	else{
		erro_terms.style.display = 'none';
	}	

	if(contErro > 0){
		return false;
	}
	else{
		alert("Your event project will send successfully!");
	}
};