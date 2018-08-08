$(function(){


    $(document).on("click", "#category-dropdown:not('.clicked')", function(){

        $(".drop").removeClass("dropped");
        $(this).addClass("dropped");
        $("#howitworks").slideUp();
        $("#howitworks-dropdown").removeClass("clicked");
        $("#nav").stop().slideDown();
        $(this).addClass("clicked");

    });

    $(document).on("click", "#category-dropdown.clicked", function(){

        $(".drop").removeClass("dropped");
        $("#nav").stop().slideUp();
        $(this).removeClass("clicked");

    });

    $(document).on("click", "#howitworks-dropdown:not('.clicked')", function(){

        if($("#how-it-works-landing").length){
            $('html, body').animate({
                scrollTop: $("#how-it-works-landing").offset().top
            }, 750);
            $(".drop").removeClass("dropped");
            $("#nav").slideUp();
            $("#category-dropdown").removeClass("clicked");
            return;
        }

        $(".drop").removeClass("dropped");
        $(this).addClass("dropped");
        $("#nav").slideUp();
        $("#category-dropdown").removeClass("clicked");
        $("#howitworks").stop().slideDown();
        $(this).addClass("clicked");

    });

    $(document).on("click", "#howitworks-dropdown.clicked", function(){

        $(".drop").removeClass("dropped");
        $("#howitworks").stop().slideUp();
        $(this).removeClass("clicked");

    });

    $(document).on("click", ".nav-links a", function(){

        $(".nav-links a").removeClass("active");
        $(this).addClass("active");

    });

    $(document).on("click", ".mobile-nav:not(.activenav)", function(){

        $(this).addClass("activenav");
        $(".nav-links").show();
        $(".nav-links .right").stop().slideDown();
    });

    $(document).on("click", ".mobile-nav.activenav", function(){

        $(this).removeClass("activenav");
        $(".nav-links .right").stop().slideUp(function(){
            $(".nav-links").hide();
        });
    });

    $(window).on('resize', function(){

        var win = $(this);

        if (win.width() >= 991) {

            if($(".nav-links").is(":visible") === false){
                $(".nav-links").show();
                $(".nav-links .right").slideDown();
            }
        }
    });

});

/**
 * Search bar show hide.
 */
( function(win, $) {
    $('#nav-search-fn').off('click');

    function showHideSearchBar( shouldOpen ) {
        var $target = $('#search-bar-container');
        if( shouldOpen ) {
            $target.slideDown(600);
        } else {
            $target.slideUp(300);
        }
    }

    $(document).ready( function() {
        $('#nav-search-fn').on('click', function(e) {
            e.stopPropagation();
            $(this).toggleClass('showSearchBar');
            var shouldOpen = $(this).hasClass('showSearchBar');
            showHideSearchBar( shouldOpen );
        })
    });


})(window, jQuery)