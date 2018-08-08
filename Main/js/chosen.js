if ($(window).width() <= 977) {

    if($("#countdown-middle").data("active") == 0) {
        $("#countdown-middle").data("active", "1");
        $("#countdown-sidebar").data("active", "0");
        $("#countdown-middle").attr("data-active", "1");
        $("#countdown-sidebar").attr("data-active", "0");
        $("#countdown-middle").html($("#countdown-sidebar").html());
        $("#countdown-sidebar").html("");
    }
}

$(window).on('resize', function() {

    if ($(this).width() <= 997) {

        if($("#countdown-middle").data("active") == 0) {
            $("#countdown-middle").data("active", "1");
            $("#countdown-sidebar").data("active", "0");
            $("#countdown-middle").attr("data-active", "1");
            $("#countdown-sidebar").attr("data-active", "0");
            $("#countdown-middle").html($("#countdown-sidebar").html());
            $("#countdown-sidebar").html("");
        }

    } else {

        if($("#countdown-middle").data("active") == 1) {
            $("#countdown-middle").data("active", "0");
            $("#countdown-sidebar").data("active", "1");
            $("#countdown-middle").attr("data-active", "0");
            $("#countdown-sidebar").attr("data-active", "1");
            $("#countdown-sidebar").html($("#countdown-middle").html());
            $("#countdown-middle").html("");
        }
    }
});

if($(".countdown-box").length) {

    var countdowntime = $(".countdown-box").data("nextdraw").split(",");
    var d = new Date(Date.UTC(countdowntime[0], countdowntime[1], countdowntime[2], countdowntime[3], countdowntime[4], countdowntime[5]));

    var timenow = d.getFullYear() + "-"
        + ("0"+(d.getMonth()+1)).slice(-2) + "-"
        + ("0" + d.getDate()).slice(-2) + " "
        + ("0" + d.getHours()).slice(-2) + ":"
        + ("0" + d.getMinutes()).slice(-2) + ":"
        + ("0" + d.getSeconds()).slice(-2);

    $("#getting-started").countdown(timenow, function(event) {
        $(".timer-hours").html(event.strftime('%H'));
        $(".timer-mins").html(event.strftime('%M'));
        $(".timer-secs").html(event.strftime('%S'));
    }).on('finish.countdown', function(){
        location.reload();
    });
}

var loadingWinners = false;
var offset = 3;

$(document).on("click", "#chosen-load-more", function(){

    console.log("Getting Winners by newest");

    if (loadingWinners) {
        return;
    }

    loadingWinners = true;

    $.ajax({
        data: {
            offset: offset
        },
        type: "GET",
        url: "/chosen/ajaxGetWinners",
        dataType: "json",
        success: function (rsp) {

            console.log("Success...");
            console.log(rsp);

            var html = "";

            if (rsp.winners) {

                var winners = [];

                offset = rsp.offset;

                $.each(rsp.winners, function (i, item) {

                    var found = jQuery.inArray(item.winner_id, winners);

                    if (found >= 0) {
                        return;
                    } else {
                        winners.push(item.product_image);
                    }

                    html += ''+
                    '<div class="chosen-review chosen-review-table">' +
                        '<div class="chosen-review-table-cell image-cell">' +
                            '<img src="'+item.product_image+'"/>' +
                        '</div>'+
                        '<div class="chosen-review-table-cell text-cell">'+
                            '<span class="bold">'+item.name+'</span><br/>'+
                            '<span class="red">'+item.product_name+'</span><br/>'+
                            '<span class="date">'+item.dt_win+'</span>'+
                        '</div>'+
                    '</div>';
                });

                if (rsp.winners.length < rsp.limit) {
                    $("#loadMore").hide();
                    $("#scrollUp").show();
                }
            }

            $(html).appendTo("#chosen-load");

            loadingWinners = false;

            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                return;
            }
        }
    });

});
