/**
 * Created by Cyril on 29/06/2020.
 */

jQuery(document).ready(function ($) {

    $("#envoyer").click(function(){
        console.log($('.wpcf7-form.init').serializeArray());
    });

    (function ($) {


        var contactpage = $('.page-id-23');


        if($(contactpage).length === 1){


            var sum = 0;


            var allAr = liste.liste;

            //console.log(allAr);

            var objectSelec = $('#objectSelec');


            $(objectSelec)
                .find('option')
                .remove()
                .end();

            for (var item in allAr) {
                sum++;

               var nom = allAr[ item ].contact.nom;
                var email = allAr[ item ].contact.email;

                $(objectSelec).append('<option value="'+ email +'">'+ nom +'</option>').val(email);

            }
           $("#objectSelec").prop("selectedIndex", 0);

            var formContact7 = $('.wpcf7-form');

            var inputFormAll = $(formContact7).find('.form-group input');
            var selectFormAll = $(formContact7).find('.form-group select');

            var tableauFormElements = {};


            $.each($(inputFormAll), function (i, input) {
                console.log(input);
                tableauFormElements[$(input).attr('id')] = input;
            });

            var selectMail = tableauFormElements['selectMail'];
            var selectObjet = tableauFormElements['selectObjet'];


            tableauFormElements['select'] = $(selectFormAll)[0];


            $(selectMail).val($(tableauFormElements['select']).find("option:first-child").val());
            $(selectObjet).val($(tableauFormElements['select']).find("option:first-child").text());




            $(tableauFormElements['select']).change(function () {


                var value = $(this).children("option:selected").val();
                var text = $(this).children("option:selected").text();

                $(selectMail).val(value);
                $(selectObjet).val(text);



            }).trigger('change');

        }







    })(jQuery);



});