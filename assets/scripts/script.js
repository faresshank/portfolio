(function() {
	"use strict";
	///////////////////////////////////////////////
	// ONCLICK SUR SVG DE LA HOME
	///////////////////////////////////////////////
	var homeBtn = document.getElementById('homeBtn');
	if(homeBtn){
		homeBtn.onclick = function(e){
			window.location = 'portfolio';
		}
	}
	///////////////////////////////////////////////
	// VÉRIFICATION DE LA VALIDITÉ DE L'INPUT EMAIL
	///////////////////////////////////////////////
	function validEmail(inputEmail) {  
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(inputEmail.value.match(mailformat)){
			document.form.mail.focus();
			return true; 
		}  
		else{
			alert("You have entered an invalid email address!");  
			return false;  
		}
	}
	///////////////////////////////////////////////
	// GESTION DE L'ANIMATION APRES "validEmail"
	///////////////////////////////////////////////
	var contact = document.getElementById("contact-send");
	if(contact){
		contact.onclick = function(e){
			var mail = document.getElementById("mail");
			if(!empty(mail)){
				validEmail(mail);
				document.getElementById("contact-send").classList.add("display");
				document.getElementById("contact-paper").style.top ="450px";
				document.getElementById("contact-paper").style.height ="100px";
				document.getElementById("contact-top").classList.add("play-contact-top");
				document.getElementById("stamp").classList.add("play-stamp")
			}
		}
	}
	///////////////////////////////////////////////
	// AFFICHAGE DE LA SIDEBAR
	///////////////////////////////////////////////
	var ics = document.getElementById('ics');
	var menu = document.getElementById('menu');
    var icsL = document.getElementById('ics-l');
    var icsR = document.getElementById('ics-r');
	if(menu){
	    menu.onclick = function(e){
	    	icsL.classList.remove('quit-l');
	        icsR.classList.remove('quit-r');
	        icsL.classList.add('move-l');
	        icsR.classList.add('move-r');
	        document.getElementById("sidebar").classList.add("show-sidebar");
	        // Règle le bug d'affichage du lien "mon parcours" en responsive
	        setTimeout(function(){
				document.getElementById("links").classList.remove("show-links");
			}, 160);
	    }
	}
	if(ics){
	    ics.onclick = function(e){
	        icsL.classList.remove('move-l');
	        icsR.classList.remove('move-r');
	    	icsL.classList.add('quit-l');
	        icsR.classList.add('quit-r');
	    	document.getElementById("sidebar").classList.remove("show-sidebar");
			document.getElementById("links").classList.add("show-links");
	    }
	}
	///////////////////////////////////////////////
	// LIGHTBOX
	///////////////////////////////////////////////
	var tab = {	
		polaroid1 :{
			"element" : document.getElementById('polaroid1'),
			"id" : "zoom1" 
		}, 
		polaroid2 :{
			"element" : document.getElementById('polaroid2'),
			"id" : "zoom2"
		},
		polaroid3 :{
			"element" : document.getElementById('polaroid3'),
			"id" : "zoom3" 
		}
	};
	function handleElement(polaroid){
		var zoomId = document.getElementById(polaroid.id);
		if(zoomId){
			var zoomClass = zoomId.classList;
			var fade = document.getElementById('fade').classList;
			// Event sur click des miniatures
			polaroid.element.onclick = function(e){
					zoomClass.remove('isFade');
					zoomClass.add('isShowing');
					fade.remove('isFade');
					fade.add('isShowing');
			}
			// Event sur click des img plein écran
			zoomId.onclick = function(e){
				fade.remove('isShowing');
				fade.add('isFade');
				zoomClass.remove('isShowing');
				zoomClass.add('isFade');
			}
		}
	}
	for ( var polaroid in tab){
		handleElement(tab[polaroid]);
	}
})();