(function () {
	"use strict";

    var publisher = require('../vendor/publisher');
	var bConfig = require('./config');
    var utils = require('./utils.js');
    var siteBuilder = require('./builder.js');

	var contenteditor = {

        init: function() {

            publisher.subscribe('onBlockLoaded', function (block) {
                contenteditor.injectFrameCSS(block);
            });

            publisher.subscribe('onContentClick', function (element) {
                contenteditor.contentClick(element);
            });

            publisher.subscribe('onBeforeSave', function () {

            });
                        
        },

        /*
            injects the Medium Editor styling into the iframe's head
        */
        injectFrameCSS: function (block) {

            for( var x = 0; x < bConfig.cssUrls.length; x++ ) {

                if ( block.hasExternalCSS(bConfig.cssUrls[x]) ) continue;

                var cssLink = document.createElement('LINK');
                cssLink.setAttribute('rel', 'stylesheet');
                cssLink.setAttribute('href', bConfig.cssUrls[x]);
                cssLink.setAttribute('type', 'text/css');
                cssLink.setAttribute('media', 'screen');
                cssLink.setAttribute('charset', 'utf-8');
                cssLink.setAttribute('id', 'mediumCss' + x);

                block.frameDocument.head.appendChild(cssLink);

            }

        },


        /*
            Content click handler
        */
        contentClick: function (element) {

            var froalaConfig = bConfig.froalaConfig;

            //we'll need to make sure all ancestors are not draggable for Medium editor to function properly in Safari and FF
            $(element.element).parents('*[data-component]').each(function () {
                this.removeAttribute('draggable');
            });

            element.element.setAttribute('data-sbpro-editor', true);
            element.destroyToolBar();

            froalaConfig.enter = $.FroalaEditor.ENTER_BR;

            $(element.element).addClass('sb_open').froalaEditor(froalaConfig).on('froalaEditor.blur', function (e, editor) {
                e.currentTarget.removeAttribute('data-sbpro-editor');
                e.currentTarget.classList.remove('sb_open');
                e.currentTarget.classList.remove('sb_hover');
                editor.destroy();

                //height adjustment
                element.parentBlock.heightAdjustment();

                $(element.element).parents('*[data-component]').each(function () {
                    this.setAttribute('draggable', true);
                });

            }).on('froalaEditor.click', function (e, editor, clickEvent) {

                editor.toolbar.hide();

            }).on('froalaEditor.contentChanged', function (e, editor) {

                //height adjustment
                element.parentBlock.heightAdjustment();
                siteBuilder.site.setPendingChanges(true);

            });

            $(element.element).froalaEditor('events.focus');

        }
        
    };
    
    contenteditor.init();

}());