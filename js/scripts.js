// import slick from 'slick-carousel';
// import matchHeight from 'jquery-match-height';

(function ($, root, undefined) {
  $(function () {
    "use strict";

    // SOCIAL LINK SHARING
    // SOCIAL LINK SHARING
    $(".copy_email_button").on("click", function (e) {
      e.preventDefault();

      try {
        var $this = $(this);
        var $parent = $this.parent();
        var $input = $parent.find("input");
        $input.select();
        var copy = document.execCommand("copy");
        if (!copy) return;
        $this.find("em").addClass("visible");
      } catch (err) {
        // do nothing
      }
    });

    // secure file form downloader

    $(".secure_file_form_start").on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      var $parent = $this.parent();
      $parent.addClass("visible");
    });

    $(".secure_file_form_container").on("submit", function (e) {
      e.preventDefault();
      let $this = $(this);

      const action = $this.attr("action");
      const method = $this.attr("method");
      const $fields = $("input", $this);
      const data = {};
      $fields.each(function (i) {
        const $f = $(this);
        const name = $f.attr("name");
        const val = $f.val();
        data[name] = val;
      });

      doFetch(action, method, data)
        .then((response) => {
          console.log(response);
          if (response) {
            console.log(response);
            $(".button", $this).attr({ href: response });
            $this.addClass("showButton");
            $this.removeClass("errorOccurred");
          }
        })
        .catch((error) => {
          console.log(error);
          $this.removeClass("showButton");
          $this.addClass("errorOccurred");
        });
    });

    // secure file form downloader

    // /////////////////////////////////
    // ///////  COUNTDOWN TIMER  ///////
    // if (typeof launch_date !== "undefined") {
    //   var now = new Date();
    //   var diff = launch_date - now;
    //   if (diff > 0) {
    //     var span_secondes = $("#span_secondes");
    //     var span_minutes = $("#span_minutes");
    //     var span_heures = $("#span_heures");
    //     var span_jours = $("#span_jours");

    //     setInterval(function () {
    //       var now = new Date();
    //       var diff = launch_date - now;
    //       if (diff > 0) {
    //         var seconds = diff / 1000;
    //         var minutes = seconds / 60;
    //         var hours = minutes / 60;
    //         span_secondes.html(Math.floor(seconds) % 60);
    //         span_minutes.html(Math.floor(minutes) % 60);
    //         span_heures.html(Math.floor(hours) % 24);
    //         span_jours.html(Math.floor(hours / 24));
    //       }
    //     }, 1000);
    //   }
    // } // if we have launch date

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

      // if (e.keyCode == 70) {
      //   // if press f
      //   openFreeTestPopup();
      // }
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

    // GO STRAIGHT TO TEST NOW
    // $(".freetest_opener").on("click", function (e) {
    //   e.preventDefault();
    //   openFreeTestPopup();
    // });

    $(".blue .column").matchHeight();
    $(".press_item").matchHeight();

    /////////
    // FREQUENCY SWITCHER
    var $payment_freq = "month";
    var $payment_currency = "eur";
    var $boolOuterFreq = $(".payment_frequency .boolean_outer");
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
        $pay_eur.addClass("active");
        $pay_usd.removeClass("active");
      } else {
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

    const ifrc = document.getElementById("video_iframe");
    if (ifrc) {
      ifrc.addEventListener("click", () => {
        var tag = document.createElement("script");
        tag.src = "https://www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName("script")[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        ifrc.classList.add("loading");
      });
    }
  });
})(jQuery, this);

let player;

function onYouTubePlayerAPIReady() {
  player = new YT.Player("youtube_player", {
    height: "315",
    width: "560",
    videoId: "sWtVLDZWqX0",
    playerVars: {
      autoplay: 1,
    },
    events: {
      onReady: onPlayerReady,
      onStateChange: onPlayerStateChange,
    },
  });

  console.log(player);
}

function onPlayerReady(e) {
  // console.log(e, "onPlayerReady");
  const ifrc = document.getElementById("video_iframe");
  if (ifrc) {
    ifrc.classList.add("hide_image");
    ifrc.classList.remove("loading");
  }
}
function onPlayerStateChange(e) {
  console.log(e, "onPlayerStateChange");
}

// BINGO FORM
// BINGO FORM

let guide_ete_fr = document.querySelector("#iFrameGuideEte");
if (guide_ete_fr) {
  guide_ete_fr.addEventListener("load", function () {
    setInterval(function () {
      guide_ete_fr.style.height =
        guide_ete_fr.contentDocument.body.scrollHeight + "px";
      guide_ete_fr.style.width =
        guide_ete_fr.contentDocument.body.scrollWidth + "px";
    }, 500);
  });
}

const bingo_popup = document.getElementById("bingo_popup");
let hasShown = false;
if (bingo_popup) {
  bingo_popup.style.display = "none";

  const html = document.documentElement;
  const body = document.body;
  //addEventListener("scroll", (event) => {
  document.addEventListener("mouseleave", (event) => {
    /*const wy = window.scrollY;
    const bh = Math.max(
      body.scrollHeight,
      body.offsetHeight,
      html.clientHeight,
      html.scrollHeight,
      html.offsetHeight
    );*/
    if (!hasShown) {
      //if (wy / bh > 0.25) {
      bingo_popup.style.display = "block";
      hasShown = true;
      //}
    }
  });
  const close_bingo_popup = document.getElementById("close_bingo_popup");
  close_bingo_popup.addEventListener("click", (e) => {
    bingo_popup.style.display = "none";
  });
}

/*const bingo_outers = document.getElementsByClassName("bingo_outer");

if (bingo_outers.length > 0) {
  for (let a = 0; a < bingo_outers.length; a++) {
    const bo = bingo_outers[a];
    const bf = [...bo.getElementsByClassName("bingoform")][0];

    const bingo_error = [...bo.getElementsByClassName("bingo_error")][0];
    const bingo_success = [...bo.getElementsByClassName("bingo_success")][0];
    bingo_success.style.display = "none";
    bingo_error.style.display = "none";
    const bingoemail = [...bo.getElementsByClassName("bingoemail")][0];
    // const consent = document.getElementById("consent");
    // consent: consent.checked,

    bf.addEventListener("submit", (e) => {
      bingo_success.style.display = "none";
      bingo_error.style.display = "none";

      e.preventDefault();
      const options = {
        method: "POST",
        body: JSON.stringify({
          data: {
            attributes: { email: bingoemail.value },
          },
        }),
        headers: {
          Accept: "application/json; version=1",
          "Content-Type": "application/json",
        },
      };

      const response = fetch("https://api.savio.fr/bingousers", options)
        .then((data) => {
          // console.log(data);
          if (data.ok) {
            bingo_success.style.display = "block";
            data.json().then((j) => {
              console.log(j.data.attributes);
            });
          } else {
            throw new Error("error");
          }
        })
        .catch((error) => {
          console.error(error);
          bingo_error.style.display = "block";
        });
    });
  }
}
*/

// BINGO FORM
// BINGO FORM
function doFetch(action, method, data) {
  return fetch(action, {
    method: method,
    body: JSON.stringify(data),
  }).then((response) => {
    if (!response.ok) {
      return response.json().then((data) => {
        throw data;
      });
    }
    return response.json();
  });
}
