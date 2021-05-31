


(function($) {


    var tabsWrapper = $('.tab-nav');
    var idTabs = $(tabsWrapper).data("tabs");


    if(idTabs === 'lien')  {



    } else {


        // Call ajax tabs
        var linkOne = $('.tab-nav li a');

        $('#sectpA').append('<div class="preload"><img  src="http://localhost:8888/odas/wp-content/uploads/2020/02/giphy.gif"></div>');
        var preload = $('.preload');

        $(linkOne).on('click', function(e) {

            e.preventDefault();
            e.stopPropagation();



            var idpage = $(this).attr("data-link");
            $(preload).css('display', 'block');

            var title_link = $(this).text();
            var breadcrumb = $('#breadcrumb');

            var sousTitle = $('.head_page .subtitle');


            $.ajax({
                url: ajaxurl,
                type: 'post',
                dataType: 'html',
                cache: false,
                data: {
                    action: 'loadProduct',
                    infoProd: idpage
                },
                beforeSend: function(){

                    $(preload).css('display', 'block');
                    $('#contentTabs').html(' ');
                    $(sousTitle).text(' ');




                 },
                success: function( response ) {



                    $(preload).css('display', 'none');
                    $('#sectpA').html(' ');
                    $('#sectpA').html(response);

                 var findBreadcrumb = $(breadcrumb).find('.addTitle');


                    console.log(findBreadcrumb);


                    if($(findBreadcrumb).length){
                        alert('ok')
                    }

                  /* $(breadcrumb).find('.fa-chevron-right').remove();
                     $(breadcrumb).append('<i class="fas fa-chevron-right"></i> <span class="addTitle"></span>');

                  //var addTitle = $('.addTitle');
                    var addTitle = $('.addTitle');
                    var addTitleText = $(addTitle).text();

                    var link1 = $('.link-1').text();
                    
                    console.log(link1);
                    
                    $(addTitle).text(' ');
                    $(addTitle).text(link1);
                    $(sousTitle).text(addTitleText);*/


                    var extended_ = $('.extended_');
                    if($(extended_).length >= 1 ){




                        var screenDefault, screenWidth, pstFirst, pstLast, left = 18, pstLeft, step, total, pms;


                         pstFirst = $(window).width();
                         screenDefault = 576;


                        if(pstFirst < 576){

                            pstLeft = 0;

                        }else if(pstFirst === 576){

                            pstLeft = left;

                        }else if(pstFirst > 576){


                            step = parseInt(pstFirst) - parseInt(screenDefault);

                            total = parseInt(step) * 0.5;

                            pstLeft = parseInt(left) + (total) - 105;

                            console.log(pstLeft);



                            $(extended_).css({
                                "position" : "relative",
                                "left": "-" + pstLeft + "px",
                                "box-sizing": "border-box",
                                "width": pstFirst,
                                "padding-left": pstLeft + "px",
                                "padding-right": pstLeft + "px"
                            });


                        }

                        //console.log(pstFirst);





                        $(window).resize(function() {




                            pstLast = $(window).width();
                            screenWidth = $(window).width();


                            console.log(screenWidth);


                            step = parseInt(pstLast) - parseInt(pstFirst);


                            console.log(step);

                            if(screenWidth < 576){

                                pstLeft = 0;

                            }else if(screenWidth === 576){

                                pstLeft = left;

                            }else if(screenWidth > 576){


                                total = parseInt(step) * 0.5;

                                pms = parseInt(left) + parseInt(-total);

                                console.log(pms);

                            }

                        });





                       /* $(extended_).css({
                            "position" : "relative",
                            "left": "-255px",
                            "box-sizing": "border-box",
                            "width": screenWidth,
                            "padding-left": "270px",
                            "padding-right": "270px"
                        });*/
                    }



                },
                complete: function(){
                    $(preload).hide();
                }
            });

        });

    }


})(jQuery);



