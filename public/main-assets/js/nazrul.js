
//  Fixed navigation bar codes
$(document).ready(function() {

    $('.search-btn').on('mouseenter', function () {

        $('.search-box').stop().show().animate({'width': '100%'}, 500);

    });

    $('.search-box').on('mouseleave', function () {

        $(this).stop().animate({'width': '0%'}, 500, function () {
            $(this).hide();
        });

    });

    $navOffest = $("nav").offset().top; // to find the distence of navbar from top
    $w = $(window).width();
    if ($w > 767) {
        $(window).scroll(function () {
            $scrollPos = $(window).scrollTop(); // to find scrolling postion
            if ($scrollPos >= $navOffest) {
                $("nav").addClass("navbar-fixed-top");
                $("nav").next().css("margin-top", "70px");
                $('.navbar-right').css('margin-right', '0');
                $('.navbar-logo').stop().animate({left: "0px"});
            }
            else {
                $("nav").removeClass("navbar-fixed-top");
                $("nav").next().css("margin-top", "0px");
                $('.navbar-right').css('margin-right', '0px');
                $('.navbar-logo').stop().animate({left: "-500px"});
            }

        });
    } else {
        $(window).scroll(function () {
            $scrollPos = $(window).scrollTop(); // to find scrolling postion
            if ($scrollPos >= $navOffest) {
                $("nav").addClass("navbar-fixed-top");
                $("nav").next().css("margin-top", "40px");
                $('.navbar-logo').stop().animate({left: "0px"});
            }
            else {
                $("nav").removeClass("navbar-fixed-top");
                $("nav").next().css("margin-top", "0px");
            }

        });
    }

});