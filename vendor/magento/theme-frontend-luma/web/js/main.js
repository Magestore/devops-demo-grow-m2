/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
define([
    'jquery',
    'jquery-intro',
    'mage/smart-keyboard-handler',
    'mage/mage',
    'mage/ie-class-fixer',
    'domReady!'
], function ($,introJs, keyboardHandler) {
    'use strict';


    $(".tutorials-panel .children > a").on( 'click', function() {
        $( this ).parent().children(".sub-menu").slideToggle();
        return false;
    }) ;

    $(".tutorials-panel .clone-pannel").on( 'click', function() {
        $( this ).parents(".tutorials-panel").toggleClass("active");
        $( this ).toggleClass("active");
        $(".open-pannel").removeClass("active");
        return false;
    }) ;

    $(".tutorials-panel a.intro").on( 'click', function() {
        $( ".tutorials-panel .clone-pannel" ).parents(".tutorials-panel").removeClass("active");
        $( ".tutorials-panel .clone-pannel" ).removeClass("active");
        $(".open-pannel").removeClass("active");
        return false;
    }) ;

    $(".open-pannel").on( 'click', function() {
        $(".tutorials-panel").toggleClass("active");
        $( this ).toggleClass("active");

    }) ;




    function addNextTutorialButton(element) {
        jQuery('.introjs-nextbutton').hide();
        jQuery('.introjs-prevbutton').after(''+ '<a href="javascript:void(0);" class="introjs-button introjs-nextbutton introjs-next-tutorial">Next Tutorial</a> ');
        jQuery('.introjs-next-tutorial').click(function(event) {
            element.click();
        });
    }

    function removeNextTutorialButton() {
        if (jQuery('.introjs-next-tutorial') != undefined)
        {
            jQuery('.introjs-next-tutorial').remove();
            jQuery('.introjs-nextbutton').show();
        }
    }

    function scrollToTop(){
        jQuery("html, body").animate({ scrollTop: 0 }, "fast");
    }

    function openAllConfigurationTabs() {
        $('.section-config span +a').each(function(item) {
            if (!item.hasClassName('open'))
                item.click();
        });
    }

    var currentLocation = location.pathname.substr(1);

    function intro_welcome() {
        var intro_welcome = introJs();
        intro_welcome.setOptions({
            steps: [
                {
                    element: ('#popup-open-shift'),
                    intro: "Welcome to the Front-end demo of WebPOS for browser interface! This Open session popup will be automatically enabled before working."
                },
                {
                    element: ('#button open session'),
                    intro: "Welcome to the Front-end demo of WebPOS for browser interface! This Open session popup will be automatically enabled before working."
                },
                {
                    element: ('#vùng sáng cho '),
                    intro: "Welcome to the Front-end demo of WebPOS for browser interface! This Open session popup will be automatically enabled before working."
                },



            ],
            showBullets: false,
            showStepNumbers: false,
            exitOnOverlayClick: false,
            doneLabel: "Close"
        });

        setTimeout(function(){  intro1.refresh();
            intro_welcome.start();

        }, 2000);
        intro1.onafterchange(function (targetElement) {
            $('.introjs-helperLayer').css({"background-color": 'rgba(255,255,255,.2)'});
            if (intro1._currentStep == 1) { addNextTutorialButton($("#btn-close")); }
            if (intro1._currentStep == 3) { addNextTutorialButton($("#c-button--push-left")); }

            if (intro1._currentStep == 4) { addNextTutorialButton($("#checkout")); }


        });

        intro1.onbeforechange(function(targetElement) {
            removeNextTutorialButton();

        });
    }




    function making_order() {
        var intro1 = introJs();
        intro1.setOptions({
            steps: [
                {
                    element: ('#c-button--push-left'),
                    intro: "Open menu."
                },
                {
                    element: ('#checkout'),
                    intro: "Go to Checkout page to start making order. "
                },
                {
                    element: ('#product0'),
                    intro: "Click on the product(s) to add the product(s) to cart. "
                },
                {
                    element: ('#icon-customer-left'),
                    intro: "Click to here to create a new customer on your store."
                },
                {
                    element: ('#popup-change-customer'),
                    intro: "Create new customer account or use available customer on your system. "
                }
            ],
            showBullets:false,
            exitOnOverlayClick:false,
            skipLabel:'Close',
            doneLabel:'Close',
            showStepNumbers:false
        });


        intro1.start();

        intro1.onbeforechange(function (targetElement) {
            if (intro1._currentStep == 0) {
                $('#c-mask').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('z-index','99999998');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});
                }, 100);
            }
            if (intro1._currentStep == 1) {
                $('#c-button--push-left').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }

            if (intro1._currentStep == 2) {
                $('#c-mask').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }
            if (intro1._currentStep == 3) {
                $('#product0').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }
            if (intro1._currentStep == 4) {
                $('#icon-customer-left').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }
        });




    }



    /*$("#intro-webpos1").on( 'click', function() {
        intro_welcome();
    });*/
    $("#intro-webpos2").on( 'click', function() {
        making_order();
    }) ;



    if ( currentLocation == 'magento2/omnichannel-grow-m2/admin/inventorysuccess/stocktaking/new/') {


    }




    keyboardHandler.apply();
});
