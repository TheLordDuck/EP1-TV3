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
//Petic� AJAX (llistat total de clients de la BD)
function llistatClients(){
    $.ajax
	({	url: 'llistatComplert.php',
		dataType: 'json',
		type: 'get',
		cache: false, //IE per a defecte emmagatzema en cach� (evitar-ho-->false)
		//Trucada a funci� (per no programar-la aqu� i respectar el model)
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
		//Trucada a funci� (per no programar-la aqu� i respectar el model)
		//Decidim que despr�s d'eliminar tornem a presentar les dades
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

//Taula de par�metres per enviar en petici� AJAX
var parametres={
			"noms":noms,
			"ciutat":ciutat,
			"telefon":telefon
			};
$.ajax
	({	data: parametres,
		url: 'insertar.php',
		//Trucada a funci� (per no programar-la aqu� i respectar el model)
		//Decidim que despr�s d'insertar tornem a presentar les dades
		type: 'post', //Mitjan�ant POST passem els valors dels camps
		cache:false,
		success: function() {llistatClients();} 
	});
}
//Funci� de presentaci� quan es rebin les dades formatades
function presentaDades(data){
	$("#resultats").html("");
	$("#resultats").append(
		$.each(data, function(index){
			var nom = data[index].noms;
			var ciutat = data[index].ciutat;
			var telf = data[index].telefon;
			var idClient=data[index].id;
			$("#resultats").append('<p>Id    : '+idClient+'</p>');
			//Proposta 1. Crear enlla�os din�mics amb href 
			$("#resultats").append('<a href=modificar.php?id='+idClient+'>Editar ');
			//$("#resultats").append('<span>  |  </span> <a Class="referencia" href=eliminar.php?id='+idClient+'>Eliminar');
			//Millor el seg�ent : href="#" i event onClick
			$("#resultats").append('<span>  |  </span> <a href="#" onclick="elimina('+idClient+')">Eliminar');
			//Proposta 2. Crear bot� o imatge que invoqui una funci� amb par�metre
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
 
