(function(){
    window.addEventListener("load", () => { //Com sempre, quan es carregui completament el DOM
        const uploader = document.getElementById('uploader'); //Zona de càrrega en HTML
		//Capturar els 3 events que intervenen en DragDrop
        uploader.addEventListener("dragover", e => {
            e.preventDefault();
            uploader.classList.add("over"); //Caldrà adaptar al vostre CSS
        });
        uploader.addEventListener("dragleave", e => {
            e.preventDefault();
            uploader.classList.remove("over"); //Caldrà adaptar al vostre CSS
        });

        //Event més important, quan es deixen caure els arxius, es dispara el Drop
		uploader.addEventListener("drop", function (e) {
            e.preventDefault();
            uploader.classList.remove("over"); //Caldrà adaptar al vostre CSS

            // enviar una a un cada arxiu al servidor...
            for (let i = 0; i < e.dataTransfer.files.length; i++) {
                const xhr = new XMLHttpRequest(); //Per cada arxiu es farà una petició AJAX
                let d=new Date();
                
                const data = new FormData(); //Referència als elements del FORM HTML
                const time=d.getTime();
				//Funció per 'crear llista d'elements a enviar'
				//Passem l'hora i un nom d'arxiu 
                sendFile(time, e.dataTransfer.files[i].name); 
                
                //Preparar dada per enviar (arxiu, hora)
				data.append('file', e.dataTransfer.files[i]);
				data.append('time', time);
				//Invocar el php que 'còpia' i retorna resultat
                xhr.open('POST', 'upload.php', true); 
                //Preparar Petició AJAX
				xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            if (xhr.response) {
                                uploadedFile(xhr.response); //AJAX : Cas de exit
                            }
                        } else {
                            console.error(xhr.statusText); //AJAX : Cas d'error
                            alert("Upload error!"); //probablement de servidor
                        }
                    }
                }
				//Proveu de comentar aquesta línia per veure l'estat 'enviant'
                xhr.send(data); //AJAX enviar petició
            }
        });
    });

    const filesList=document.getElementById("filesList"); //Zona llistat dels arxius pujats amb èxit o error

    /**
     * Funció que s'executa quan s'envia un arxiu
	 * Afegeix l'arxiu a la llista dels arxius enviats
     */
    function sendFile(time, fileName) {
		//Es crea un nou DIV per cada arxiu
        const div=document.createElement("div"); 
		//Contingut de data-time format per hora+nomArxiu
        div.dataset.time=time+fileName; 
        div.classList.add("send"); //Inicialment estat 'per enviar'
        div.innerText=fileName; //El nom de l'arxiu com a text
        //Conserva llistat, afegim al final per anar acumulant
		filesList.insertAdjacentElement("beforeend", div); 
    }

    /**
     * Funció que s'executa cada cop que el servidor a rebut un arxiu
	 * indicant si l'operació ha estat correcta o no
     */
    function uploadedFile(data) {
        data=JSON.parse(data); //Recupera informació del upload.php
        //Recupera de l'array de DIVs el data-time format per hora concatenat amb nom d'arxiu
		let el=document.querySelectorAll("[data-time='"+data.time+data.fileName+"']");
        if (el.length==0) { //Cas que no hi hagi cap 
            return;
        }
        //Correcció de la posició (-1)
		el=el[el.length-1];
		//Eliminar el Class de visualització 'estat send' anterior
        el.classList.remove("send"); //Caldrà adaptar al vostre CSS
        //Depenent si s'ha copiat correctament, actualitzarem el Class (enviat o error)
		if (data.result==1) {
            el.classList.add("sended");
        } else {
            el.classList.add("error"); //Caldrà adaptar al vostre CSS
            console.error(data.error); //Motiu de l'error (ja existent, prohibit....)
        }
    }
})();
