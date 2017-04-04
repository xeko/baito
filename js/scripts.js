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

    $('[data-toggle="tooltip"]').tooltip();

    $('#entry_form')
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    'input_form[fullname]': {
                        message: 'Tên không lợp lệ',
                        validators: {
                            notEmpty: {
                                message: 'Tên không được để trống'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'Tên phải ít nhất là 3 ký tự'
                            },
                            /*remote: {
                             url: 'remote.php',
                             message: 'The username is not available'
                             },*/
                            regexp: {
                                regexp: /^[a-zA-Z0-9_\.]+$/,
                                message: 'Tên không hợp lệ'
                            }
                        }
                    },
                    'input_form[email]': {
                        validators: {
                            notEmpty: {
                                message: 'Email không được để trống'
                            },
                            emailAddress: {
                                message: 'Email không đúng định dạng'
                            }
                        }
                    },
                    'input_form[telephone_number]': {
                        validators: {
                            notEmpty: {
                                message: 'Hãy nhập vào số điện thoại'
                            }
                        }
                    },
                    'input_form[address]': {
                        validators: {
                            notEmpty: {
                                message: 'Hãy nhập vào địa chỉ của bạn'
                            }
                        }
                    }
                }
            });
});
