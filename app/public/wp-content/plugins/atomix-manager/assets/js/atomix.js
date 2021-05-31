/**
 * Created by Cyril on 05/10/2020.
 */


//console.log('ok');





!function ($) {

    "use strict";

    $(document).ready(function(){

        //$(".top_header").sticky({ topSpacing: 0 });

        var $owl = $('.owl-carousel');
        var $team = $('.team');
        var $serviceuser = $('.service-user');

        if($($team).length === 1){
            $($team).slick({
                centerMode: false,
                centerPadding: '60px',
                slidesToShow: 5,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3,
                            autoplay: true,
                            autoplaySpeed: 3000
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }

        if($($serviceuser).length === 1){
            $($serviceuser).slick({
                centerMode: false,
                centerPadding: '20px',
                slidesToShow: 4,
                prevArrow: '<div class="prev-arrow"><i class="fas fa-chevron-left"></i></div>',
                nextArrow: '<div class="next-arrow"><i class="fas fa-chevron-right"></i></div>',
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }



        /* ===== Logic for creating fake Select Boxes ===== */
        $('.utilisateur').each(function() {
            $(this).children('select').css('display', 'none');

            var $current = $(this);

            $(this).find('option').each(function(i) {
                if (i == 0) {
                    $current.prepend($('<div>', {
                        class: $current.attr('class').replace(/utilisateur/g, 'sel__box')
                    }));

                    var placeholder = $(this).text();
                    $current.prepend($('<span>', {
                        class: $current.attr('class').replace(/utilisateur/g, 'sel__placeholder'),
                        text: placeholder,
                        'data-placeholder': placeholder
                    }));

                    return;
                }

                $current.children('div').append($('<span>', {
                    class: $current.attr('class').replace(/utilisateur/g, 'sel__box__options'),
                    text: $(this).text()
                }));
            });
        });

// Toggling the `.active` state on the `.sel`.
        $('.utilisateur').click(function() {
            $(this).toggleClass('active');
        });

// Toggling the `.selected` state on the options.
        $('.sel__box__options').click(function() {
            var txt = $(this).text();
            var index = $(this).index();

            $(this).siblings('.sel__box__options').removeClass('selected');
            $(this).addClass('selected');

            var $currentSel = $(this).closest('.utilisateur');
            $currentSel.children('.sel__placeholder').text(txt);
            $currentSel.children('select').prop('selectedIndex', index + 1);
        });


        $('.example').beefup({
            animation: 'fade',
            openSpeed: 200,
            openSingle: false,
            openClass: 'is-open',
            stayOpen: 'last'
        });

        // Tabs
        $('.tab__item').beefup({
            animation: '',
            openSingle: true,
            openSpeed: 0,
            closeSpeed: 0,
            onOpen: function($el) {
                // Add active class to tabs
                $('a[href="#' + $el.attr('id') + '"]').parent().addClass(this.openClass)
                    .siblings().removeClass(this.openClass);
            }
        });


        (function() {

            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });

        })();


        /*var stickyElIconbox1 = new Sticksy('.widget.js-sticky-iconbox-1', {
            topSpacing: 100
        })
        stickyElIconbox1.onStateChanged = function (state) {
            if (state === 'fixed') stickyElIconbox1.nodeRef.classList.add('widget--sticky')
            else stickyElIconbox1.nodeRef.classList.remove('widget--sticky')
        }

        var stickyElIconbox2 = new Sticksy('.widget.js-sticky-iconbox-2', {
            topSpacing: 100
        })
        stickyElIconbox2.onStateChanged = function (state) {
            if (state === 'fixed') stickyElIconbox2.nodeRef.classList.add('widget--sticky')
            else stickyElIconbox2.nodeRef.classList.remove('widget--sticky')
        }*/

       if( $('#sect-tabs').length === 1 ){
           Sticksy.initializeAll('.js-sticky-widget', {listen: true,topSpacing: 100});
       }


        $(function() {
            $('.mp').matchHeight();
            $('.listeP').matchHeight();
            $('.card-body').matchHeight();
        });
        /*$owl.owlCarousel({
            items:3,
            autoplay: false,
            loop:true,
            margin:0,
            nav:false,
            responsiveClass:true,
            center: false,
            autoplayHoverPause: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });*/





    });

}(jQuery);