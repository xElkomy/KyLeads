/*
	CSS
*/
require('../css/load-main.css');
require('../css/slim.min.css');

/*
	scripts (as conventional globals)
*/
require("script!./vendor/jquery.min.js");
require("script!./vendor/jquery-ui.min.js");
require("script!./vendor/flat-ui-pro.min.js");
require("script!./vendor/chosen.min.js");
require("script!./vendor/slim.kickstart.js");

/*
	application modules
*/
require('./modules/ui');
require('./modules/builder');
require('./modules/config');
require('./modules/imageLibrary');
require('./modules/account');
require('jquery-lazyload');

$(function() {
    "use strict";
    
    $("#myImagesTab img.lazy").lazyload({
    	failure_limit : 1000,
    });

    $("#adminImages img.lazy").lazyload({
    	failure_limit : 1000,
    	event: "sporty"
    });
});
