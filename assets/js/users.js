/* globals baseUrl: false */
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

(function () {
    "use strict";

    require('./modules/ui');
    require('./modules/users');
    require('./modules/account');
    require('./modules/sitesettings');
    require('./modules/sites');

}());