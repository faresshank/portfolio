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
	// LIGHTBOX ESSAI 1
	///////////////////////////////////////////////
/*
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
*/
	///////////////////////////////////////////////
	// LIGHTBOX ESSAI 2
	///////////////////////////////////////////////
	/*function $(selector){
	    this.element = document.getElementById(selector);
	}

	$.prototype.animate_zoom = function(classMove,zoom_item){
	    var fade_el = document.getElementById('fade').classList,
	        zoom_el = document.getElementById(zoom_item).classList;
	    this.element.onclick = function(){
	        zoom_el.remove(classMove.remove);
	        zoom_el.add(classMove.add);
	        fade_el.remove(classMove.remove);
	        fade_el.add(classMove.add);
	    }
	}
	var showing = {"remove":"isFade","add":"isShowing"},
	    fading = {"remove":"isShowing","add":"isFade"};

	for ( i=1;i<4;i++ ){
	    var polaroid_el = new $('polaroid'+i),
	        zoom_el = new $('zoom'+i);

	    if ( polaroid_el && zoom_el ){
	        polaroid_el.animate_zoom(showing,'zoom'+i);
	        zoom_el.animate_zoom(fading,'zoom'+i);
	    }
	}*/
	///////////////////////////////////////////////
	// LIGHTBOX ESSAI 3
	///////////////////////////////////////////////
	// Définition de la fonction $
	function $(selector){
		// Si l'élement existe
	    this.element = document.getElementById(selector);

	}
	// Définition de la méthode animate_zoom
	$.prototype.animate_zoom = function(classMove){
	    var zoom_class =  zoom_el.element.classList,
		    fade_class =  fade.element.classList;
	    this.element.onclick = function(){
	        zoom_class.remove(classMove.remove);
	        zoom_class.add(classMove.add);
	        fade_class.remove(classMove.remove);
	        fade_class.add(classMove.add);
	    }
	}
	var showing = {"remove":"isFade","add":"isShowing"},
	    fading = {"remove":"isShowing","add":"isFade"};
	var fade =  new $('fade');
	var i = 1;
	while( i<4 ){
	    var polaroid_el = new $('polaroid'+i),
	        zoom_el = new $('zoom'+i);
	    if(polaroid_el.element){
	    	polaroid_el.animate_zoom(showing);
	    	zoom_el.animate_zoom(fading);
	    }
	    i++
	}

})();