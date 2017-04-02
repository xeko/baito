jQuery(document).ready(function ($) {
    //back to top
    $(window).scroll(function () {
        if ($(window).scrollTop() < 300) {
            $('#back-to-top').fadeOut();
        } else {
            $('#back-to-top').fadeIn();
        }
    });
    $("#back-to-top").on("click", function () {
        $("html, body").animate({scrollTop: 0}, 800);
    });
    $('.dropdown').hover(
            function () {
                $(this).children('.dropdown-menu').slideDown(200);
            },
            function () {
                $(this).children('.dropdown-menu').slideUp(200);
            }
    );
    $("#partner").bxSlider({
        minSlides: 4,
        maxSlides: 5,
        slideWidth: 180,
        slideMargin: 10,
        auto: true,
        randomStart: true,
        moveSlides: 1,
        pager: false
    });

    $('.bxslider').bxSlider({
        auto: true,
        speed: 2000,
        controls: true,
        captions: false,
        pager: false
    });

    var isSearchHover = false;
    $(document).click(function () {
        if (!isSearchHover)
            $('#search-icon form, #search-icon-desk form').fadeOut(250);
    });
    $(document).on('click', '#search-icon-icon, .btnsearch', function () {
        var $$ = $(this).parent();
        $$.find('form').fadeToggle(250);
        setTimeout(function () {
            $$.find('input[name=s]').focus();
        }, 300);
    });
    $(document).on('mouseenter', '#search-icon, #search-icon-desk', function () {
        isSearchHover = true;
    }).on('mouseleave', '#search-icon, #search-icon-desk', function () {
        isSearchHover = false;
    });
    //Chosen
    $("#cateList").chosen({
        placeholder_text_multiple: "Chọn ngành nghề",
        max_selected_options: 3
    });
    $("#location").chosen({
        placeholder_text_multiple: "Chọn địa điểm",
    });
    
    $('.item').matchHeight();
});
