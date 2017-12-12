/* globals initMap: false */

var config = require('./modules/config');

(function() {
	"use strict";

	var froalaKey = $('<script id="fr-fek">try{(function (k){localStorage.FEK=k;t=document.getElementById(\'fr-fek\');t.parentNode.removeChild(t);})(\'nHMDUGENKACTMXQL==\')}catch(e){}</script>');

	$('body').append(froalaKey);

	config.runInBlocks();

	window.addEventListener("message", receiveMessage, false);

    function receiveMessage(event) {

        if (event.data.action === "loadMapAPI") {

        	if ( $('body script.mapapi').size() === 0 ) {
            
	            var scriptTag = document.createElement('SCRIPT');
	            scriptTag.classList.add('mapapi');
	            scriptTag.src = "https://maps.googleapis.com/maps/api/js?key="+event.data.key+"&callback=initMap";
	            scriptTag.setAttribute('async', '');
	            scriptTag.setAttribute('defer', '');

	            $('body').append(scriptTag);

        	} else {

        		initMap();

        	}

        }

    }

}());