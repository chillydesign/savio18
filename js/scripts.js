import slick from 'slick-carousel';

(function ($, root, undefined) {

    $(function () {

        'use strict';



        ////////////////////////////////////////
        ///////  MOBILE MENU NAVIGATION  ///////
        var menu_button = $('#menu_button');
        var menu_navigation = $('#menu_navigation');
        menu_button.on('click', function(){
            menu_navigation.toggleClass('show_menu');
        });
        $(window).on('keyup', function(e){
            if (e.keyCode === 27) {
                hideMenu();
            }
        });

        function hideMenu() {
            var menu_navigation = $('#menu_navigation');
            menu_navigation.removeClass('show_menu');
        }



        //////////
        // SLIDERS
        var $testimonial_sliders = $(".testimonial_slider");
        $testimonial_sliders.slick({
            dots: true,
            arrows: false,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,
              adaptiveHeight: true
        });
        //////////
        // SLIDERS


        /////////////////////////////////
        ///////  COUNTDOWN TIMER  ///////
        if (typeof launch_date !== 'undefined') {
            var now = new Date();
            var diff = launch_date - now;
            if (diff > 0 ) {

                var span_secondes = $('#span_secondes');
                var span_minutes = $('#span_minutes');
                var span_heures = $('#span_heures');
                var span_jours = $('#span_jours');


                setInterval( function() {
                    var now = new Date();
                    var diff = launch_date - now;
                    if (diff > 0 ) {
                        var seconds = diff / 1000;
                        var minutes = seconds / 60;
                        var hours = minutes / 60;
                        span_secondes.html( Math.floor(seconds) % 60 );
                        span_minutes.html( Math.floor(minutes) % 60 );
                        span_heures.html( Math.floor(hours) % 24 );
                        span_jours.html( Math.floor(hours / 24) );
                    };

                }, 1000 );

            };
        } // if we have launch date











    });

})(jQuery, this);
