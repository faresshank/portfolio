(function() {
	"use strict";
/*
	var toggles = document.querySelectorAll(".c-hamburger");
	for(var i = toggles.length - 1; i >= 0; i--) {
		var toggle = toggles[i];
	    toggleHandler(toggle);
	};
*/
	var select = document.getElementById("enter");
	if(select){
		select.onclick = function(e){
			window.location = "./index.php?page=portfolio";
		}
	}

	var hover1 = document.getElementById("hover_web");
	if(hover1){
		hover1.onclick = function(e){
			console.log('yes');
			window.location = "./index.php?page=portfolio";
		}
	}

	var hover2 = document.getElementById("hover_design");
	if(hover2){
		hover2.onclick = function(e){
			console.log('yes');
			window.location = "./index.php?page=crea_design";
		}
	}

	var contact = document.getElementById("contact-send");
	if(contact){
		contact.onclick = function(e){
			document.getElementById("contact-send").classList.add("display");
			document.getElementById("contact-paper").style.top ="450px";
			document.getElementById("contact-paper").style.height ="100px";
			document.getElementById("contact-top").classList.add("play-contact-top");
			document.getElementById("stamp").classList.add("play-stamp")
		}
	}

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

	var fade = document.getElementById('fade');
	if(fade){
		fade.onclick = function(e){
			fade.classList.remove('isShowing');
			fade.classList.add('isFade');
			if(zoom1.classList.contains('isShowing')){
				zoom1.classList.remove('isShowing');
				zoom1.classList.add('isFade');
			}
			else if(zoom2.classList.contains('isShowing')){
				zoom2.classList.remove('isShowing');
				zoom2.classList.add('isFade');
			}
			else if(zoom3.classList.contains('isShowing')){
				zoom3.classList.remove('isShowing');
				zoom3.classList.add('isFade');
			}
		}
	}
	var polaroid1 = document.getElementById('polaroid1');
	if(polaroid1){
		polaroid1.onclick = function(e){
			var zoom1 = document.getElementById('zoom1');
			if(zoom1.classList.contains('isFade')){
				zoom1.classList.remove('isFade');
				zoom1.classList.add('isShowing');
				fade.classList.add('isShowing');
			}
		}
		polaroid2.onclick = function(e){
			var zoom2 = document.getElementById('zoom2');
			if(zoom2.classList.contains('isFade')){
				zoom2.classList.remove('isFade');
				zoom2.classList.add('isShowing');
				fade.classList.add('isShowing');
			}
		}
		polaroid3.onclick = function(e){
			var zoom3 = document.getElementById('zoom3');
			if(zoom3.classList.contains('isFade')){
				zoom3.classList.remove('isFade');
				zoom3.classList.add('isShowing');
				fade.classList.add('isShowing');
			}
		}
	}
	/*
		regrouper les 'classList' dans une fonctions et mettre le n° de 'zoom' en paramètre
	*/
})();