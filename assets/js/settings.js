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

    require('./modules/account');

    $('#configHelp').affix({
        offset: {
            top: 200
        }
    });
    
    //set the width for the configHelp
    $('.configHelp').width( $('.configHelp').width() );
                
    //help info
    $('form.settingsForm textarea').focus(function(){

        var theHelp = $(this).closest('.row').find('.configHelp');

        $('div:first', theHelp).html( $(this).next().html() );
            
        theHelp.fadeIn(500);
            
        //set the width for the configHelp
        theHelp.width( theHelp.width() );
            
    });
        
    $('form.settingsForm textarea').blur(function(){
            
        $('#configHelp').hide();
            
    });

    //hash?
    if(window.location.hash) {
        $('#settingsTabs a[href="'+ window.location.hash + '"]').tab('show');
    }

    $('select#payment_gateway').on('change', function () {

        if ( this.value === 'paypal' ) $('#paypalWarningModal').modal('show');

    });

}());