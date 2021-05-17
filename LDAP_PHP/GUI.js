$(document).ready(init);
function init(){
    associaEvents();
	actualitzaSessio();
}

//connector Events amb formulari (Botó Login/logout)
function associaEvents(){
    $('#envia').click(validaLDAP);
}
//Actualitza vista depenent si usuari actiu/no 
function actualitzaSessio(){
    usu=sessionStorage.getItem("usuSessio");
	boto=$('#envia');
	if (!usu) { //Cas de usuari no actiu
		$("#nomUsuari").text("Cap Usuari");
		boto.text("Login");
	}else { //Cas d'usuari actiu
		$("#nomUsuari").text(sessionStorage.getItem("usuSessio"));
		boto.text("LogOut");
	}
}
//Petició validació en LDAP (Botó Login/logout)
function validaLDAP(){
	usu=sessionStorage.getItem("usuSessio"); 
	if (usu) { //Usuari actiu -->Preparar Logout?
		sessionStorage.clear(); 
		actualitzaSessio();
	} else {	
		valor=$('#email').val();
		$('#email').val("");
		//alert("Valor :"+valor);
		var parametres={
				"email":valor
				};
		$.ajax({
			data:parametres,
			url: 'Sessio_LDAP.php',
			dataType: 'json',
			type: 'post',
			cache: false,
			success: function(dades){presentaDades(dades);}, 
			error: function() {unError();}
		});
		}
}

function unError(){
	alert("Error en AJAX");
}

//funció per presenta les dades a cada petició
function presentaDades(dades){
    //alert(dades[0]);
	sessionStorage.setItem("usuSessio",dades[0]);
	sessionStorage.setItem("usuUID",dades[1]);
	$("#nomUsuari").text(sessionStorage.getItem("usuSessio"));
	boto=$('#envia');
	boto.text("LogOut");
    
}