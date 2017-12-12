(function (){
	"use strict";

	var canvasElement = require('./canvasElement.js').Element;
	var bConfig = require('./config.js');
	var siteBuilder = require('./builder.js');
    var publisher = require('../vendor/publisher');
    var utils = require('./utils.js');

    var styleeditor = {

        buttonSaveChanges: document.getElementById('saveStyling'),
        activeElement: {}, //holds the element currenty being edited
        allStyleItemsOnCanvas: [],
        _oldIcon: [],
        styleEditor: document.getElementById('styleEditor'),
        formStyle: document.getElementById('stylingForm'),
        buttonRemoveElement: document.getElementById('deleteElementConfirm'),
        buttonCloneElement: document.getElementById('cloneElementButton'),
        buttonDelElement: document.getElementById('removeElementButton'),
        buttonResetElement: document.getElementById('resetStyleButton'),
        selectLinksInernal: document.getElementById('internalLinksDropdown'),
        selectLinksPages: document.getElementById('pageLinksDropdown'),
        videoInputYoutube: document.getElementById('youtubeID'),
        videoInputVimeo: document.getElementById('vimeoID'),
        inputCustomLink: document.getElementById('internalLinksCustom'),
        linkImage: null,
        linkIcon: null,
        inputLinkText: document.getElementById('linkText'),
        selectIcons: document.getElementById('icons'),
        buttonDetailsAppliedHide: document.getElementById('detailsAppliedMessageHide'),
        buttonCloseStyleEditor: document.querySelector('#styleEditor button.close'),
        ulPageList: document.getElementById('pageList'),
        responsiveToggle: document.getElementById('responsiveToggle'),
        theScreen: document.getElementById('screen'),
        inputLinkActive: document.getElementById('checkboxLinkActive'),

        checkboxEmailForm: document.getElementById('checkboxEmailForm'),
        inputEmailFormTo: document.getElementById('inputEmailFormTo'),
        textareaCustomMessage: document.getElementById('textareaCustomMessage'),
        checkboxCustomAction: document.getElementById('checkboxCustomAction'),
        inputCustomAction: document.getElementById('inputCustomAction'),

        inputCombinedGallery: document.getElementById('inputCombinedGallery'),
        inputImageTitle: document.getElementById('inputImageTitle'),
        inputImageAlt: document.getElementById('inputImageAlt'),

        checkboxSliderAutoplay: document.getElementById('checkboxSliderAutoplay'),
        checkboxSliderPause: document.getElementById('checkboxSliderPause'),
        selectSliderAnimation: document.getElementById('selectSliderAnimation'),
        inputSlideInterval: document.getElementById('inputSlideInterval'),
        selectSliderNavArrows: document.getElementById('selectSliderNavArrows'),
        selectSliderNavIndicators: document.getElementById('selectSliderNavIndicators'),

        inputZoomLevel: document.getElementById('inputZoomLevel'),
        textareaAddress: document.getElementById('textareaAddress'),
        textareaInfoMessage: document.getElementById('textareaInfoMessage'),
        checkBoxMapBW: document.getElementById('checkBoxMapBW'),

        init: function() {

            publisher.subscribe('closeStyleEditor', function () {
                styleeditor.closeStyleEditor();
            });

            publisher.subscribe('onBlockLoaded', function (block) {
                styleeditor.setupCanvasElements(block);
            });

            publisher.subscribe('onComponentDrop', function (block) {
                styleeditor.setupCanvasElements(block);
            });

            publisher.subscribe('onSetMode', function (mode) {
                styleeditor.responsiveModeChange(mode);
            });

            publisher.subscribe('deSelectAllCanvasElements', function () {
                styleeditor.deSelectAllCanvasElements();
            });

            //events
            $(this.buttonSaveChanges).on('click', this.updateStyling);
            $(this.formStyle).on('focus', 'input', this.animateStyleInputIn).on('blur', 'input:not([name="background-image"])', this.animateStyleInputOut);
            $(this.buttonRemoveElement).on('click', this.deleteElement);
            $(this.buttonCloneElement).on('click', this.cloneElement);
            $(this.buttonResetElement).on('click', this.resetElement);
            $(this.videoInputYoutube).on('focus', function(){ $(styleeditor.videoInputVimeo).val(''); });
            $(this.videoInputVimeo).on('focus', function(){ $(styleeditor.videoInputYoutube).val(''); });
            $(this.inputCustomLink).on('focus', this.resetSelectAllLinks);
            $(this.buttonDetailsAppliedHide).on('click', function(){$(this).parent().fadeOut(500);});
            $(this.buttonCloseStyleEditor).on('click', this.closeStyleEditor);
            $(this.inputCustomLink).on('focus', this.inputCustomLinkFocus).on('blur', this.inputCustomLinkBlur);
            $(document).on('modeContent modeBlocks', 'body', this.deActivateMode);

            //chosen font-awesome dropdown
            $(this.selectIcons).chosen({'search_contains': true});

            //check if formData is supported
            if (!window.FormData){
                this.hideFileUploads();
            }

            //listen for the beforeSave event
            $('body').on('beforeSave', this.closeStyleEditor);

            //responsive toggle
            $(this.responsiveToggle).on('click', 'a', this.toggleResponsiveClick);

            //set the default responsive mode
            siteBuilder.builderUI.currentResponsiveMode = Object.keys(bConfig.responsiveModes)[0];

            this.setupFormTab();

        },

        /*
            Configured the checkboxes in the FORM tab
        */
        setupFormTab: function () {

            if ( this.checkboxEmailForm === null ) return false;

            this.checkboxEmailForm.addEventListener('change', function () {
                if ( this.checked ) {

                    //use sent API
                    styleeditor.inputEmailFormTo.removeAttribute('disabled');
                    styleeditor.textareaCustomMessage.removeAttribute('disabled');

                    //make sure custom action is disabled
                    styleeditor.checkboxCustomAction.checked = false;
                    styleeditor.inputCustomAction.setAttribute('disabled', true);
                    
                } else {
                    
                    styleeditor.inputEmailFormTo.setAttribute('disabled', true);
                    styleeditor.textareaCustomMessage.setAttribute('disabled', true);

                }
            });

            this.checkboxCustomAction.addEventListener('change', function () {
                if ( this.checked ) {

                    //use custom action
                    styleeditor.inputCustomAction.removeAttribute('disabled');

                    //make sure sent API is disabled
                    styleeditor.checkboxEmailForm.checked = false;
                    styleeditor.inputEmailFormTo.setAttribute('disabled', false);
                    styleeditor.textareaCustomMessage.setAttribute('disabled', true);

                } else {

                    styleeditor.inputCustomAction.setAttribute('disabled', true);

                }
            });

        },

        /*
            Deselects all canvas elements
        */
        deSelectAllCanvasElements: function () {

            for ( var i in this.allStyleItemsOnCanvas ) {
                if ( this.allStyleItemsOnCanvas.hasOwnProperty(i) ) {

                    this.allStyleItemsOnCanvas[i].removeOutline();

                }
            }

        },

        /*
            Event handler for responsive mode links
        */
        toggleResponsiveClick: function (e) {

            e.preventDefault();
            
            styleeditor.responsiveModeChange(this.getAttribute('data-responsive'));

        },


        /*
            Toggles the responsive mode
        */
        responsiveModeChange: function (mode) {

            if ( styleeditor.responsiveToggle === null ) return false;

            var links,
                i;

            //UI stuff
            links = styleeditor.responsiveToggle.querySelectorAll('li');

            for ( i = 0; i < links.length; i++ ) links[i].classList.remove('active');

            document.querySelector('a[data-responsive="' + mode + '"]').parentNode.classList.add('active');


            for ( var key in bConfig.responsiveModes ) {

                if ( bConfig.responsiveModes.hasOwnProperty(key) ) this.theScreen.classList.remove(key);

            }

            if ( bConfig.responsiveModes[mode] ) {

                this.theScreen.classList.add(mode);
                this.theScreen.style.maxWidth = bConfig.responsiveModes[mode];

                if ( typeof siteBuilder.site.activePage.heightAdjustment === 'function' ) siteBuilder.site.activePage.heightAdjustment();

            }

            siteBuilder.builderUI.currentResponsiveMode = mode;

        },


        /*
            Activates style editor mode
        */
        setupCanvasElements: function(block) {

            //needed to move from 1.0.1 to 1.0.2, can be removed after 1.0.4
            $(block.frame).contents().find('*[data-selector]').each(function () {
                this.removeAttribute('data-selector');
            });

            if ( block === undefined ) return false;

            var i;

            //create an object for every editable element on the canvas and setup it's events

            for( var key in bConfig.editableItems ) {

                $(block.frame).contents().find( bConfig.pageContainer + ' ' + key ).each(function () {

                    if ( !this.hasAttribute('data-selector') ) styleeditor.setupCanvasElementsOnElement(this, key);

                });

            }

        },


        /*
            Sets up canvas elements on element
        */
        setupCanvasElementsOnElement: function (element, key) {

            //Element object extention
            canvasElement.prototype.clickHandler = function(el) {
                styleeditor.styleClick(this);
            };

            var newElement = new canvasElement(element);

            newElement.editableAttributes = bConfig.editableItems[key];
            newElement.setParentBlock();
            newElement.activate();
            newElement.unsetNoIntent();

            for ( var i in styleeditor.allStyleItemsOnCanvas ) {

                if ( styleeditor.allStyleItemsOnCanvas[i].element === newElement.element ) {

                    styleeditor.allStyleItemsOnCanvas.splice(i, 1);

                }

            }

            styleeditor.allStyleItemsOnCanvas.push( newElement );

            if ( typeof key !== undefined ) $(element).attr('data-selector', key);

        },


        styleDblClick: function (element) {

            this.closeStyleEditor();

            //content editor?
            if ( element.element.parentNode.hasAttribute('data-content') ) {
                publisher.publish('onClickContent', element.element);
            }

        },


        /*
            Event handler for when the style editor is envoked on an item
        */
        styleClick: function(element) {

            if (element.element.hasAttribute('data-container')) {
                //disable the clone & delete buttons
                styleeditor.buttonCloneElement.setAttribute('disabled', true);
                styleeditor.buttonDelElement.setAttribute('disabled', true);
            } else {
                //enable the clone & delete buttons
                styleeditor.buttonCloneElement.removeAttribute('disabled');
                styleeditor.buttonDelElement.removeAttribute('disabled');
            }

            //if we have an active element, make it unactive
            if( Object.keys(this.activeElement).length !== 0) {
                this.activeElement.activate();
            }

            //set the active element
            this.activeElement = element;

            //unbind hover and click events and make this item active
            this.activeElement.setOpen();

            var theSelector = $(this.activeElement.element).attr('data-selector');

            $('#editingElement').text( theSelector );

            //activate first tab
            $('#detailTabs a:first').click();

            //hide all by default
            $('ul#detailTabs li:gt(0)').hide();

            //what are we dealing with?
            if( $(this.activeElement.element).prop('tagName') === 'A' ) {

                this.editLink(this.activeElement.element);

            }

			if( $(this.activeElement.element).prop('tagName') === 'IMG' ){

                this.editImage(this.activeElement.element);

            }

			if( $(this.activeElement.element).attr('data-type') === 'video' ) {

                this.editVideo(this.activeElement.element);

            }

			if( $(this.activeElement.element).hasClass('fa') ) {

                this.editIcon(this.activeElement.element);

            }

            if( this.activeElement.element.tagName === 'FORM' ) {

                this.editForm(this.activeElement.element);

            }

            if ( this.activeElement.element.parentNode.parentNode.parentNode.hasAttribute('data-carousel-item') ) {

                this.editSlideshow($(this.activeElement.element).closest('.carousel')[0]);

            }

            if ( this.activeElement.element.classList.contains('mapOverlay') ) {

                this.editMap( $(this.activeElement.element).prev()[0] );

            }

            /*if( this.activeElement.element.tagName === 'NAV' ) {

                this.editNavbar(this.activeElement.element);

            }*/

            //load the attributes
            this.buildeStyleElements(theSelector);

            //open side panel
            this.toggleSidePanel('open');

            return false;

        },


        /*
            dynamically generates the form fields for editing an elements style attributes
        */
        buildeStyleElements: function(theSelector) {

            //delete the old ones first
            $('#styleElements > *:not(#styleElTemplate)').each(function(){

                $(this).remove();

            });

            var takeFrom = styleeditor.activeElement.element;

            if ( styleeditor.activeElement.element.classList.contains('mapOverlay') ) {
                takeFrom = $(styleeditor.activeElement.element).prev()[0];
            }

            for( var x=0; x<bConfig.editableItems[theSelector].length; x++ ) {

                //create style elements
                var newStyleEl = $('#styleElTemplate').clone(), 
                    newDropDown,
                    z,
                    newOption;
                newStyleEl.attr('id', '');
                newStyleEl.find('.control-label').text( bConfig.editableItems[theSelector][x]+":" );

                if( theSelector + " : " + bConfig.editableItems[theSelector][x] in bConfig.editableItemOptions) {//we've got a dropdown instead of open text input

                    newStyleEl.find('input').remove();

                    newDropDown = $('<select class="form-control select select-primary btn-block select-sm"></select>');
                    newDropDown.attr('name', bConfig.editableItems[theSelector][x]);


                    for( z = 0; z < bConfig.editableItemOptions[ theSelector + " : " + bConfig.editableItems[theSelector][x] ].length; z++ ) {

                        newOption = $('<option value="' + bConfig.editableItemOptions[theSelector + " : " + bConfig.editableItems[theSelector][x]][z] + '">' + bConfig.editableItemOptions[theSelector + " : " + bConfig.editableItems[theSelector][x]][z] + '</option>');


                        if( bConfig.editableItemOptions[theSelector + " : " + bConfig.editableItems[theSelector][x]][z] === $(takeFrom).css( bConfig.editableItems[theSelector][x] ) ) {
                            //current value, marked as selected
                            newOption.attr('selected', 'true');

                        }

                        newDropDown.append( newOption );

                    }

                    newStyleEl.append( newDropDown );
                    newDropDown.select2();

                } else if ( bConfig.editableItems[theSelector][x] in bConfig.customStyleDropdowns ) {

                    var somethingSelected = 0;

                    //this option uses a custom label
                    newStyleEl.find('.control-label').text( bConfig.customStyleDropdowns[bConfig.editableItems[theSelector][x]].label + ":" );

                    newStyleEl.find('input').remove();

                    newDropDown = $('<select class="form-control select select-primary btn-block select-sm" data-class-dropdown="' + bConfig.editableItems[theSelector][x] + '"></select>');
                    newDropDown.attr('name', bConfig.editableItems[theSelector][x]);

                    for ( var opt in bConfig.customStyleDropdowns[bConfig.editableItems[theSelector][x]].values ) {

                        if ( bConfig.customStyleDropdowns[bConfig.editableItems[theSelector][x]].values.hasOwnProperty(opt) ) {

                            newOption = $('<option value="' + bConfig.customStyleDropdowns[bConfig.editableItems[theSelector][x]].values[opt] + '">' + opt + '</option>');

                            newDropDown.append( newOption );

                            //detect currently applied class
                            for( var clss in takeFrom.classList ) {
                                if ( takeFrom.classList.hasOwnProperty(clss) ) {
                                    
                                    if ( takeFrom.classList[clss] === bConfig.customStyleDropdowns[bConfig.editableItems[theSelector][x]].values[opt] ) {

                                        somethingSelected = 1;
                                        newOption.attr('selected', 'true');

                                    }

                                }
                            }

                        }

                    }

                    //if nothing selected, use the default
                    if ( somethingSelected === 0) {
                        newDropDown.val( bConfig.customStyleDropdowns[bConfig.editableItems[theSelector][x]].default );
                    }

                    newStyleEl.append( newDropDown );
                    newDropDown.select2({
                        minimumResultsForSearch: -1
                    });
                    

                } else if ( utils.contains.call(bConfig.inputAppend, bConfig.editableItems[theSelector][x]) ) {

                    newStyleEl.find('input').val( $(takeFrom).css( bConfig.editableItems[theSelector][x] ).replace('px', '') ).attr('name', bConfig.editableItems[theSelector][x]);

                    newStyleEl.find('input').addClass('padding-right');

                    newStyleEl.append($('<span class="inputAppend">px</span>'));

                } else {

                    newStyleEl.find('input').val( $(takeFrom).css( bConfig.editableItems[theSelector][x] ) ).attr('name', bConfig.editableItems[theSelector][x]);

                    if( bConfig.editableItems[theSelector][x] === 'background-image' ) {

                        newStyleEl.find('input').addClass('padding-right');

                        newStyleEl.append($('<a href="#" class="linkLib"><span class="fui-image"></span></a>'));

                        newStyleEl.find('a.linkLib').bind('click', function(e){

                            e.preventDefault();

                            var theInput = $(this).prev();

                            $('#imageModal').modal('show');
                            $('#imageModal .image button.useImage').unbind('click');
                            $('#imageModal').on('click', '.image button.useImage', function(){

                                //update live image
                                theInput.val( 'url("'+$(this).attr('data-url')+'")' );

                                //hide modal
                                $('#imageModal').modal('hide');

                                //we've got pending changes
                                siteBuilder.site.setPendingChanges(true);

                            });

                        });

                    } else if( bConfig.editableItems[theSelector][x].indexOf("color") > -1 ) {

                        if( $(takeFrom).css( bConfig.editableItems[theSelector][x] ) !== 'transparent' && $(takeFrom).css( bConfig.editableItems[theSelector][x] ) !== 'none' && $(takeFrom).css( bConfig.editableItems[theSelector][x] ) !== '' ) {

                            newStyleEl.val( $(takeFrom).css( bConfig.editableItems[theSelector][x] ) );

                        }

                        newStyleEl.find('input').spectrum({
                            preferredFormat: "hex",
                            showPalette: true,
                            allowEmpty: true,
                            showInput: true,
                            palette: [
                                ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                                ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                                ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                                ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                                ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                                ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                                ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                                ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
                            ]
                        });

                    }

                }

                newStyleEl.css('display', 'block');

                $('#styleElements').append( newStyleEl );

                $('#styleEditor form#stylingForm').height('auto');

            }

        },


        /*
            Applies updated styling to the canvas
        */
        updateStyling: function() {

            var elementID,
                length,
                applyTo;

            $('#styleEditor #tab1 .form-group:not(#styleElTemplate) input, #styleEditor #tab1 .form-group:not(#styleElTemplate) select').each(function(){

                applyTo = styleeditor.activeElement.element;

                if ( styleeditor.activeElement.element.classList.contains('mapOverlay') ) {
                    applyTo = $(styleeditor.activeElement.element).prev()[0];
                }

				if( $(this).attr('name') !== undefined ) {

                    //custom class dropdown?
                    if ( this.hasAttribute('data-class-dropdown') ) {

                        var dropdownItem = bConfig.customStyleDropdowns[this.getAttribute('data-class-dropdown')];

                        //remove the currently applied class
                        for ( var option in dropdownItem.values ) {
                            if ( dropdownItem.values.hasOwnProperty(option) ) {

                                if ( dropdownItem.values[option] !== '' && styleeditor.activeElement.element.classList.contains(dropdownItem.values[option]) ) {
                                    applyTo.classList.remove(dropdownItem.values[option]);
                                }

                            }
                        }


                        //apply class
                        if ( this.value !== '' ) applyTo.classList.add(this.value);

                    } else {

                        if ( utils.contains.call(bConfig.inputAppend, $(this).attr('name')) ) {

                            $(applyTo).css( $(this).attr('name'),  $(this).val()+"px");

                        } else {

                            $(applyTo).css( $(this).attr('name'),  $(this).val());

                        }

                    }

				}

                /* SANDBOX */

                if( styleeditor.activeElement.sandbox ) {

                    elementID = $(styleeditor.activeElement.element).attr('id');

                    $('#'+styleeditor.activeElement.sandbox).contents().find('#'+elementID).css( $(this).attr('name'),  $(this).val() );

                }

                /* END SANDBOX */

            });

            //links
            if( $(styleeditor.activeElement.element).prop('tagName') === 'A' ) {

                //change the href prop?
                styleeditor.activeElement.element.href = document.getElementById('internalLinksCustom').value;

                length = styleeditor.activeElement.element.childNodes.length;

                if ( $(styleeditor.activeElement.element).closest(bConfig.navSelector).size() === 1 && styleeditor.inputLinkActive.checked) {

                    styleeditor.activeElement.element.parentNode.classList.add(bConfig.navActiveClass);

                } else {

                    styleeditor.activeElement.element.parentNode.classList.remove(bConfig.navActiveClass);

                }
                
                //does the link contain an image?
                if( styleeditor.linkImage ) {

                    //console.log('Case 1');

                    styleeditor.activeElement.element.childNodes[length-1].nodeValue = document.getElementById('linkText').value;

                } else if ( styleeditor.linkIcon ) {

                    //console.log('Case 2');

                    styleeditor.activeElement.element.childNodes[length-1].nodeValue = document.getElementById('linkText').value;

                } else {

                    //console.log('Case 3');

                    styleeditor.activeElement.element.innerText = document.getElementById('linkText').value;

                }

                /* SANDBOX */

                if( styleeditor.activeElement.sandbox ) {

                    elementID = $(styleeditor.activeElement.element).attr('id');

                    $('#'+styleeditor.activeElement.sandbox).contents().find('#'+elementID).attr('href', $('input#internalLinksCustom').val());


                }

                /* END SANDBOX */

            }

            if( $(styleeditor.activeElement.element).parent().prop('tagName') === 'A' ) {

                //change the href prop?
                styleeditor.activeElement.element.parentNode.href = document.getElementById('internalLinksCustom').value;

                length = styleeditor.activeElement.element.childNodes.length;
                

                /* SANDBOX */

                if( styleeditor.activeElement.sandbox ) {

                    elementID = $(styleeditor.activeElement.element).attr('id');

                    $('#'+styleeditor.activeElement.sandbox).contents().find('#'+elementID).parent().attr('href', $('input#internalLinksCustom').val());

                }

                /* END SANDBOX */

            }

            //icons
            if( $(styleeditor.activeElement.element).hasClass('fa') ) {

                //out with the old, in with the new :)
                //get icon class name, starting with fa-
                var get = $.grep(styleeditor.activeElement.element.className.split(" "), function(v, i){

                    return v.indexOf('fa-') === 0;

                }).join();

                //if the icons is being changed, save the old one so we can reset it if needed

                if( get !== $('select#icons').val() ) {

                    $(styleeditor.activeElement.element).uniqueId();
                    styleeditor._oldIcon[$(styleeditor.activeElement.element).attr('id')] = get;

                }

                $(styleeditor.activeElement.element).removeClass( get ).addClass( $('select#icons').val() );


                /* SANDBOX */

                if( styleeditor.activeElement.sandbox ) {

                    elementID = $(styleeditor.activeElement.element).attr('id');
                    $('#'+styleeditor.activeElement.sandbox).contents().find('#'+elementID).removeClass( get ).addClass( $('select#icons').val() );

                }

                /* END SANDBOX */

            }

            //video URL
            if( $(styleeditor.activeElement.element).attr('data-type') === 'video' ) {

                if( $('input#youtubeID').val() !== '' ) {

                    $(styleeditor.activeElement.element).prev().attr('src', "//www.youtube.com/embed/"+$('#video_Tab input#youtubeID').val());

                } else if( $('input#vimeoID').val() !== '' ) {

                    $(styleeditor.activeElement.element).prev().attr('src', "//player.vimeo.com/video/"+$('#video_Tab input#vimeoID').val()+"?title=0&amp;byline=0&amp;portrait=0");

                }

                /* SANDBOX */

                if( styleeditor.activeElement.sandbox ) {

                    elementID = $(styleeditor.activeElement.element).attr('id');

                    if( $('input#youtubeID').val() !== '' ) {

                        $('#'+styleeditor.activeElement.sandbox).contents().find('#'+elementID).prev().attr('src', "//www.youtube.com/embed/"+$('#video_Tab input#youtubeID').val());

                    } else if( $('input#vimeoID').val() !== '' ) {

                        $('#'+styleeditor.activeElement.sandbox).contents().find('#'+elementID).prev().attr('src', "//player.vimeo.com/video/"+$('#video_Tab input#vimeoID').val()+"?title=0&amp;byline=0&amp;portrait=0");

                    }

                }

                /* END SANDBOX */

            }

            //forms
            if ( styleeditor.activeElement.element.tagName === 'FORM' ) {

                //sent API or custom action?

                if ( styleeditor.checkboxEmailForm.checked ) {

                    styleeditor.activeElement.element.setAttribute('action', bConfig.sentApiURL + styleeditor.inputEmailFormTo.value);
                    styleeditor.activeElement.element.setAttribute('data-action', 'sentapi');

                    //custom confirmation message?
                    if ( styleeditor.textareaCustomMessage.value !== '' ) {

                        var confirmationInput = document.createElement('input');
                        confirmationInput.type = "hidden";
                        confirmationInput.name = "_confirmation";
                        confirmationInput.value = styleeditor.textareaCustomMessage.value;

                        styleeditor.activeElement.element.appendChild(confirmationInput);

                    } else {

                        //remove possible confirmation input
                        if ( styleeditor.activeElement.element.querySelector('input[name="_confirmation"]') ) styleeditor.activeElement.element.querySelector('input[name="_confirmation"]').remove();

                    }

                } else if ( styleeditor.checkboxCustomAction.checked ) {

                    styleeditor.activeElement.element.setAttribute('action', styleeditor.inputCustomAction.value);
                    styleeditor.activeElement.element.setAttribute('data-action', 'custom');

                    //remove possible confirmation input
                    if ( styleeditor.activeElement.element.querySelector('input[name="_confirmation"]') ) styleeditor.activeElement.element.querySelector('input[name="_confirmation"]').remove();

                }

            }

            //image
            if ( styleeditor.activeElement.element.tagName === 'IMG' ) {

                //lightbox image
                if ( $(styleeditor.activeElement.element).parents(bConfig.imageLightboxWrapper).size() > 0 ) {
                    $(styleeditor.activeElement.element).parents(bConfig.imageLightboxWrapper).find('a').attr(bConfig.imageLightboxAttr, styleeditor.inputCombinedGallery.value);
                }

                //title attribute
                if ( styleeditor.inputImageTitle.value !== '' ) styleeditor.activeElement.element.setAttribute('title', styleeditor.inputImageTitle.value);
                else styleeditor.activeElement.element.removeAttribute('title');

                //alt attribute
                if ( styleeditor.inputImageAlt.value !== '' ) styleeditor.activeElement.element.setAttribute('alt', styleeditor.inputImageAlt.value);
                else styleeditor.activeElement.element.removeAttribute('alt');

            }

            //slideshow
            if ( styleeditor.activeElement.element.parentNode.parentNode.parentNode.hasAttribute('data-carousel-item') ) {

                var theSlideshow = $(styleeditor.activeElement.element).closest('.carousel')[0];

                //auto play
                if ( styleeditor.checkboxSliderAutoplay.checked ) {
                    theSlideshow.setAttribute('data-ride', 'carousel');
                } else {
                    theSlideshow.removeAttribute('data-ride');
                }

                //pause on hover
                if ( styleeditor.checkboxSliderPause.checked ) {
                    theSlideshow.setAttribute('data-pause', 'hover');
                } else {
                    theSlideshow.removeAttribute('data-pause');
                }

                //animation
                if ( styleeditor.selectSliderAnimation.value === 'carousel-fade' && !theSlideshow.classList.contains('carousel-fade') ) {
                    theSlideshow.classList.add('carousel-fade');
                } else {
                    theSlideshow.classList.remove('carousel-fade');
                }

                //interval
                if ( styleeditor.inputSlideInterval.value !== '' ) {
                    theSlideshow.setAttribute('data-interval', styleeditor.inputSlideInterval.value);
                } else {
                    theSlideshow.removeAttribute('data-interval');
                }

                //nav arrows
                theSlideshow.classList.remove('nav-arrows-out');
                theSlideshow.classList.remove('nav-arrows-none');
                theSlideshow.classList.remove('nav-arrows-in');

                if ( styleeditor.selectSliderNavArrows.value === 'nav-arrows-out' ) {
                    theSlideshow.classList.add('nav-arrows-out');
                } else if ( styleeditor.selectSliderNavArrows.value === 'nav-arrows-none' ) {
                    theSlideshow.classList.add('nav-arrows-none');
                } else {
                    theSlideshow.classList.add('nav-arrows-in');
                }

                //nav indicators
                theSlideshow.classList.remove('nav-indicators-out');
                theSlideshow.classList.remove('nav-indicators-none');
                theSlideshow.classList.remove('nav-indicators-in');

                if ( styleeditor.selectSliderNavIndicators.value === 'nav-indicators-out' ) {
                    theSlideshow.classList.add('nav-indicators-out');
                } else if ( styleeditor.selectSliderNavIndicators.value === 'nav-indicators-none' ) {
                    theSlideshow.classList.add('nav-indicators-none');
                } else {
                    theSlideshow.classList.add('nav-indicators-in');
                }

            }

            //Map
            if ( styleeditor.activeElement.element.classList.contains('mapOverlay') && typeof bConfig.google_api !== 'undefined' ) {

                var theMap = $(styleeditor.activeElement.element).prev()[0],
                    apiInfo = {};

                //setup the data attributes
                if ( styleeditor.textareaAddress.value !== '' ) {
                    theMap.setAttribute('data-address', styleeditor.textareaAddress.value);
                } else {
                    theMap.removeAttribute('data-address');
                }

                if ( styleeditor.textareaInfoMessage.value !== '' ) {
                    theMap.setAttribute('data-info-message', styleeditor.textareaInfoMessage.value);
                } else {
                    theMap.removeAttribute('data-info-message');
                }

                if ( styleeditor.inputZoomLevel.value !== 0 ) {
                    theMap.setAttribute('data-zoom', styleeditor.inputZoomLevel.value);
                } else {
                    theMap.removeAttribute('data-zoom');
                }

                if ( styleeditor.checkBoxMapBW.checked ) {
                    theMap.setAttribute('data-style', 'blackandwhite');
                } else {
                    theMap.removeAttribute('data-style');
                }


                //load the Google Maps API
                apiInfo.action = "loadMapAPI";
                apiInfo.key = bConfig.google_api;
                styleeditor.activeElement.parentBlock.frame.contentWindow.postMessage(apiInfo, '*');
                document.getElementById('skeleton').contentWindow.postMessage(apiInfo, '*');

            }

            $('#detailsAppliedMessage').fadeIn(600, function(){

                setTimeout(function(){ $('#detailsAppliedMessage').fadeOut(1000); }, 3000);

            });

            //adjust frame height
            styleeditor.activeElement.parentBlock.heightAdjustment();


            //we've got pending changes
            siteBuilder.site.setPendingChanges(true);

            publisher.publish('onBlockChange', styleeditor.activeElement.parentBlock, 'change');

        },


        /*
            on focus, we'll make the input fields wider
        */
        animateStyleInputIn: function() {

            $(this).css('position', 'absolute');
            $(this).css('right', '0px');
            $(this).animate({'width': '100%'}, 500);
            $(this).focus(function(){
                this.select();
            });

        },


        /*
            on blur, we'll revert the input fields to their original size
        */
        animateStyleInputOut: function() {

            $(this).animate({'width': '42%'}, 500, function(){
                $(this).css('position', 'relative');
                $(this).css('right', 'auto');
            });

        },


        /*
            builds the dropdown with #blocks on this page
        */
        buildBlocksDropdown: function (currentVal) {

            $(styleeditor.selectLinksInernal).select2('destroy');

            if( typeof currentVal === 'undefined' ) currentVal = null;

            var x,
                newOption;

            styleeditor.selectLinksInernal.innerHTML = '';

            newOption = document.createElement('OPTION');
            newOption.innerText = "Choose a block";
            newOption.setAttribute('value', '#');
            styleeditor.selectLinksInernal.appendChild(newOption);

            for ( x = 0; x < siteBuilder.site.activePage.blocks.length; x++ ) {

                var frameDoc = siteBuilder.site.activePage.blocks[x].frameDocument;
                var pageContainer  = frameDoc.querySelector(bConfig.pageContainer);
                var theID = pageContainer.children[0].id;

                newOption = document.createElement('OPTION');
                newOption.innerText = '#' + theID;
                newOption.setAttribute('value', '#' + theID);
                if( currentVal === '#' + theID ) newOption.setAttribute('selected', true);

                styleeditor.selectLinksInernal.appendChild(newOption);

            }

            $(styleeditor.selectLinksInernal).select2({
                minimumResultsForSearch: -1
            });
            $(styleeditor.selectLinksInernal).trigger('change');

            $(styleeditor.selectLinksInernal).off('change').on('change', function () {
                styleeditor.inputCustomLink.value = this.value;
                styleeditor.resetPageDropdown();
            });

        },


        /*
            blur event handler for the custom link input
        */
        inputCustomLinkBlur: function (e) {

            var value = e.target.value,
                x;

            //pages match?
            for ( x = 0; x < styleeditor.selectLinksPages.querySelectorAll('option').length; x++ ) {

                if ( value === styleeditor.selectLinksPages.querySelectorAll('option')[x].value ) {

                    styleeditor.selectLinksPages.selectedIndex = x;
                    $(styleeditor.selectLinksPages).trigger('change').select2();

                }

            }

            //blocks match?
            for ( x = 0; styleeditor.selectLinksInernal.querySelectorAll('option').length; x++ ) {

                if ( value === styleeditor.selectLinksInernal.querySelectorAll('option')[x].value ) {

                    styleeditor.selectLinksInernal.selectedIndex = x;
                    $(styleeditor.selectLinksInernal).trigger('change').select2();

                }

            }

        },


        /*
            focus event handler for the custom link input
        */
        inputCustomLinkFocus: function () {

            styleeditor.resetPageDropdown();
            styleeditor.resetBlockDropdown();

        },


        /*
            builds the dropdown with pages to link to
        */
        buildPagesDropdown: function (currentVal) {

            $(styleeditor.selectLinksPages).select2('destroy');

            if( typeof currentVal === 'undefined' ) currentVal = null;

            var x,
                newOption;

            styleeditor.selectLinksPages.innerHTML = '';

            newOption = document.createElement('OPTION');
            newOption.innerText = "Choose a page";
            newOption.setAttribute('value', '#');
            styleeditor.selectLinksPages.appendChild(newOption);

            for( x = 0; x < siteBuilder.site.sitePages.length; x++ ) {

                newOption = document.createElement('OPTION');
                newOption.innerText = siteBuilder.site.sitePages[x].name;
                newOption.setAttribute('value', siteBuilder.site.sitePages[x].name + '.html');
                if( currentVal === siteBuilder.site.sitePages[x].name + '.html') newOption.setAttribute('selected', true);

                styleeditor.selectLinksPages.appendChild(newOption);

            }

            $(styleeditor.selectLinksPages).select2({
                minimumResultsForSearch: -1
            });
            $(styleeditor.selectLinksPages).trigger('change');

            $(styleeditor.selectLinksPages).off('change').on('change', function () {
                styleeditor.inputCustomLink.value = this.value;
                styleeditor.resetBlockDropdown();
            });

        },


        /*
            reset the block link dropdown
        */
        resetBlockDropdown: function () {

            styleeditor.selectLinksInernal.selectedIndex = 0;
            $(styleeditor.selectLinksInernal).select2('destroy').select2();

        },


        /*
            reset the page link dropdown
        */
        resetPageDropdown: function () {

            styleeditor.selectLinksPages.selectedIndex = 0;
            $(styleeditor.selectLinksPages).select2('destroy').select2();

        },


        /*
            when the clicked element is an anchor tag (or has a parent anchor tag)
        */
        editLink: function(el) {

            var theHref;

            $('a#link_Link').parent().show();

            //set theHref
            if( $(el).prop('tagName') === 'A' ) {

                theHref = $(el).attr('href');

            } else if( $(el).parent().prop('tagName') === 'A' ) {

                theHref = $(el).parent().attr('href');

            }

            if ( $(el).closest(bConfig.navSelector).size() === 1) {

                styleeditor.inputLinkActive.parentNode.style.display = 'block';

                //link is active?
                if ( el.parentNode.classList.contains(bConfig.navActiveClass) ) {
                    //$(styleeditor.inputLinkActive).radiocheck('checked');
                    $(styleeditor.inputLinkActive).prop('checked', true);
                } else {
                    //$(styleeditor.inputLinkActive).radiocheck('unchecked');
                    $(styleeditor.inputLinkActive).prop('checked', false);
                }

            } else {

                styleeditor.inputLinkActive.parentNode.style.display = 'none';

            }

            styleeditor.buildPagesDropdown(theHref);
            styleeditor.buildBlocksDropdown(theHref);
            styleeditor.inputCustomLink.value = theHref;

            //grab an image?
            if ( el.querySelector('img') ) styleeditor.linkImage = el.querySelector('img');
            else styleeditor.linkImage = null;

            //grab an icon?
            if ( el.querySelector('.fa') ) styleeditor.linkIcon = el.querySelector('.fa').cloneNode(true);
            else styleeditor.linkIcon = null;

            styleeditor.inputLinkText.value = el.innerText;

        },


        /*
            when the clicked element is an image
        */
        editImage: function(el) {

            $('a#img_Link').parent().show();

            //set the current SRC
            $('.imageFileTab').find('input#imageURL').val( $(el).attr('src') );

            //reset the file upload
            $('.imageFileTab').find('a.fileinput-exists').click();

            //are we dealing with a lightbox image?
            if ( $(el).parents(bConfig.imageLightboxWrapper).size() > 0 ) {
                if ( $(el).parents(bConfig.imageLightboxWrapper).find('a')[0].hasAttribute( bConfig.imageLightboxAttr ) ) {
                   styleeditor.inputCombinedGallery.value = $(el).parents(bConfig.imageLightboxWrapper).find('a').attr( bConfig.imageLightboxAttr );
                } else {
                    styleeditor.inputCombinedGallery.value = "";
                }
                styleeditor.inputCombinedGallery.style.display = 'block';
            } else {
                styleeditor.inputCombinedGallery.value = "";
                styleeditor.inputCombinedGallery.style.display = 'none';
            }

            //image title
            if ( el.hasAttribute('title') ) styleeditor.inputImageTitle.value = el.getAttribute('title');

            //image alt
            if ( el.hasAttribute('alt') ) styleeditor.inputImageAlt.value = el.getAttribute('alt');

        },


        /*
            when the clicked element is a video element
        */
        editVideo: function(el) {

            var matchResults;

            $('a#video_Link').parent().show();
            $('a#video_Link').click();

            //inject current video ID,check if we're dealing with Youtube or Vimeo

            if( $(el).prev().attr('src').indexOf("vimeo.com") > -1 ) {//vimeo

                matchResults = $(el).prev().attr('src').match(/player\.vimeo\.com\/video\/([0-9]*)/);

                $('#video_Tab input#vimeoID').val( matchResults[matchResults.length-1] );
                $('#video_Tab input#youtubeID').val('');

            } else {//youtube

                //temp = $(el).prev().attr('src').split('/');
                var regExp = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
                matchResults = $(el).prev().attr('src').match(regExp);

                $('#video_Tab input#youtubeID').val( matchResults[1] );
                $('#video_Tab input#vimeoID').val('');

            }

        },


        /*
            when the clicked element is an fa icon
        */
        editIcon: function() {

            $('a#icon_Link').parent().show();

            //get icon class name, starting with fa-
            var get = $.grep(this.activeElement.element.className.split(" "), function(v, i){

                return v.indexOf('fa-') === 0;

            }).join();

            $('select#icons option').each(function(){

                if( $(this).val() === get ) {

                    $(this).attr('selected', true);

                    $('#icons').trigger('chosen:updated');

                }

            });

        },


        editNavbar: function (element) {

            var links,
                buttons;

            $('a#menuitems_Link').parent().show();

            //retrieve the links

            if ( styleeditor.activeElement.element.hasAttribute('class') ) {

                if ( styleeditor.activeElement.element.getAttribute('class').indexOf('sbpro-navbar-left') !== -1 ) {

                    links = styleeditor.activeElement.element.querySelectorAll('.collapse > ul:nth-child(1) a:not(.btn)');
                    buttons = styleeditor.activeElement.element.querySelectorAll('.collapse a.btn');

                } else if ( styleeditor.activeElement.element.getAttribute('class').indexOf('sbpro-navbar-left-right') !== -1 ) {

                    links = styleeditor.activeElement.element.querySelectorAll('.collapse > ul:nth-child(1) a:not(.btn)');
                    buttons = styleeditor.activeElement.element.querySelectorAll('.collapse a.btn');

                } else if ( styleeditor.activeElement.element.getAttribute('class').indexOf('sbpro-navbar-right') !== -1 ) {

                    links = styleeditor.activeElement.element.querySelectorAll('.collapse > ul:nth-child(2) a:not(.btn)');
                    buttons = styleeditor.activeElement.element.querySelectorAll('.collapse a.btn');

                } else if ( styleeditor.activeElement.element.getAttribute('class').indexOf('sbpro-navbar-centered') !== -1 ) {

                    links = styleeditor.activeElement.element.querySelectorAll('.collapse > ul:nth-child(1) a:not(.btn)');
                    buttons = styleeditor.activeElement.element.querySelectorAll('.collapse a.btn');

                }

            }

            //console.log("links", links);
            //console.log("buttons", buttons);

        },


        editForm: function (form) {

            var email;

            $('a#form_Link').parent().show();

            if ( form.hasAttribute('data-action') ) {

                if ( form.getAttribute('data-action') === 'sentapi' ) {

                    email = form.getAttribute('action').replace(bConfig.sentApiURL, '');

                    styleeditor.checkboxEmailForm.checked = true;
                    styleeditor.inputEmailFormTo.removeAttribute('disabled');
                    styleeditor.textareaCustomMessage.removeAttribute('disabled');
                    styleeditor.inputEmailFormTo.value = email;
                    styleeditor.checkboxCustomAction.checked = false;
                    styleeditor.inputCustomAction.value = "";
                    styleeditor.inputCustomAction.setAttribute('disabled', false);

                    //confirmation input?
                    if ( form.querySelector('input[name="_confirmation"]') ) {
                        styleeditor.textareaCustomMessage.value = form.querySelector('input[name="_confirmation"]').value;
                    }

                } else if ( form.getAttribute('data-action') === 'custom' ) {

                    styleeditor.checkboxEmailForm.checked = false;
                    styleeditor.inputEmailFormTo.setAttribute('disabled', true);
                    styleeditor.textareaCustomMessage.setAttribute('disabled', true);
                    //styleeditor.inputEmailFormTo.value = "";
                    styleeditor.textareaCustomMessage.value = "";
                    styleeditor.checkboxCustomAction.checked = true;
                    styleeditor.inputCustomAction.value = form.getAttribute('action');
                    styleeditor.inputCustomAction.removeAttribute('disabled');

                }

            } else {

                //nothing set, disable both options
                styleeditor.checkboxEmailForm.checked = false;
                styleeditor.inputEmailFormTo.setAttribute('disabled', true);
                styleeditor.textareaCustomMessage.setAttribute('disabled', true);
                //styleeditor.inputEmailFormTo.value = "";
                styleeditor.textareaCustomMessage.value = "";
                styleeditor.checkboxCustomAction.checked = false;
                styleeditor.inputCustomAction.value = "";
                styleeditor.inputCustomAction.setAttribute('disabled', false);

            }

        },


        editSlideshow: function (slideshow) {

            $('a#slideshow_Link').parent().show();

            //auto play
            if ( slideshow.hasAttribute('data-ride') && slideshow.getAttribute('data-ride') === 'carousel' ) {
                $(styleeditor.checkboxSliderAutoplay).bootstrapSwitch('state', true, true);
            } else {
                $(styleeditor.checkboxSliderAutoplay).bootstrapSwitch('state', false, true);
            }

            //pause on hover
            if ( slideshow.hasAttribute('data-pause') && slideshow.getAttribute('data-pause') === 'hover' ) {
                $(styleeditor.checkboxSliderPause).bootstrapSwitch('state', true, true);
            } else {
                $(styleeditor.checkboxSliderPause).bootstrapSwitch('state', false, true);
            }

            //animation
            if ( slideshow.classList.contains('carousel-fade') ) {
                styleeditor.selectSliderAnimation.value = "carousel-fade";
            } else {
                styleeditor.selectSliderAnimation.value = "";
            }
            $(styleeditor.selectSliderAnimation).trigger('change');

            //interval
            if ( slideshow.hasAttribute('data-interval') ) {
                styleeditor.inputSlideInterval.value = slideshow.getAttribute('data-interval');
            } else {
                styleeditor.inputSlideInterval.value = "";
            }

            //nav arrows
            if ( slideshow.classList.contains('nav-arrows-out') ) {
                styleeditor.selectSliderNavArrows.value = 'nav-arrows-out';
            } else if ( slideshow.classList.contains('nav-arrows-none') ) {
                styleeditor.selectSliderNavArrows.value = 'nav-arrows-none';
            } else {
                styleeditor.selectSliderNavArrows.value = 'nav-arrows-in';
            }
            $(styleeditor.selectSliderNavArrows).trigger('change');

            //nav indicators
            if ( slideshow.classList.contains('nav-indicators-out') ) {
                styleeditor.selectSliderNavIndicators.value = 'nav-indicators-out';
            } else if ( slideshow.classList.contains('nav-indicators-none') ) {
                styleeditor.selectSliderNavIndicators.value = 'nav-indicators-none';
            } else {
                styleeditor.selectSliderNavIndicators.value = 'nav-indicators-in';
            }
            $(styleeditor.selectSliderNavIndicators).trigger('change');

        },

        editMap: function (map) {

            $('a#map_Link').parent().show();

            if ( map.hasAttribute('data-address') ) styleeditor.textareaAddress.value = map.getAttribute('data-address');

            if ( map.hasAttribute('data-info-message') ) styleeditor.textareaInfoMessage.value = map.getAttribute('data-info-message');

            if ( map.hasAttribute('data-zoom') ) styleeditor.inputZoomLevel.value = map.getAttribute('data-zoom');

            if ( map.hasAttribute('data-style') && map.getAttribute('data-style') === 'blackandwhite' ) {
                $(styleeditor.checkBoxMapBW).bootstrapSwitch('state', true, true);
            } else {
                $(styleeditor.checkBoxMapBW).bootstrapSwitch('state', false, true);
            }

        },


        /*
            delete selected element
        */
        deleteElement: function() {

            publisher.publish('onBeforeDelete');

            var toDel,
                daddy,
                slideShowDeleted = false;


            //determine what to delete
            if ( styleeditor.activeElement.element.parentNode.parentNode.parentNode.hasAttribute('data-carousel-item') ) {

                toDel = $(styleeditor.activeElement.element.parentNode.parentNode.parentNode);

                slideShowDeleted = true;

            } else if( $(styleeditor.activeElement.element).prop('tagName') === 'A' ) {//ancor

                if( $(styleeditor.activeElement.element).parent().prop('tagName') ==='LI' ) {//clone the LI

                    toDel = $(styleeditor.activeElement.element).parent();

                } else {

                    toDel = $(styleeditor.activeElement.element);

                }

            } else if( $(styleeditor.activeElement.element).prop('tagName') === 'IMG' ) {//image

                if( $(styleeditor.activeElement.element).parent().prop('tagName') === 'A' ) {//clone the A

                    toDel = $(styleeditor.activeElement.element).parent();

                } else {

                    toDel = $(styleeditor.activeElement.element);

                }

            } else if ( styleeditor.activeElement.element.classList.contains('frameCover') ) {//video

                toDel = $(styleeditor.activeElement.element).closest('*[data-component="video"]');

            } else {//everything else

                toDel = $(styleeditor.activeElement.element);

            }

            //remove empty spaces from parent
            daddy = toDel[0].parentNode;


            toDel.fadeOut(500, function(){

                var randomEl = $(this).closest('body').find('*:first'),
                    daddysDaddy;

                toDel.remove();

                /* SANDBOX */

                var elementID = $(styleeditor.activeElement.element).attr('id');

                $('#'+styleeditor.activeElement.sandbox).contents().find('#'+elementID).remove();

                /* END SANDBOX */

                if ( slideShowDeleted && typeof bConfig.rebuildSlideshowNavigation === 'function' ) bConfig.rebuildSlideshowNavigation( $(daddy).closest('.carousel')[0] );

                styleeditor.activeElement.parentBlock.heightAdjustment();

                //we've got pending changes
                siteBuilder.site.setPendingChanges(true);

                if ( daddy.hasAttribute('data-component') && daddy.querySelectorAll('*').length === 0 ) {

                    daddysDaddy = daddy.parentNode;

                    daddy.remove();

                    if (daddysDaddy.querySelectorAll('*').length === 0) daddysDaddy.innerHTML = '';

                } else {

                    if (daddy.querySelectorAll('*').length === 0) daddy.innerHTML = '';

                }

                

                //if daddy is an empty data-component, delete it
                if ( daddy.hasAttribute('data-component') && daddy.querySelectorAll('*').length === 0 ) daddy.remove();

            });

            $('#deleteElement').modal('hide');

            styleeditor.closeStyleEditor();

            publisher.publish('onBlockChange', styleeditor.activeElement.parentBlock, 'change');

        },


        /*
            clones the selected element
        */
        cloneElement: function() {

            publisher.publish('onBeforeClone');

            var theClone, theClone2, theOne, cloned, elementID, slideShowCloned = false;

            styleeditor.activeElement.removeOutline();

            if( styleeditor.activeElement.element.hasAttribute('data-parent') ) {//clone the parent element

                theClone = $(styleeditor.activeElement.element).parent().clone();
                theClone.find( $(styleeditor.activeElement.element).prop('tagName') ).attr('style', '');

                theClone2 = $(styleeditor.activeElement.element).parent().clone();
                theClone2.find( $(styleeditor.activeElement.element).prop('tagName') ).attr('style', '');

                theOne = theClone.find( $(styleeditor.activeElement.element).prop('tagName') );
                cloned = $(styleeditor.activeElement.element).parent();

            } else if ( styleeditor.activeElement.element.tagName === 'LI' ) {

                theClone = $(styleeditor.activeElement.element).clone();

                theClone2 = $(styleeditor.activeElement.element).clone();

                theOne = theClone;
                cloned = $(styleeditor.activeElement.element);

            } else if (styleeditor.activeElement.element.parentNode.parentNode.parentNode.hasAttribute('data-carousel-item')) {

                theClone = $(styleeditor.activeElement.element.parentNode.parentNode.parentNode).clone();

                theClone.removeClass('active');

                theOne = theClone.find( $(styleeditor.activeElement.element).prop('tagName') );

                cloned = $(styleeditor.activeElement.element.parentNode.parentNode.parentNode);

                slideShowCloned = theClone;

            } else if ( styleeditor.activeElement.element.hasAttribute('data-component') && styleeditor.activeElement.element.getAttribute('data-component') === 'grid' ) {

                theClone = $(styleeditor.activeElement.element).closest('*[data-component]').clone();
                theOne = theClone;

                cloned = $(styleeditor.activeElement.element);

            } else if ( $(styleeditor.activeElement.element).closest('*[data-component]')[0] !== undefined ) {

                theClone = $(styleeditor.activeElement.element).closest('*[data-component]').clone();

                if ( $(styleeditor.activeElement.element).closest('*[data-component]').attr('data-component') === 'video' ) {
                    theOne = theClone.find('.frameCover');
                } else {
                    theOne = theClone.find( $(styleeditor.activeElement.element).prop('tagName') );
                }

                cloned = $(styleeditor.activeElement.element).closest('*[data-component]');

            } else {//clone the element itself

                theClone = $(styleeditor.activeElement.element).clone();

                //theClone.attr('style', '');

                /*if( styleeditor.activeElement.sandbox ) {
                    theClone.attr('id', '').uniqueId();
                }*/

                theClone2 = $(styleeditor.activeElement.element).clone();
                //theClone2.attr('style', '');

                /*
                if( styleeditor.activeElement.sandbox ) {
                    theClone2.attr('id', theClone.attr('id'));
                }*/

                theOne = theClone;
                cloned = $(styleeditor.activeElement.element);

            }

            theOne[0].classList.remove('sb_open');

            cloned.after( theClone );

            /* SANDBOX */

            if( styleeditor.activeElement.sandbox ) {

                elementID = $(styleeditor.activeElement.element).attr('id');
                $('#'+styleeditor.activeElement.sandbox).contents().find('#'+elementID).after( theClone2 );

            }

            /* END SANDBOX */

            //make sure the new element gets the proper events set on it
            var newElement = new canvasElement(theOne.get(0));
            newElement.setParentBlock();
            newElement.activate();
            newElement.unsetNoIntent();

            styleeditor.setupCanvasElements( styleeditor.activeElement.parentBlock );

            //possible height adjustments
            if ( typeof styleeditor.activeElement.parentBlock.heightAdjustment === 'function' ) styleeditor.activeElement.parentBlock.heightAdjustment();

            //we've got pending changes
            siteBuilder.site.setPendingChanges(true);

            publisher.publish('onBlockChange', styleeditor.activeElement.parentBlock, 'change');

            if ( slideShowCloned && typeof bConfig.rebuildSlideshowNavigation === 'function' ) bConfig.rebuildSlideshowNavigation( $(styleeditor.activeElement.element).closest('.carousel')[0] );

        },


        /*
            resets the active element
        */
        resetElement: function() {

            if( $(styleeditor.activeElement.element).closest('body').width() !== $(styleeditor.activeElement.element).width() ) {

                $(styleeditor.activeElement.element).attr('style', '').css({'outline': '3px dashed red', 'cursor': 'pointer'});

            } else {

                $(styleeditor.activeElement.element).attr('style', '').css({'outline': '3px dashed red', 'outline-offset':'-3px', 'cursor': 'pointer'});

            }

            /* SANDBOX */

            if( styleeditor.activeElement.sandbox ) {

                var elementID = $(styleeditor.activeElement.element).attr('id');
                $('#'+styleeditor.activeElement.sandbox).contents().find('#'+elementID).attr('style', '');

            }

            /* END SANDBOX */

            $('#styleEditor form#stylingForm').height( $('#styleEditor form#stylingForm').height()+"px" );

            $('#styleEditor form#stylingForm .form-group:not(#styleElTemplate)').fadeOut(500, function(){

                $(this).remove();

            });


            //reset icon

            if( styleeditor._oldIcon[$(styleeditor.activeElement.element).attr('id')] !== null ) {

                var get = $.grep(styleeditor.activeElement.element.className.split(" "), function(v, i){

                    return v.indexOf('fa-') === 0;

                }).join();

                $(styleeditor.activeElement.element).removeClass( get ).addClass( styleeditor._oldIcon[$(styleeditor.activeElement.element).attr('id')] );

                $('select#icons option').each(function(){

                    if( $(this).val() === styleeditor._oldIcon[$(styleeditor.activeElement.element).attr('id')] ) {

                        $(this).attr('selected', true);
                        $('#icons').trigger('chosen:updated');

                    }

                });

            }

            setTimeout( function(){styleeditor.buildeStyleElements( $(styleeditor.activeElement.element).attr('data-selector') );}, 550);

            siteBuilder.site.setPendingChanges(true);

            publisher.publish('onBlockChange', styleeditor.activeElement.parentBlock, 'change');

        },


        resetSelectLinksPages: function() {

            $('#internalLinksDropdown').select2('val', '#');

        },

        resetSelectLinksInternal: function() {

            $('#pageLinksDropdown').select2('val', '#');

        },

        resetSelectAllLinks: function() {

            $('#internalLinksDropdown').select2('val', '#');
            $('#pageLinksDropdown').select2('val', '#');
            this.select();

        },

        /*
            hides file upload forms
        */
        hideFileUploads: function() {

            $('form#imageUploadForm').hide();
            $('#imageModal #uploadTabLI').hide();

        },


        /*
            closes the style editor
        */
        closeStyleEditor: function (e) {

            if ( e !== undefined ) e.preventDefault();

            if ( styleeditor.activeElement.editableAttributes && styleeditor.activeElement.editableAttributes.indexOf('content') === -1 ) {
                styleeditor.activeElement.removeOutline();
                styleeditor.activeElement.activate();
            }

            if ( styleeditor.styleEditor.classList.contains('open') ) {

                styleeditor.toggleSidePanel('close');

            }

        },


        /*
            toggles the side panel
        */
        toggleSidePanel: function(val) {

            if ( val === 'open' ) styleeditor.styleEditor.classList.add('open');
            else if ( val === 'close' ) styleeditor.styleEditor.classList.remove('open');

            //height adjustment
            setTimeout(function(){
                siteBuilder.site.activePage.heightAdjustment();
            }, 1000);

        },

    };

    styleeditor.init();

    exports.styleeditor = styleeditor;

}());