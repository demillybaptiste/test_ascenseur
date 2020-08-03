function goDown(){
  	var elem1 = document.getElementById("carre");
	var style = window.getComputedStyle(elem1, null).marginTop;
	style=style.replace("px","");
	var etage=parseInt(style);
	if (etage>549){
		alert ("on est au rdc");
	}

	else{
		etage-=10;
		etage=etage/60;
		etage+=1;
		alleraetage(etage);
	}
	
}

function goUp(){
  	var elem1 = document.getElementById("carre");
	var style = window.getComputedStyle(elem1, null).marginTop;
	style=style.replace("px","");
	var etage=parseInt(style);
	if (etage<11){
		alert ("on est au dernier étage");
	}
	else{
		etage-=10;
		etage=etage/60;
		etage-=1;
		alleraetage(etage);
	}
}

function etage(etage){ // envoie l'étage actuel de l'ascenseur
    	$.ajax({
        url : 'php.php', 
        type : 'POST', 
        data : 'etage=' + etage
        });
   

		var elem1 = document.getElementById("carre");
}

function alleraetage(etage){ //déplace l'ascenseur à l'étage souhaité
	var elem1 = document.getElementById("carre");
	etage=10+etage*60;
	etage=etage+"";
	etage=etage+"px";
	elem1.style.marginTop=etage;

}

function ouvrirlaporte(ouvert){ // entoure l'acenseur de vert pour simuler l'ouverture de la porte
	if(ouvert=="true"){
		var elem1 = document.getElementById("carre");
 		elem1.style.backgroundColor= "green";
	}
	if(ouvert=="false"){
		var elem1 = document.getElementById("carre");
 		elem1.style.backgroundColor= "white";
	}
}

function boucle(){ 
	$.getJSON('json.json',function(data){
	    $.ajax({
	        url : 'php.php', 
	        type : 'POST', 
	        data : 'choix_de_letage=1'
	        });

  		ouvrirlaporte(data.ouvert);
	  	alleraetage(data.etage);
	});


}
function lancement(){

		var interval=setInterval(boucle,1500);// permet de changer la vitesse de l'acenseur

}

function initialisation(){  //initialisation lancée à l'ouverture de la page
	    $.ajax({
	        url : 'php.php', 
	        type : 'POST', 
	        data : 'intialisation=4'
	        });
}

