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
                    element: document.querySelectorAll('#shift_container .sum-info-top')[0],
                    intro: "This is the page for Cash in - cash out actions and also shows Payment Slip."
                }
            ],
            showBullets: false,
            showStepNumbers: false,
            exitOnOverlayClick: false,
            doneLabel: "Close"
        });

        setTimeout(function(){  intro_welcome.refresh();
            intro_welcome.start();

        }, 1000);
        intro_welcome.onafterchange(function (targetElement) {
            $('.introjs-helperLayer').css({"background-color": 'rgba(255,255,255,.2)'});
        });

        intro_welcome.onbeforechange(function(targetElement) {
            if (intro_welcome._currentStep == 0) {
                $('#shift_container .o-header .icon-add .icon-iconPOS-add').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('z-index','99999998');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});
                }, 100);
            }
            if (intro_welcome._currentStep == 1) {
                $('#popup-open-shift .cancel').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('z-index','99999998');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});
                }, 100);
            }

        });
        intro_welcome.onafterchange(function(targetElement) {
            if (intro_welcome._currentStep == 0) {

            }
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
                },
                {
                    element: document.querySelectorAll('.wrap-grand-total .icon-add .icon-iconPOS-add')[0],
                    intro: "Next, add discount(s) by percent or coupon for the customer's order."
                },
                {
                    element: ('#webpos_cart_discountpopup'),
                    intro: "Next, add discount(s) by percent or coupon for the customer's order."
                },
                {
                    element: document.querySelectorAll('.wrap-grand-total .action-button .checkout')[0],
                    intro: "Next, add discount(s) by percent or coupon for the customer's order."
                },
                {
                    element:  ('#checkout-method'),
                    intro: "Add Shipping Info and choose Payment method."
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
                $('#checkout').click();
                $('#c-button--push-left').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }

            if (intro1._currentStep == 2) {
                $('#c-mask').click();
                $('.order-checkout .remove-icon').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }
            if (intro1._currentStep == 3) {
                $('#product0 .product-img').click();
                $('.wrap-backover').click();
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
            if (intro1._currentStep == 5) {
                $('.wrap-grand-total .icon-add .icon-iconPOS-add').click();
                $('.wrap-backover').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }
            if (intro1._currentStep == 6) {
                $('.wrap-grand-total .icon-add .icon-iconPOS-add').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }
            if (intro1._currentStep == 7) {
                $('.wrap-backover').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
                setTimeout(function(){intro1.nextStep();
                }, 9000);
            }
            if (intro1._currentStep == 8) {

                $('.wrap-grand-total .action-button .checkout').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);

            }

        });

        intro1.onchange(function (targetElement) {
            $('.introjs-helperLayer').css({"background-color": 'rgba(255,255,255,.2)'});
            if (intro1._currentStep == 7) {

            }
        });


    }
    function refunding_order() {
        var intro1 = introJs();
        intro1.setOptions({
            steps: [
                {
                    element: ('#c-button--push-left'),
                    intro: "Open menu."
                },
                {
                    element: ('#orders_history'),
                    intro: "Go to Orders History to start refunding order."
                },
                {
                    element: document.querySelectorAll('.wrap-status-orders .processing')[0],
                    intro: "Click to Order Processing to proceed a refund from customer's order. "
                },
                {
                    element: document.querySelectorAll('#webpos_order_view_container .more-info a')[0],
                    intro: "Click to refund to start."
                },
                {
                    element: document.querySelectorAll('#form-add-note-order .last a')[0],
                    intro: "Click to refund to start."
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
                $('#orders_history').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }
            if (intro1._currentStep == 2) {
                $('.wrap-status-orders .processing a').click();
                //$('#c-mask').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }


        });

        intro1.onchange(function (targetElement) {
            if (intro1._currentStep == 1) {
                $('#orders_history').click();
                setTimeout(function(){  intro1.refresh();
                    jQuery('.introjs-helperLayer').css('pointer-events','none');
                    jQuery('.introjs-overlay').css('pointer-events','none');
                    $('.introjs-helperLayer').css({'background-color':'rgba(255,255,255,.2)'});

                }, 100);
            }
        });


    }

    $("#intro-webpos1").on( 'click', function() {
        intro_welcome();
    });
    $("#intro-webpos2").on( 'click', function() {
        making_order();
    }) ;
    $("#intro-webpos3").on( 'click', function() {
        refunding_order();
    }) ;

    if ( currentLocation == 'magento2/omnichannel-grow-m2/admin/inventorysuccess/stocktaking/new/') {

    }

    keyboardHandler.apply();
});
