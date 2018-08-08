/* requires flowtype.js */
if (typeof $.fn.flowtype !== 'undefined') {
    $('.flowTypeMobileHeader').flowtype({
        fontRatio : 10,
        minFont : 18,
        maxFont : 52
    });
    $('.flowTypeMobileHeaderMore').flowtype({
        fontRatio : 16,
        minFont : 16,
        maxFont : 30
    });
}

$(document).ready(function () {

    var offsetSite = 0;
    var loadingSites = false;

    function getSites(offset) {

        var category = 0;

        if (loadingSites) {
            return;
        }
        var sites = [];
        loadingSites = true;
        $.ajax({
            data: {
                sortBy: 'admin_sorted',
                offset: offset
            },
            type: "GET",
            url: "/products/ajaxGetSites",
            dataType: "json",
            success: function (rsp) {
                var siteData = []
                if (rsp.sites) {
                    offsetSite = rsp.offset;
                    $.each(rsp.sites, function (i, item) {
                        var found = jQuery.inArray(item.siteid, sites);
                        if (found >= 0) return;
                        sites.push(item.siteid);
                        siteData.push(item)
                    });
                    appendToSite(siteData)
                    if (rsp.sites.length < rsp.limit) {
                        $("#loadMore").hide();
                    }
                }
                loadingSites = false;
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    return;
                }
            }
        });
    }

    $("#loadMore").click(function (e) {
        e.preventDefault();
        offsetSite = $("#hexGrid .hex").length;
        getSites(offsetSite);
        return false;
    });

    $('.carousel').slick({
        dots: true,
        infinite: true,
        arrows: false,
    });

    $(document).on("click", ".scrolltop", function(e){

        e.preventDefault();
        $('html,body').animate({ scrollTop: 0 }, 'slow');

        return false;
    });

    function appendToSite (items) {
        items.forEach(function (item, i) {
            setTimeout(function () {
                var alt = item.product_img_alt || item.title
                var html =
                    '<li class="hex" style="display: none;">'+
                        '<div class="hexIn">'+
                            '<a class="hexLink" href="/' + item.siteid + '/' + item.slug + '" rel="nofollow">'+
                                '<img alt="' + alt + '" src="' + item.homepage_preview_image + '" />'+
                            '</a>'+
                        '</div>'+
                    '</li>'
                $(html).appendTo("#hexGrid").fadeIn('200')
            }, 50 * i)
        })
    }


});
