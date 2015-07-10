$(document).ready(function () {
    var global = {

        // GENERAL
        _WW: window.innerWidth,
        _WH: window.innerHeight,
        is_mobile: false,

        // MENU
        $menuIcon: $('.menu-icon'),
        $menuClose: $('.menu-close'),
        $menu: $('.menu'),
        $menuItems: $('.menu-item'),
        menuIsOpen: false,

        // RESULT
        resultPage: null,
        currentResult: 0,

        // PROJETS
        projectsPerPage: 8,

        // PROFILS
        profilsPerPage: 4
    };

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && global._WW < 768) {
        global.is_mobile = true;
        global.$menu.addClass('is-close');
    }

    /**
     * openMenu() Open menu for mobile
     *
     *
     *
     *
     */

    function openMenu(){
        global.$menu.fadeIn(400).removeClass('is-close');


        var delay = 0;
        global.$menuItems.each(function(){

            var $this = $(this);

            TweenMax.fromTo($this, 0.8, {opacity: 0, y: "100%"}, {delay: delay, opacity: 1, y: "0%", ease: Quint.easeInOut});
            delay += 0.1;
        });

        global.menuIsOpen = true;

        $('html, body').addClass('overflow');
    }

    /**
     * closeMenu() Open menu for mobile
     *
     *
     *
     *
     */

    function closeMenu(){
        var delay = 0;
        $(global.$menuItems.get().reverse()).each(function(){

            var $this = $(this);

            TweenMax.to($this, 0.6, {delay: delay, opacity: 0, y: "100%", ease: Quint.easeInOut});
            delay += 0.1;
        });


        global.$menu.delay(400).fadeOut(400).addClass('is-close');

        global.menuIsOpen = false;

        $('html, body').removeClass('overflow');
    }

    /**
     * resetMenuDesktop() Reset state menu for desktop
     *
     *
     *
     *
     */

    function resetMenuDesktop(){
        global.$menu.fadeIn(400);

        global.$menuItems.each(function(){
            var $this = $(this);

            TweenMax.to($this, 0, {opacity: 1, y: "0%", ease: Quint.easeInOut});
        });

        global.menuIsOpen = true;

        $('html, body').removeClass('overflow');
    }

    /**
     * resetMenuMobile() Reset state menu for mobile
     *
     *
     *
     *
     */

    function resetMenuMobile(){
        global.$menu.fadeOut(0);

        global.menuIsOpen = false;

        $('html, body').removeClass('overflow');
    }

    /**
     * calResultList() Calculate number of result list
     *
     *
     *
     *
     */

    function calResultList(){

        var n = $('.result-list-item').length;

        if(global.resultPage == 'profils'){
            n = Math.ceil(n / global.profilsPerPage);
        }else if(global.resultPage == 'projects'){
            n = Math.ceil(n / global.projectsPerPage);
        }


        if(n > 1){
            for(var i = 0; i < n; i++){
                var li = $('<li class="result-navigation-item"><a href="#" class="disable"></a></li>');

                if(i == 0){
                    li.addClass('active');
                }

                li.appendTo($('.result-navigation'));
            }
        }
    }

    /**
     * initResultList() Detect if result page and addClass for show some result
     *
     *
     *
     *
     */

    function initResultList(){
        if($('.profils').length > 0) {
            global.resultPage = 'profils';

            for(var i = 0; i < global.profilsPerPage; i++){
                $('.result-list-item').eq(i).addClass('visible');
            }

            calResultList();
        }else if($('.projets').length > 0){
            global.resultPage = 'projects';

            for(var i = 0; i < global.projectsPerPage; i++){
                $('.result-list-item').eq(i).addClass('visible');
            }

            calResultList();
        }
    }

    /*

        Navigation on result list

     */

    $(document).on('click touchend', '.result-navigation-item:not(.active)' , function(){
        var index = $(this).index();
        var nextFirst = 0;
        var step = 0;

        if(global.resultPage == 'profils'){
            step = global.profilsPerPage;
            nextFirst = index * step;
        }else if(global.resultPage == 'projects'){
            step = global.projectsPerPage;
            nextFirst = index * step;
        }

        $('.result-list-item.visible').removeClass('visible');

        for(var i = nextFirst, n = nextFirst + step; i < n; i++){
            $('.result-list-item').eq(i).addClass('visible');
        }

        $('.result-navigation-item.active').removeClass('active');
        $(this).addClass('active');
        global.currentResult = index;

        $('html, body').animate({
            'scrollTop': 0
        }, 400);
    });

    initResultList();


    /*

        Menu Icon

     */

    global.$menuIcon.on('click touchend', function(){
        openMenu();
    });

    global.$menuClose.on('click touchend', function(){
        closeMenu();
    });

    /*

        General

     */


    // Desactive event having the class "disable", mostly links
    $(document).on('click touchstart touchend', '.disable', function(e){
        e.preventDefault();
    });

    $(window).on('resize', function(){
        global._WW = window.innerWidth;
        global._WH = window.innerHeight;

        if(global._WW > 767){
            resetMenuDesktop();
        }else if(global._WW < 768 && global.$menu.hasClass('is-close')){
            resetMenuMobile();
        }
    });

    $(window).trigger('resize');
});