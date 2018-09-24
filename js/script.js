function exibeMenu(){
    var menu = document.getElementsByClassName('menu-principal')[0];
    if(menu.style.display == 'block'){
            menu.style.display = 'none';
    }
    else{
        menu.style.display = 'block';
    }
};

document.body.onresize = function(){
    var w = window.outerWidth;
    var menu = document.getElementsByClassName("menu-principal")[0];
    if (w >= 1000){
        menu.style.display = 'block';
    } else{
        menu.style.display = 'none';        
    }
};

function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
};

document.getElementById("defaultOpen").click();