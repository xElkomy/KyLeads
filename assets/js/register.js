/*
	CSS
*/
require('../css/load-main.css');

/*
	scripts (as conventional globals)
*/
require("script!./vendor/jquery.min.js");
require("script!./vendor/flat-ui-pro.min.js");

$("select").select2({dropdownCssClass: 'dropdown-inverse'});