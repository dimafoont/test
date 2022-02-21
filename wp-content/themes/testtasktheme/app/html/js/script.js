"use strict";

$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 20,
    lazyLoad: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    nav: true,
    responsive: {
      1: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  }); 

  $(document).on("click", ".mobile-menu", function (e) {
    e.preventDefault();
    $(".menu-top-menu-container .menu").addClass("active-canvas");
    $("body").addClass("noscroll");
    $(".mobile-menu").addClass("menu-active");
    $(".mobile-menu-overlay").fadeIn();
    $(".sub-menu").addClass("hideSub");
  });
  $(document).on("click", ".mobile-menu-overlay", function (e) {
    $(".mobile-menu").removeClass("menu-active");
    $("body").removeClass("noscroll");
    $(this).fadeOut(function () {
      $(".menu-top-menu-container .menu").removeClass("active-canvas");
    });
    $(".sub-menu").removeClass("hideSub");
  });
  $(".menu-item-has-children a").click(function () {
    if ($(".header").innerWidth() < 1000 && $(this).html() == "about") {
      if ($(".sub-menu").hasClass("visible")) {
        $(".sub-menu").removeClass("visible");
      } else {
        $(".sub-menu").addClass("visible");
      }
    }
  }); 

  $("#ajaxform").submit(function () {
    var form = $(this);
    var error = false;
    form.find('input').each(function () {
      if ($('.name').val() == '') {
        sweetAlert("Sorry", "Field name must be filled!", "error");
        error = true;
      } else if ($('.email').val() == '') {
        swal("Sorry", "Field email must be filled!", "error");
        error = true;
      }
    });

    if (!error) {
      var data = new FormData($('#ajaxform')[0]);
      $.ajax({
        type: 'POST',
        url: '<?php echo get_template_directory_uri();?>/mailto.php',
        data: data,
        processData: false,
        contentType: false,
        beforeSend: function beforeSend(data) {
          form.find('.send').attr('disabled', 'disabled');
        },
        complete: function complete(data) {
          swal("Succes!", "Your message has been sent successfully.", "success");
        }
      });
    }

    return false;
  });
}); 

document.addEventListener('DOMContentLoaded', function () {
  var topMenuWrapper = document.querySelector('.menu-top-menu-container');
  var imgDevices = document.querySelector('.content-block-thumbnail');
  var documentWidth = parseInt(document.documentElement.clientWidth);
  var windowsWidth = parseInt(window.innerWidth);
  var scrollbarWidth = windowsWidth - documentWidth;
  topMenuWrapper.style.marginRight = "-".concat(scrollbarWidth, "px");

  if (imgDevices) {
    imgDevices.style.right = "-".concat(scrollbarWidth, "px");
  }
});