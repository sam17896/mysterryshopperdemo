jQuery.noConflict(),jQuery(function(o){var t=100,e=o("a#scroll-to-top"),n=600,a="swing";e.hide(),o(window).scroll(function(){var n=o(document).scrollTop();n>t?o(e).stop().fadeTo(300,1):o(e).stop().fadeTo(300,0)}),o(e).click(function(){return o("html, body").animate({scrollTop:0},n,a),!1}),o('a[href*="#content_start"]').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")||location.hostname==this.hostname){var t=o(this.hash);o(".primary-header").height()+5;if(t=t.length?t:o("[name="+this.hash.slice(1)+"]"),t.length)return o("html,body").animate({scrollTop:t.offset().top},n,a),!1}})});