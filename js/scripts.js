// import slick from 'slick-carousel';
// import matchHeight from 'jquery-match-height';

(function ($, root, undefined) {
  $(function () {
    "use strict";

    /////////////////////////////////
    ///////  COUNTDOWN TIMER  ///////
    if (typeof launch_date !== "undefined") {
      var now = new Date();
      var diff = launch_date - now;
      if (diff > 0) {
        var span_secondes = $("#span_secondes");
        var span_minutes = $("#span_minutes");
        var span_heures = $("#span_heures");
        var span_jours = $("#span_jours");

        setInterval(function () {
          var now = new Date();
          var diff = launch_date - now;
          if (diff > 0) {
            var seconds = diff / 1000;
            var minutes = seconds / 60;
            var hours = minutes / 60;
            span_secondes.html(Math.floor(seconds) % 60);
            span_minutes.html(Math.floor(minutes) % 60);
            span_heures.html(Math.floor(hours) % 24);
            span_jours.html(Math.floor(hours / 24));
          }
        }, 1000);
      }
    } // if we have launch date

    ////////////////////////////////////////
    ///////  MOBILE MENU NAVIGATION  ///////
    var menu_button = $("#menu_button");
    var menu_navigation = $("#menu_navigation");
    menu_button.on("click", function () {
      menu_navigation.toggleClass("show_menu");
    });
    $(window).on("keyup", function (e) {
      if (e.keyCode === 27) {
        // escape
        hideMenu();
        hideFreeTestPopup();
      }

      if (e.keyCode == 70) {
        // if press f
        openFreeTestPopup();
      }
    });

    function hideMenu() {
      var menu_navigation = $("#menu_navigation");
      menu_navigation.removeClass("show_menu");
    }

    function hideFreeTestPopup() {
      var freetest_popup = $("#freetest_popup");
      freetest_popup.removeClass("visibile_freetest");
    }
    function openFreeTestPopup() {
      var freetest_popup = $("#freetest_popup");
      freetest_popup.addClass("visibile_freetest");
    }

    var freetest_popup = $("#freetest_popup");
    freetest_popup.on("click", function (e) {
      hideFreeTestPopup();
      // clicking on the background
      // if (e.target.nodeName == 'DIV') {
      //     console.log('clicking on background');
      // }
    });

    $(".freetest_opener").on("click", function (e) {
      e.preventDefault();
      openFreeTestPopup();
    });

    $(".blue .column").matchHeight();
    $(".press_item").matchHeight();

    /////////
    // FREQUENCY SWITCHER
    var $payment_freq = "month";
    var $payment_currency = "eur";
    var $boolOuterFreq = $(".payment_frequency .boolean_outer");
    var $boolOuterCurrency = $(".payment_currency .boolean_outer");
    var $pay_monthly = $(".pay_monthly");
    var $pay_annually = $(".pay_annually");
    var $pay_eur = $(".pay_eur");
    var $pay_usd = $(".pay_usd");
    var $pay_links = $(".pay_link");

    updatePayFreq($payment_freq);
    updatePayCurrency($payment_currency);

    $pay_links.on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      if ($this.data("freq") == "year") {
        $payment_freq = "year";
        updatePayFreq($payment_freq);
      } else if ($this.data("freq") == "month") {
        $payment_freq = "month";
        updatePayFreq($payment_freq);
      } else if ($this.data("currency") == "eur") {
        $payment_currency = "eur";
        updatePayCurrency($payment_currency);
      } else if ($this.data("currency") == "usd") {
        $payment_currency = "usd";
        updatePayCurrency($payment_currency);
      }
    });

    $boolOuterFreq.on("click", function () {
      if ($payment_freq == "month") {
        $payment_freq = "year";
      } else {
        $payment_freq = "month";
      }
      updatePayFreq($payment_freq);
    });

    $boolOuterCurrency.on("click", function () {
      if ($payment_currency == "usd") {
        $payment_currency = "eur";
      } else {
        $payment_currency = "usd";
      }
      updatePayCurrency($payment_currency);
    });

    function updatePayFreq(freq) {
      if (freq == "month") {
        $boolOuterFreq.removeClass("active");
        $pay_monthly.addClass("active");
        $pay_annually.removeClass("active");
      } else {
        $boolOuterFreq.addClass("active");
        $pay_monthly.removeClass("active");
        $pay_annually.addClass("active");
      }
    }
    function updatePayCurrency(currency) {
      if (currency == "eur") {
        $boolOuterCurrency.removeClass("active");
        $pay_eur.addClass("active");
        $pay_usd.removeClass("active");
      } else {
        $boolOuterCurrency.addClass("active");
        $pay_eur.removeClass("active");
        $pay_usd.addClass("active");
      }
    }

    // PRESS GALLERY
    // PRESS GALLERY

    $(".cover_image").on("click", function (e) {
      var $this = $(this);
      var $gallery_images = $this.parent().find(".gallery_container a");
      if ($gallery_images) {
        $gallery_images.featherlightGallery({
          galleryFadeIn: 100,
        });
        $gallery_images[0].click(); // open the gallery by clicking on the first one
      }
    });
    // PRESS GALLERY
    // PRESS GALLERY

    // FAQ SLIDER GALLERY
    // $('.slider_gallery').featherlightGallery({
    //   galleryFadeIn: 100
    // });

    $(".faq_gallery_slider").each(function (_i, gallery) {
      $(gallery).featherlightGallery({
        galleryFadeIn: 100,
        filter: ".slider_gallery",
      });
    });

    $.featherlightGallery.prototype.afterContent = function () {
      var caption = this.$currentTarget.find("img").attr("alt");
      this.$instance.find(".caption").remove();
      $('<div class="caption">')
        .text(caption)
        .appendTo(this.$instance.find(".featherlight-content"));
    };

    // FAQ SLIDER GALLERY

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

    $(".school_slider").slick({
      dots: false,
      arrows: true,
      infinite: true,
      speed: 300,
      slidesToShow: 5,
      centerMode: false,
      variableWidth: false,
      adaptiveHeight: true,
      autoplay: true,
      autoplaySpeed: 5000,
      prevArrow: $(".prev"),
      nextArrow: $(".next"),
      responsive: [
        {
          breakpoint: 1000,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
      ],
    });

    var $reviews_sliders = $(".rplg-reviews");
    $reviews_sliders.slick({
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

    var $what_is_savio_sliders = $(
      ".what_is_savio_slider, .interactive_slider, .slider"
    );
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
    $(".scroll_link").on("click", function (e) {
      e.preventDefault();

      var $this = $(this);
      var $href = $this.attr("href");
      var $hash = $href.split("#")[1];

      if (typeof $hash !== "undefined") {
        var $location = $("#" + $hash);
        if ($location.length > 0) {
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

    $(".single_question_link").on("click", function (e) {
      e.preventDefault();
    });
    $(".single_question_title").on("click", function (e) {
      var $this = $(this);
      var $parent_id = $this.data("question");
      openQuestion($parent_id);
    });
    var $hash = window.location.hash;
    if ($hash != "") {
      openQuestion($hash);
    }
    function openQuestion(hash) {
      var $questiontopopen = $(hash);
      var $single_questions = $(".single_question");
      $single_questions.not($questiontopopen).removeClass("question_expanded");
      $questiontopopen.toggleClass("question_expanded");

      setTimeout(() => {
        // dont reinit the same slider twice
        $(".faq_gallery_slider", $questiontopopen)
          .not(".slick-initialized")
          .slick({
            dots: true,
            arrows: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            centerMode: false,
            variableWidth: false,
            adaptiveHeight: false,
            autoplay: false,
            autoplaySpeed: 5000,
          });
      }, 400);

      // resizeWindow(500);
      // resizeWindow(1000);
      // resizeWindow(1500);
    }
    // FAQ
    // FAQ

    // function resizeWindow(i) {
    //   setTimeout(() => {
    //     $(window).trigger('resize'); // for slider
    //   }, i);

    // }
  });
})(jQuery, this);
