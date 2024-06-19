$(document).ready(function() {
    "use strict";

    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen = window_height - header_height;

    $(".fullscreen").css("height", window_height);
    $(".fitscreen").css("height", fitscreen);

    // ------- Datepicker  js --------//  
    $(".date-picker").datepicker();

    //------- Niceselect  js --------//  
    $('select').niceSelect();

    //------- Lightbox  js --------//  
    $('.img-gal').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    //------- Superfish nav menu  js --------//  
    $('.nav-menu').superfish({
        animation: {
            opacity: 'show'
        },
        speed: 400
    });

    //------- Owl Carusel  js --------//  
    function initOwlCarousel(selector, options) {
        $(selector).owlCarousel(options);
    }

    initOwlCarousel('.active-hot-deal-carusel', {
        items: 1,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        smartSpeed: 500,
        margin: 30,
        dots: true
    });

    initOwlCarousel('.active-testimonial', {
        items: 2,
        loop: true,
        margin: 30,
        autoplayHoverPause: true,
        smartSpeed: 500,
        dots: true,
        autoplay: true,
        responsive: {
            0: { items: 1 },
            480: { items: 1 },
            992: { items: 2 }
        }
    });

    initOwlCarousel('.active-recent-blog-carusel', {
        items: 3,
        loop: true,
        margin: 30,
        dots: true,
        autoplayHoverPause: true,
        smartSpeed: 500,
        autoplay: true,
        responsive: {
            0: { items: 1 },
            480: { items: 1 },
            768: { items: 2 },
            961: { items: 3 }
        }
    });

    //------- Mobile Nav  js --------//  
    if ($('#nav-menu-container').length) {
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({ 'class': '', 'id': '' });
        $('body .main-menu').append($mobile_nav);
        $('body .main-menu').prepend('<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i></button>');
        $('body .main-menu').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function() {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function() {
            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
            $('#mobile-body-overly').toggle();
        });

        $(document).on('click', function(e) {
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
                    $('#mobile-body-overly').fadeOut();
                }
            }
        });
    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }

    //------- Smooth Scroll  js --------//  
    $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;

                if ($('#header').length) {
                    top_space = $('#header').outerHeight();
                    if (!$('#header').hasClass('header-fixed')) {
                        top_space = top_space;
                    }
                }

                $('html, body').animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
                    $('#mobile-body-overly').fadeOut();
                }
                return false;
            }
        }
    });

    $('html, body').hide();

    if (window.location.hash) {
        setTimeout(function() {
            $('html, body').scrollTop(0).show();
            $('html, body').animate({
                scrollTop: $(window.location.hash).offset().top - 108
            }, 1000);
        }, 0);
    } else {
        $('html, body').show();
    }

    var path = window.location.pathname.split("/").pop();
    if (path == '') {
        path = 'index.html';
    }
    $('nav a[href="' + path + '"]').addClass('menu-active');

    if ($('.menu-has-children ul>li a').hasClass('menu-active')) {
        $('.menu-active').closest("ul").parentsUntil("a").addClass('parent-active');
    }

    //------- Header Scroll Class  js --------//  
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
        } else {
            $('#header').removeClass('header-scrolled');
        }
    });

    //------- Google Map  js --------//  
    if (document.getElementById("map")) {
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            var mapOptions = {
                zoom: 11,
                center: new google.maps.LatLng(40.6700, -73.9400),
                styles: [/* Google Maps Styles Array */]
            };
            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
                title: 'Snazzy!'
            });
        }
    }

    //------- Mailchimp js --------//  
    $('#mc_embed_signup').find('form').ajaxChimp();

    // Lấy ngày hiện tại và đặt giá trị mặc định cho input date
    var today = new Date();
    var returnDate = new Date(today);
    returnDate.setDate(today.getDate() + 2);
    var returnDateString = returnDate.toISOString().slice(0, 10);

    $("#start").val(today.toISOString().slice(0, 10));
    $("#return").val(returnDateString);

    $("#return-checkbox").click(function() {
        toggleReturnInput();
    });

    function toggleReturnInput() {
        var returnInput = $("#return");
        var returnCheckbox = $("#return-checkbox");

        if (returnCheckbox.prop("checked")) {
            returnInput.removeClass("disabled-input");
            returnInput.prop("disabled", false);
        } else {
            returnInput.addClass("disabled-input");
            returnInput.prop("disabled", true);
            returnInput.val(returnDateString);
            returnCheckbox.val = "";
        }
    }

    // Hiển thị và ẩn các gợi ý khi focus và blur trên ô input
    $('.form-control').on('focus', function() {
        var suggestionsId = '#' + $(this).attr('id') + '-suggestions';
        $(suggestionsId).show();
    });

    $('.form-control').on('blur', function() {
        var suggestionsId = '#' + $(this).attr('id') + '-suggestions';
        setTimeout(function() {
            $(suggestionsId).hide();
        }, 200); // Delay để cho phép sự kiện mousedown trên gợi ý được kích hoạt
    });

    $('.form-control').on('input', function() {
        var input = $(this);
        var query = input.val().toLowerCase();
        var suggestionsId = '#' + input.attr('id') + '-suggestions';
        $(suggestionsId).children('div').each(function() {
            var suggestion = $(this);
            if (suggestion.text().toLowerCase().includes(query)) {
                suggestion.show();
            } else {
                suggestion.hide();
            }
        });
    });

    $('.suggestions div').on('mousedown', function() {
        var suggestion = $(this);
        var inputId = suggestion.parent().attr('id').replace('-suggestions', '');
        $('#' + inputId).val(suggestion.data('value'));
        suggestion.parent().hide();
    });
});
