/*
    CSS
*/
require('../css/load-main.css');

/*
    scripts (as conventional globals)
*/
require("script!./vendor/jquery.min.js");
require("script!./vendor/jquery-ui.min.js");
require("script!./vendor/flat-ui-pro.min.js");
require("script!./vendor/jquery.zoomer.js");

(function () {
    "use strict";

    require('./modules/ui');
    require('./modules/packages');
    require('./modules/account');
    //require('bootstrap-select');
    //require('./modules/sitesettings');
    //require('./modules/sites');

}());