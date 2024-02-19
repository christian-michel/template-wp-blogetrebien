/*
 * ======================================================================================================
 * Ce script rend automatiquement les vidéos (et autres fichiers responsives.
 * Pour le faire foncitonner, il faut :
 *  1- que les contenus à rendre responsives soient contenus dans une balise HTML ayant l'ID #monContenu
 *  2- que la balise à rendre responsive soit prise en compte dans le tableau de ce script (cf. ligne 8)
 * ======================================================================================================
 */
   
var items = ["iframe"]; // insérer les différents types de balises HTML concernées

for (var p = 0; p < items.length; p++) {
	var d_count = document.getElementsByTagName(items[p]).length;
	var i = 0;
	if(d_count != 0){
		for(i=0; i<d_count; i++){
			// ici ajouter la condition de contrôle qu'il s'agissent d'une vidéo et non d'Amazon par exemple			 
			var monUrl = document.getElementsByTagName(items[p])[i].src;
			var youtubeUrl = monUrl.indexOf("youtu");
			var vimeoUrl = monUrl.indexOf("vimeo");
			var dailymotionUrl = monUrl.indexOf("dailymotion");

			if(youtubeUrl > -1 || vimeoUrl > -1 || dailymotionUrl > -1){ // vérification des url pour ne pas les confondre avec l'affiliation Amazon
			
				var d_detectClassDiv = document.getElementsByTagName(items[p])[i].parentNode.getAttribute("class");
				if(d_detectClassDiv != "videoWrapper"){ // si iframe n'est pas enfant de div .videoWrappper
					var d_iframe = document.getElementsByTagName(items[p])[i]; // pointage sur la vidéo
					var d_responsive = document.createElement("div"); // création de mon div qui va gérer la vidéo responsive
						d_responsive.setAttribute("class","videoWrapper"); // ajout des attributs de mon div

						d_video = document.getElementsByTagName(items[p])[i].outerHTML; // duplication de mon iframe
						d_responsive.innerHTML = d_video; // insérer le nouvel iframe dans mon div .videoWrapper

						var zoneContenu = document.getElementById('monContenu') // pour que ça fonctionne mes articles doivent être dans une balise ayant un id monContenu
							zoneContenu.insertBefore(d_responsive, d_iframe); // placer mon div responsive juste au dessus de l'iframe HTML
						
						var zoneContenu = document.getElementById('monContenu') // pour que ça fonctionne mes articles doivent être dans une balise ayant un id monContenu
							zoneContenu.insertBefore(d_responsive, d_iframe); // placer mon div responsive juste au dessus de l'iframe HTML
		
						d_iframe.parentNode.removeChild(d_iframe); // suppression de la vidéo dans l'iframe initiale en HTML
						
				} else{} // si iframe est enfant de div .videoWrappper, on ne fait rien
			} else{} // si l'iframe ne provient pas d'un site de vidéos, pas de traitement responsive
		}
	} else{} // s'il n'y a pas de balise iframe sur la page
}

