




(function ($) {

    "use strict";


    var collectchat = collectchat || {};
    collectchat.ready = function() {
        if(collectchat.is('open')) {
            console.log('Collect.chat widget is open');
        }
    }


    $(document).ready(function($){
        new WOW().init();

        //$('select').niceSelect();



          var  vw = $(window).width();
          var   vh = $(window).height();

            //$('section.concept-area').height(vh);

        $(".title-more").shorten({
            "showChars" : 50,
            "moreText"	: "Voir plus",
            "lessText"	: "Réduire"
        });


    });

    $(document).ready(function() {

        $(window).load(function() {

            $('#loadOverlay').fadeOut('slow');

        });

    });


    // import vendor/modernizr.js
// import vendor/jquery.js

    $(document).ready(function(){

        $(".navbar-toggler").click(function(){
            $(".main").toggleClass("open");
            $(".menu").toggleClass("open");
        });

        //$(".first-level li:has(ul)").addClass("has-sub-nav").prepend("<div class=\"sub-toggle\"></div>");

      $(".first-level .has-sub-nav a").click(function(){
            $(this).parent().addClass("active");
            $(".nav-container").addClass("show-sub");
        });

       $(".last-level .has-sub-nav .back_").click(function(){
            $(".nav-container").removeClass("show-sub");
            $(".has-sub-nav").removeClass("active");
       });

        $(function() {
            $('.articleHome-col').matchHeight();
        });

    });


    $(document).ready(function () {













        var tabsWrapper = $('.tab-nav');

        var idTabs = $(tabsWrapper).data("tabs");







       /* if(idTabs === 'lien')  {



        } else {








        }*/



        // Give the first class to the first content
        var firstClass = $('.tab-nav li:first').attr('class');
        $('.content:first').addClass(firstClass);

        // Align classes of tabs and contents
        $('.tab-nav li').each(function(index, val) {
            var allClass = $(this).attr('class');
            $('.content').eq(index).addClass(allClass);
        });




        var addTitle = $('.addTitle');


            // On click event to change contents
            $('.tab-nav li a').on('click', function(event) {

            if(idTabs === 'lien'){

            } else {
                event.preventDefault();
            }


            var hrefAttr = $(this).attr('href');
            var colorClass = $(this).parent().attr('class');

            $('.content').removeClass('active');
            $(hrefAttr + '.content').attr('id', hrefAttr.slice(1)).addClass('active');




        });

    });


    /*
     $(document).on('click', ".main.open", function () {
     var mainOffset = $(this).css("right").replace('px', '');
     if (mainOffset > 0) {
     $(".main").removeClass("open");
     $(".menu").removeClass("open");
     };
     });
     */


})(jQuery);




/* Please ❤ this if you like it! */


(function($) { "use strict";

    $(function() {
        var header = $(".start-style");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 10) {
                header.removeClass('start-style').addClass("scroll-on");
            } else {
                header.removeClass("scroll-on").addClass('start-style');
            }
        });
    });

    $(function() {

        var access = $('#access, #top-access');
        var pojo = $('.pojo-a11y-toolbar-link.pojo-a11y-toolbar-toggle-link');


        $(access).on('click', function (event) {
            event.preventDefault();

            $(pojo).trigger('click');
        });


    });

    //Animation

    $(document).ready(function() {
        $('body.hero-anime').removeClass('hero-anime');
    });

    //Menu On Hover

    $('body').on('mouseenter mouseleave','.nav-item',function(e){
        if ($(window).width() > 750) {
            var _d=$(e.target).closest('.nav-item');_d.addClass('show');
            setTimeout(function(){
                _d[_d.is(':hover')?'addClass':'removeClass']('show');
            },1);
        }
    });

    //Switch light/dark

    $("#switch").on('click', function () {
        if ($("body").hasClass("dark")) {
            $("body").removeClass("dark");
            $("#switch").removeClass("switched");
        }
        else {
            $("body").addClass("dark");
            $("#switch").addClass("switched");
        }
    });

    var listItemHeightS = $(".naccs ul:not(liste-elem)")
        .find("li:eq(0)")
        .innerHeight();
    $(".naccs ul:not(liste-elem)").height(listItemHeightS + "px");

    // Acc
    $(document).on("click", ".naccs .menu div", function() {
        var numberIndex = $(this).index();

        console.log(numberIndex);

        if (!$(this).is("active")) {
            $(".naccs .menu div").removeClass("active");
            $(".naccs ul li").removeClass("active");

            $(this).addClass("active");
            $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

            var listItemHeight = $(".naccs ul")
                .find("li:eq(" + numberIndex + ")")
                .innerHeight();
            $(".naccs ul").height(listItemHeight + "px");
        }
    });







})(jQuery);


(function($) { "use strict";

    // Default
    $('.example').beefup({
        openSingle: true
    });

    // Open single
    $('.example-opensingle').beefup({
        openSingle: true,
        stayOpen: 'last'
    });

    // Fade animation
    $('.example-fade').beefup({
        animation: 'fade',
        openSpeed: 400,
        closeSpeed: 400
    });

    // Scroll
    $('.example-scroll').beefup({
        scroll: true,
        scrollOffset: -10
    });

    // Self block
    $('.example-selfblock').beefup({
        selfBlock: true
    });

    // Self close
    $('.example-selfclose').beefup({
        selfClose: true
    });

    // Breakpoints
    $('.example-breakpoints').beefup({
        scroll: true,
        scrollOffset: -10,
        breakpoints: [
            {
                breakpoint: 768,
                settings: {
                    animation: 'fade',
                    scroll: false
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    animation: 'slide',
                    openSpeed: 800,
                    openSingle: true
                }
            }
        ]
    });

    // API Methods
    var $beefup = $('.example-api').beefup();
    $beefup.open($('#beefup'));

    // Callback
    $('.example-callbacks').beefup({
        onInit: function($el) {
            $el.css('border-color', 'blue');
        },
        onOpen: function($el) {
            $el.css('border-color', 'green');
        },
        onClose: function($el) {
            $el.css('border-color', 'red');
        }
    });

    // Use HTML5 data attributes
    $('.example-data').beefup();

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

    // Dropdown
    var $dropdown = $('.dropdown').beefup({
        animation: 'fade',
        openSingle: true,
        selfClose: true
    });

    // Close dropdown
    $('.dropdown').on('click', 'li', function() {
        $dropdown.close();
    });


    $('.js-preloader').preloadinator({
        minTime: 2000
    });


    $(document).ready(function(){
        // au clic sur un lien
        $('a.dropdown-item').on('click', function(evt){
            // bloquer le comportement par défaut: on ne rechargera pas la page

           // evt.preventDefault();
            // enregistre la valeur de l'attribut  href dans la variable target
            var target = $(this).attr('href');
            /* le sélecteur $(html, body) permet de corriger un bug sur chrome
             et safari (webkit) */
            $('html, body')
            // on arrête toutes les animations en cours
                .stop()
                /* on fait maintenant l'animation vers le haut (scrollTop) vers
                 notre ancre target */
                .animate({scrollTop: $(target).offset().top}, 1000 );
        });
    });





    $( window ).on( "load", function() {
        var aLink = $('.pojo-a11y-toolbar-link.pojo-a11y-btn-resize-font.pojo-a11y-btn-resize-plus');
        var resetaLink = $('.pojo-a11y-toolbar-link.pojo-a11y-btn-reset');
        var strh3 = $('.blog-left-str h3');
        var strh2 = $('.blog-left-str h2');
        var strhp = $('h2.titre-title');

        var wrap_icon = $('#wrap_icon');

        $(aLink).on('click', function (event) {

             $(wrap_icon).addClass('activeFont');
             $(strh3).addClass('plusFont');
             $(strh2).addClass('plusFont');
             $(strhp).addClass('plusFont');

        });

        $(resetaLink).on('click', function (event) {

            $(wrap_icon).removeClass('activeFont');
            $(strh3).removeClass('plusFont');
            $(strh2).removeClass('plusFont');
            $(strhp).removeClass('plusFont');

        });


        var access = $('#access');
        var pojo = $('.pojo-a11y-toolbar-link.pojo-a11y-toolbar-toggle-link');





    });

    new UISearch( document.getElementById( 'sb-search' ) );

    radioChange( $('input[name="efx"]'), $('#nav'), $('#efx-name') );
    radioChange( $('input[name="ease"]'), $('#main-menu'), $('#efx-ease'));

    function radioChange(inputs, addClassTo, appendTo) {
        inputs.hide();
        inputs.on( 'change', function() {
            inputs.each( function() {
                if ( $(this).is(':checked') ) {
                    addClassTo.attr('class', $(this).val() );
                    var radioName = $(this).next('span').text();
                    appendTo.text(radioName);
                }

            });
        });
    }


})(jQuery);