/*!
 * Menu Initializer
 * Copyright (c) 2014 Intense Visions, Inc.
 */
/* global jQuery */

jQuery(function($) {
    'use strict';

    $(function() {
        var $activeVerticalMenu = null;
        var enterTimeout;
        var leaveTimeout;
        var enterTimeouta;
        var leaveTimeouta;
        var delay = 400;
        var delayb = 100;

        // hide/show children when the mouse is hovered
        $('.intense.menu.vertical li.menu-item-has-children').not('.current-page-item,.current-menu-ancestor').on({
            mouseenter: function() {
                $activeVerticalMenu = $(this);

                clearTimeout(leaveTimeout);

                enterTimeout = setTimeout(function() {
                    if ($activeVerticalMenu) {
                        $activeVerticalMenu.children('.sub-menu').slideDown();
                    }
                }, delay);
            },
            mouseleave: function() {
                clearTimeout(enterTimeout);

                leaveTimeout = setTimeout(function() {
                    if ($activeVerticalMenu) {
                        $activeVerticalMenu.children('.sub-menu').slideUp();
                        $activeVerticalMenu = null;
                    }
                }, delay);
            }
        });

        /**/


        $('ul.menuTesta li.menu-item-has-children').live('mouseenter mouseleave', function (e) {
            if (e.type == 'mouseenter') {
               if ($(this).is(':animated')) { return false; }
                        //$(this).children('.sub-menu').slideDown();
                if ($activeVerticalMenu != null && $activeVerticalMenu != $(this)) {
                    clearTimeout(enterTimeout);


                            $activeVerticalMenu.children('.sub-menu').slideUp();
                            $activeVerticalMenu = null;

                }

                $activeVerticalMenu = $(this);

                clearTimeout(leaveTimeout);

                enterTimeout = setTimeout(function() {
                    if ($activeVerticalMenu) {
                        $activeVerticalMenu.children('.sub-menu').slideDown();
                    }
                }, delay);

            } else {
              if ($activeVerticalMenu.is(':animated')) { return false; }
                        //$(this).children('.sub-menu').slideUp();
                clearTimeout(enterTimeout);

                leaveTimeout = setTimeout(function() {
                    if ($activeVerticalMenu) {
                        $activeVerticalMenu.children('.sub-menu').slideUp();
                        $activeVerticalMenu = null;
                    }
                }, delay);

            }
        });



        $('.intense.menu.mobile').each(function() {
            var $parent = $(this).parent();
            var $slicknav = $(this).slicknav({
                duplicate: false,
                label: '',
                prependTo: $parent,
                allowParentLinks: true
            });

            $parent.find('.slicknav_menu').addClass('hidden-lg hidden-md');
            $parent.find('.intense.menu.horizontal').addClass('hidden-sm hidden-xs');
        });

        var scrollSpeed = 800;

        // smooth scroll all the menu links that have a #
        $('.intense.menu .menu-item > a').each(function() {
            var $menu_link = $(this);
            var href = $menu_link.attr('href');

            if (href.indexOf("#") > -1) {
                var targetSelector = href.substring(href.indexOf("#"));
                var $target = $(targetSelector);

                $menu_link.parent().removeClass('current-menu-item');

                if ($target.length > 0) {
                    $target.scrollspy({
                        min: $target.position().top - ($target.height() * 0.1),
                        max: $target.position().top + $target.height(),
                        onEnter: function(element, position) {
                            $menu_link.parents('.intense.menu').find('.current-menu-item').removeClass('current-menu-item');
                            $menu_link.parent().addClass('current-menu-item');
                        },
                        onLeave: function(element, position) {
                            //$menu_link.parent().removeClass('current-menu-item');
                        }
                    });

                    $menu_link.click(function() {
                        setTimeout(function() {
                            $menu_link.parents('.intense.menu').find('.current-menu-item').removeClass('current-menu-item');
                            $menu_link.parent().addClass('current-menu-item');
                        }, scrollSpeed);
                    }).smoothScroll({
                        speed: scrollSpeed,
                        offset: 0
                    });
                }
            }
        });

        // if there aren't any active (current-menu-item) items find
        // the first link with a target href and make it active
        // this applies to single page sites
        $('.intense.menu').each(function() {
            if ($(this).find('a[href^="#"]').length == $(this).find('a').length) {
                $(this).find('a[href^="#"]').first().parent().addClass('current-menu-item');
            }
        });

        // show children of currently selected menu
        $('.intense.menu.vertical li.menu-item-has-children.current-menu-ancestor > ul').show();

        // if only showing parent icons, remove icons for children
        $('.intense.menu li').not('.menu-item-has-children').find('.intense.icon.only-parents').remove();

        // show icons for only parents enabled icons
        $('.intense.menu li.menu-item-has-children').find('.intense.icon.only-parents').each(function() {
            $(this).removeClass('hide');
        });

        // show icons for li elements that aren't only parents enabled
        $('.intense.menu li').find('.intense.icon').not('.only-parents').each(function() {
            $(this).removeClass('hide');
        });
    });
});
