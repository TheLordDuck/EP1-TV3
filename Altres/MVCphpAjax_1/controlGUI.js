$(document).ready(init);
//Inicialitzar associacions Events-formulari
//Altres inits 
function init(){
associaEvents();
altres();
}
//Connector Events--Formulari
function associaEvents(){
	$("#actualizarDades").click(llistatClients);
	$("#inserta").click(inserta);
}
//Peticó AJAX (llistat total de clients de la BD)
function llistatClients(){
    $.ajax
	({	url: 'llistatComplert.php',
		dataType: 'json',
		type: 'get',
		cache: false, //IE per a defecte emmagatzema en caché (evitar-ho-->false)
		//Trucada a funció (per no programar-la aquí i respectar el model)
		success: function(data) {presentaDades(data);}
	});
}
function elimina(valor) {
var parametres={
			"id":valor
			};
$.ajax
	({	//url: 'eliminar.php?id='+valor,
		data:parametres,
		url: 'eliminar.php',
		//Trucada a funció (per no programar-la aquí i respectar el model)
		//Decidim que després d'eliminar tornem a presentar les dades
		type: 'post',
		cache:false,
		success: function() {llistatClients();}
	});
}

function inserta() {
//Recuperar Camps HTML per #Id
var noms=$("#noms").val();
var ciutat=$("#ciutat").val();
var telefon=$("#telefon").val();

//Taula de paràmetres per enviar en petició AJAX
var parametres={
			"noms":noms,
			"ciutat":ciutat,
			"telefon":telefon
			};
$.ajax
	({	data: parametres,
		url: 'insertar.php',
		//Trucada a funció (per no programar-la aquí i respectar el model)
		//Decidim que després d'insertar tornem a presentar les dades
		type: 'post', //Mitjançant POST passem els valors dels camps
		cache:false,
		success: function() {llistatClients();} 
	});
}
//Funció de presentació quan es rebin les dades formatades
function presentaDades(data){
	$("#resultats").html("");
	$("#resultats").append(
		$.each(data, function(index){
			var nom = data[index].noms;
			var ciutat = data[index].ciutat;
			var telf = data[index].telefon;
			var idClient=data[index].id;
			$("#resultats").append('<p>Id    : '+idClient+'</p>');
			//Proposta 1. Crear enllaços dinàmics amb href 
			$("#resultats").append('<a href=modificar.php?id='+idClient+'>Editar ');
			//$("#resultats").append('<span>  |  </span> <a Class="referencia" href=eliminar.php?id='+idClient+'>Eliminar');
			//Millor el següent : href="#" i event onClick
			$("#resultats").append('<span>  |  </span> <a href="#" onclick="elimina('+idClient+')">Eliminar');
			//Proposta 2. Crear botó o imatge que invoqui una funció amb paràmetre
			$cadena="<button name='"+ idClient + "' onclick='elimina("+idClient +");'>Eliminar</button>";
			$("#resultats").append($cadena);
			$("#resultats").append('<p><b>Nom    : </b>'+nom+'\t <b>Telefon  : </b>'+telf+'\t <b>Ciutat : </b>'+ciutat+'</p><br>');
		})
	);
}
//Altres inits
function altres(){};

function saluda(dada) {
	alert("Hola"+dada);
}
 
