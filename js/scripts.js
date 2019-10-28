import slick from 'slick-carousel';
import matchHeight from 'jquery-match-height';

(function ($, root, undefined) {

    $(function () {

        'use strict';



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



        $('.blue .column').matchHeight();




        /////////
        // FREQUENCY SWITCHER
        var $payment_freq = 'month';
        var $boolOuter = $('.boolean_outer');
        var $pay_monthly = $('.pay_monthly');
        var $pay_annually =  $('.pay_annually');
        var $pay_links = $('.pay_link');

        $pay_links.on('click', function(e){
            e.preventDefault();
            var $this = $(this);
            if ($this.data('freq') == 'year') {
                $payment_freq = 'year';
            } else {
                $payment_freq = 'month';
            };
            updatePayFreq($payment_freq);

        })



        updatePayFreq($payment_freq);
        $boolOuter.on('click', function(){
            if ($payment_freq  == 'month') {
                $payment_freq = 'year';
            } else {
                $payment_freq = 'month';
            };

            updatePayFreq($payment_freq);

        })

        function updatePayFreq( freq ) {

            if (freq == 'month') {
                $boolOuter.removeClass('active');
                $pay_monthly.addClass('active');
                $pay_annually.removeClass('active');
            } else {
                $boolOuter.addClass('active');
                $pay_monthly.removeClass('active');
                $pay_annually.addClass('active');
            }
            console.log(freq);
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
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 5000,
        });

        var $testimonial_sliders = $(".rplg-reviews");
        $testimonial_sliders.slick({
            dots: true,
            arrows: false,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 5000,
        });

        var $what_is_savio_sliders = $(".what_is_savio_slider, .interactive_slider, .slider");
        $what_is_savio_sliders.slick({
            dots: true,
            arrows: false,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            centerMode: false,
            variableWidth: false,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });


        //////////
        // SLIDERS










    ////////////////////////////
    // animate sliding down page
	$('.scroll_link').on('click', function(e){
		e.preventDefault();

		var $this = $(this);
		var $href = $this.attr('href');
		var $hash = $href.split('#')[1];

		if (typeof $hash !== 'undefined') {
			var $location = $('#' + $hash);
			if($location.length  > 0) {
				$("html, body").animate({ scrollTop: $location.offset().top }, 1000);
			} else {
				window.location.href = $href;
			}
		} else {
			window.location.href = $href;
		}
	});
    ////////////////////////////
    // animate sliding down page



    // FAQ
    // FAQ
    var $single_questions = $('.single_question');
    $('.single_question_link').on('click', function(e){
        e.preventDefault();
    });
    $('.single_question_title').on('click', function(e){
        var $this = $(this);
        var $parent_id = $this.data('question');
        var $parent = $($parent_id);
        $single_questions.not($parent).removeClass('question_expanded');
        $parent.toggleClass('question_expanded');
    });
    // FAQ
    // FAQ






    });

})(jQuery, this);
