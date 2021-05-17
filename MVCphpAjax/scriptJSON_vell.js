$(document).ready(function(){
    $("#actualizarDades").click(function(){ 
        //metode ajax
        $.ajax({
            url: 'scriptDades.php',
            dataType: 'json',
            success: function(data){
                $("#resultats").html("");
				$("#resultats").append(
                $.each(data, function(index){
                    var nom = data[index].nombres;
                    var ciutat = data[index].ciudad;
                    $("#resultats").append('<p>Nom '+nom+'</p>');
					$("#resultats").append('<p>ciutat '+ciutat+'</p><br>');
										
                }));
			}
		});
	});
})	

 
