!function ($) {

    "use strict";

    $(document).ready(function(){

        var $aboutauthor = $('.about-author');
        var $gallerywrap = $('.gallery-wrap');
        var $modalfooter = $('.modal-footer');


        $('.page-id-1519 .listing-item, .page-id-1460 .listing-item').on('click', function (e) {

            e.preventDefault();

            $('#right_modal_lg').modal('toggle');
            var $_prodID = $(this).parent().data('id');
            var $psttype = $(this).parent().data('posttype');

            loadProductSingle($_prodID,$psttype);

        });

        function loadProductSingle(prodID, posttype){


            var modalcontent = $('.modal-content');

            var loader = '<div class="loader-wrap">'+
                            '<div class="cv-spinner">'+
                             '<span class="spinner"></span>'+
                            '</div>'+
                         '</div>';

                $.ajax({
                url: am_product_ajaxurl,
                method: 'post',
                type: 'json',
                headers : {
                    'CsrfToken': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    action: 'load_product',
                    security: nonceproduct,
                    prodID: prodID,
                    psttype: posttype
                },
                beforeSend: function() {
                    //$($aboutauthor).html('');
                    //$($gallerywrap).html('');
                    //$(modalcontent).addClass('bef');
                    $(modalcontent).prepend(loader);


                },
                success: function(response) {

                    var loaderwrap = $('.loader-wrap');

                    $(loaderwrap).remove();

                    var $latitude = response.data.latitude;
                    var $longitude = response.data.longitude;
                    var $title = response.data.title;
                    var $title_br = response.data.title_br;
                    var $subtitle = response.data.subtitle;
                    var $description = response.data.description;
                    var $adresse = response.data.adresse;
                    var $phone = response.data.phone;
                    var $mail = response.data.mail;
                    var $site_web = response.data.site_web;
                    var $social_share = response.data.social_share;
                    var $gallerys = response.data.gallery;
                    var $price_regular = response.data.price_regular;
                    var $picture = response.data.picture;

                    /**
                     *
                     * ***/



                    var output1 =
                        '<img src="'+ $picture +'" class="avatar avatar-90 photo" alt="tof" width="100%" height="100%">'+
                            '<div class="about-description">'+
                                '<h3 class="title-princing-table">'+ $title +'</h3>'+
                                    '<hr>'+
                                    '<span class="period"><i class="fas fa-map-marker-alt"></i> '+ $adresse +'<br>'+ $subtitle +'</span>'+
                            '<div>'+
                                    '<hr>'+
                        '<div class="description">'+ $description +'</div>';

                    var output2 =
                        '<div class="gallery">' +
                        '<h3 class="title-section">Galerie</h3>' +
                            '<div class="gal">';
                                $.each($gallerys, function (i, item) {
                                    output2 +=  '<div class="photoGal" style="height: 300px;background: url('+ item +')no-repeat center;background-size: cover"></div>';
                                });
                        output2 += '</div>'+
                            '</div>';

                    var output3 =
                        '<div class="price">' +
                        '<h3 class="title-section">Tarifs</h3>' +
                        '<div class="price-inner">';
                            for (var i = 0; i < $price_regular.length; i++) {
                                var price = $price_regular[i];
                                output3 +=  '<div class="px">'+ price.prix +'</div>';
                            }
                        output3 += '</div>'+
                            '</div>';

                        $($aboutauthor).html(output1);

                        if($gallerys === false){
                            $($gallerywrap).html('');
                        }else{
                            $($gallerywrap).html(output2);
                            $('.gal').slick({
                                slidesToShow: 3,
                                slidesToScroll:3,
                                autoplay: true,
                                autoplaySpeed: 3000,
                                arrows: false,
                                dots: true
                            });
                        }

                        if($price_regular.length > 0){
                            $($modalfooter).html(output3);
                        }else{
                            $($modalfooter).html('');
                        }

                        if(!isEmpty($latitude) && !isEmpty($longitude)){
                            buildMap($latitude,$longitude,$title,$picture,$title,$adresse);
                        }


                },
                error: function (request, status, error) {

                }
            })
        }

    });

    function renderMarker(image,titleM,adresse){
        var outpt = '';

        outpt += '<div class="leaflet-popup-content-wrapper">'+
                   '<div class="leaflet-popup-content" style="width: 271px;">'+
                    '<img src="'+ image +'" alt="" />'+
                    '<div class="leaflet-listing-item-content">'+
                        '<h3>'+ titleM +'</h3>'+
                        '<span>'+ adresse +'</span>'+
                    '</div>'+
                   '</div>'+
                  '</div>';

        return outpt;

    }

    function buildMap(lat,lon,title,image,titleM,adresse)  {

        var greenIcon = L.icon({
            iconUrl: 'https://dev.amneville.com/wp-content/plugins/atomix-manager/assets/css/leaflet/images/marker-icon-2x.png',
            shadowUrl: 'https://dev.amneville.com/wp-content/plugins/atomix-manager/assets/css/leaflet/images/marker-shadow.png',

            iconSize:     [25,41], // size of the icon
            shadowSize:   [41, 41], // size of the shadow
            iconAnchor:   [12,41], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 22],  // the same for the shadow
            popupAnchor:  [1,-34], // point from which the popup should open relative to the iconAnchor*/
            tooltipAnchor:[16,-28] //
        });


        document.getElementById('carte').innerHTML = "<div id='map' style='width: 100%; height: 100%;'></div>";
        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttribution = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,' +
                ' <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            osmLayer = new L.tileLayer(osmUrl, {maxZoom: 30, attribution: osmAttribution});



        var map = new L.Map('map', {
            fullscreenControl: true,
            fullscreenControlOptions: {
                position: 'topleft'
            }}).setView([lat, lon], 12);

        L.marker([lat, lon], {icon: greenIcon}).addTo(map)
            .bindPopup(renderMarker(image,titleM,adresse))
            .bindTooltip(title, {permanent: false, direction: 'top'});

        map.addLayer(osmLayer);


    }

    function isEmpty(str) {
        return (!str || str.length === 0 );
    }



}(jQuery);