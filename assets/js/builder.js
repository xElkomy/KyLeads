/*
	CSS
*/
require('../css/load-main.css');
require('../css/load-builder.css');
require('../sass/builder.scss');
require('./vendor/froala_editor_sources_2/css/froala_editor.pkgd.min.css');
require('./vendor/froala_editor_sources_2/css/froala_style.min.css');

/*
	scripts (as conventional globals)
*/
require("script!./vendor/jquery.min.js");
require("script!./vendor/jquery-ui.min.js");
require("script!./vendor/flat-ui-pro.min.js");
require("script!./vendor/chosen.min.js");
require("script!./vendor/jquery.zoomer.js");
require("script!./vendor/spectrum.js");
require("script!./vendor/jquery.dnd_page_scroll.js");
require("script!./vendor/froala_editor_sources_2/js/froala_editor.js");
require("script!./vendor/froala_editor_sources_2/js/plugins/link.js");
require("script!./vendor/froala_editor_sources_2/js/plugins/font_family.min.js");
require("script!./vendor/froala_editor_sources_2/js/plugins/font_size.min.js");
require("script!./vendor/froala_editor_sources_2/js/plugins/align.min.js");
require("script!./vendor/froala_editor_sources_2/js/plugins/paragraph_format.min.js");
require("script!./vendor/slim.kickstart.js");

/*
	application modules
*/
require('./modules/ui.js');
require('./modules/builder.js');
require('./modules/config.js');
require('./modules/utils.js');
require('./modules/canvasElement.js');
require('./modules/styleeditor.js');
require('./modules/imageLibrary.js');
require('./modules/content.js');
require('./modules/sitesettings.js');
require('./modules/export.js');
require('./modules/preview.js');
require('./modules/revisions.js');
require('./modules/templates.js');
require('./modules/components.js');
require('./modules/grid.js');
require('./modules/polyfills.js');

$(document).ready(function() {
	"use strict";
	$().dndPageScroll();
});