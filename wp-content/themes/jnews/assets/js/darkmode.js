/**
 * ----- DARK MODE SCRIPT ----- *
 * */
(function ($) {
    /**
     * VARIABLES
     * */
    const jnews_dm = $('.jeg_dark_mode_toggle');
    const jnews_body = $('body');

    // domain & path site
    var path = (jnewsoption.site_slug === undefined) ? '/' : jnewsoption.site_slug;
    var domain = (jnewsoption.site_domain === undefined) ? window.location.hostname : jnewsoption.site_domain;

    // page builder variables
    var url_string = window.location;
    var url = new URL(url_string);
    var vc = url.searchParams.get('vc_editable');
    var elementor = url.searchParams.get('elementor-preview');

    // dark logo variables
    var def_src = [];
    var def_srcset = [];
    var dm_src = [];
    var dm_srcset = [];
    var tag_holder = [$('.jeg_header_wrapper'),$('.jeg_header_sticky'),$('.jeg_navbar_mobile_wrapper'),$('.footer-holder')];

    // get saved data
    var darkcookie = getdmCookie('darkmode');

    // get local time
    var checkhour = new Date().getHours();


    /**
     * IMAGE SOURCE
     * */
    for (var i=0; i<4; i++) {
        def_src[i] = tag_holder[i].find('img.jeg_logo_img').attr('data-light-src');
        def_srcset[i] = tag_holder[i].find('img.jeg_logo_img').attr('data-light-srcset');
        dm_src[i] = tag_holder[i].find('img.jeg_logo_img').attr('data-dark-src');
        dm_srcset[i] = tag_holder[i].find('img.jeg_logo_img').attr('data-dark-srcset');
    }


    /**
     * USER TOGGLE BUTTON - option
     * */
    if (jnews_body.hasClass('jeg_toggle_dark')) {
        jnews_dm.on('change', function () {
            if (vc === null && elementor === null) {
                check_dm($(this));
            }
        });
    }


    /**
     * FULL DARK MODE - option
     * */
    if (jnews_body.hasClass('jeg_full_dark')) {
        jnews_body.addClass('jnews-dark-mode');
    }


    /**
     * NIGHT TIME ONLY - option
     * */
    if (jnews_body.hasClass('jeg_timed_dark')) {
        if (checkhour >= 18 || checkhour <= 6) {
            jnews_body.addClass('jnews-dark-mode');
            for (var i = 0; i < 4; i++) {
                tag_holder[i].find('.jeg_logo_img').attr({'src': dm_src[i], 'srcset': dm_srcset[i]});
            }
            document.cookie = 'darkmode = true;path = ' + path + ';domain = ' + domain;
        } else {
            jnews_body.removeClass('jnews-dark-mode');
            for (var i = 0; i < 4; i++) {
                tag_holder[i].find('.jeg_logo_img').attr({'src': def_src[i], 'srcset': def_srcset[i]});
            }
            document.cookie = 'darkmode = false;path = ' + path + ';domain = ' + domain;
        }
    }


    /**
     * CHECK COOKIES
     * */
    if ( (darkcookie === "true")) {
        jnews_dm.prop('checked', true).trigger('change');
        document.cookie = 'darkmode = true;path = ' + path + ';domain = ' + domain;
    } else if ( (darkcookie === "false")) {
        jnews_dm.prop('checked', false).trigger('change');
        document.cookie = 'darkmode = false;path = ' + path + ';domain = ' + domain;
    }


    /**
     * DARK MODE FUNCTIONS
     * */
    function check_dm(a) {
        if (a.is(':checked')) {
            jnews_body.addClass('jnews-dark-mode');
            for (var i=0; i<4; i++){
                tag_holder[i].find('.jeg_logo_img').attr({'src':dm_src[i],'srcset':dm_srcset[i]});
            }
            document.cookie = 'darkmode = true;path = ' + path +';domain = ' + domain;
        } else if (!a.is(':checked')) {
            jnews_body.removeClass('jnews-dark-mode');
            for (var i=0; i<4; i++){
                tag_holder[i].find('.jeg_logo_img').attr({'src':def_src[i],'srcset':def_srcset[i]});
            }
            document.cookie = 'darkmode = false;path = ' + path +';domain = ' + domain;
        }
    }

    function getdmCookie(name) {
        var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
        return v ? v[2] : null;
    }

})(jQuery);