(function () {
	"use strict";

	var siteBuilder = require('./builder.js');
	var appUI = require('./ui.js').appUI;

	var templates = {
        
        ulTemplates: document.querySelector('[data-sidesecond="templates"] .sideSecondInner ul'),
        buttonSaveTemplate: document.getElementById('saveTemplate'),
        buttonSave: document.getElementById('savePage'),
        modalDeleteTemplate: document.getElementById('delTemplateModal'),
    
        init: function() {
                                            
            //make template thumbs draggable
            this.makeDraggable();
            
            $(this.buttonSaveTemplate).on('click', this.saveTemplate);
            
            //listen for the beforeSave event
            $('body').on('siteDataLoaded', function(){
                
                if( siteBuilder.site.is_admin === 1 ) {                
                
                    templates.addDelLinks();
                    $(templates.modalDeleteTemplate).on('show.bs.modal', templates.prepTemplateDeleteModal);
                
                }
                
            });            
            
        },
        
        
        /*
            makes the template thumbnails draggable
        */
        makeDraggable: function() {
            
            $(this.ulTemplates).find('li').each(function(){
        
                $(this).draggable({
                    helper: function() {
                    return $('<div style="height: 100px; width: 300px; background: #F9FAFA; box-shadow: 5px 5px 1px rgba(0,0,0,0.1); text-align: center; line-height: 100px; font-size: 28px; color: #16A085"><span class="fui-list"></span></div>');
                    },
                    revert: 'invalid',
                    appendTo: 'body',
                    connectToSortable: '#pageList > ul:visible',
                    start: function(){
                        
                        siteBuilder.site.activePage.transparentOverlay('on');

                    },
                    stop: function () {

                        siteBuilder.site.activePage.transparentOverlay('off');

                    }
                
                });
                
                //disable click events on child ancors
                $(this).find('a').each(function(){
                    $(this).unbind('click').bind('click', function(e){
                        e.preventDefault();
                    });
                });
            
            });
            
        },
        
        
        /*
            Saves a page as a template
        */
        saveTemplate: function(e) {
                        
            e.preventDefault();
                        
            //disable button
            $(templates.buttonSaveTemplate).addClass('disabled');
            $(templates.buttonSave).find('.bLabel').text( $(templates.buttonSave).attr('data-loading') )
            $(templates.buttonSave).addClass('disabled');

            //remove old alerts
            $('#errorModal .modal-body > *, #successModal .modal-body > *').each(function(){
                $(this).remove();
            });
            
            siteBuilder.site.prepForSave(true);

            var serverData = {};
            serverData.pages = siteBuilder.site.sitePagesReadyForServer;
            serverData.siteData = siteBuilder.site.data;
            serverData.fullPage = "<html>"+$(siteBuilder.site.skeleton).contents().find('html').html()+"</html>";
                        
            //are we updating an existing template or creating a new one?
            serverData.templateID = siteBuilder.builderUI.templateID;
                        
            $.ajax({
                url: appUI.siteUrl+"sites/tsave",
                type: "POST",
                dataType: "json",
                data: serverData
            }).done(function(res){

                
                //enable button			
                $(templates.buttonSaveTemplate).removeClass('disabled');
                $(templates.buttonSave).removeClass('disabled');
                $(templates.buttonSave).find('.bLabel').text( $(templates.buttonSave).attr('data-label') );
                
                if( res.responseCode === 0 ) {
                    
                    $('#errorModal .modal-body').append( $(res.responseHTML) );
                    $('#errorModal').modal('show');
                    siteBuilder.builderUI.templateID = 0;
                
                } else if( res.responseCode === 1 ) {
                    
                    $('#successModal .modal-body').append( $(res.responseHTML) );
                    $('#successModal').modal('show');
                    siteBuilder.builderUI.templateID = res.templateID;
                    
                    //no more pending changes
                    siteBuilder.site.setPendingChanges(false);
                }
            });
        
        },
        
        
        /*
            adds DEL links for admin users
        */
        addDelLinks: function() {
            
            $(this.ulTemplates).find('li').each(function(){
            
                var newLink = $('<a href="#delTemplateModal" data-toggle="modal" data-pageid="'+$(this).attr('data-pageid')+'" class="btn btn-danger btn-sm">DEL</a>');
                $(this).append( newLink );
                
            });
            
        },
            
        
        /*
            preps the delete template modal
        */
        prepTemplateDeleteModal: function(e) {
                        
            var button = $(e.relatedTarget); // Button that triggered the modal
		  	var pageID = button.attr('data-pageid'); // Extract info from data-* attributes
		  	
		  	$('#delTemplateModal').find('#templateDelButton').attr('href', $('#delTemplateModal').find('#templateDelButton').attr('href')+"/"+pageID);
        }
            
    };
    
    templates.init();

    exports.templates = templates;
    
}());