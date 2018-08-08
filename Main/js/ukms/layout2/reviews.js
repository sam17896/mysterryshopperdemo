var offset = 0;
var queryString = "?"+$("#queryString").val();

function getReviews() {
    $.ajax({
        data: {
            offset: offset
        },
        type: "GET",
        url: "/reviews/ajaxGetReviews",
        dataType: "json",
        success: function (rsp) {

            console.log("Success...");
            console.log(rsp);

            var html = "";

            if (rsp.reviews) {

                var reviews = [];
                offset = rsp.offset;

                $.each(rsp.reviews, function (i, item) {

                    var found = jQuery.inArray(item.reviewid, reviews);

                    if (found >= 0) {
                        return;
                    } else {
                        reviews.push(item.reviewid);
                    }

                    var rating = "";

                    if (item.rating) {
                        var starNumber = item.rating;
                        for (x = 1; x <= starNumber; x++) {
                            rating += '<img src="/img/rating1.png" />';
                        }
                        if (starNumber.indexOf(".") != -1) {
                            rating += '<img src="/img/rating3.png" />';
                            x++;
                        }
                        while (x <= 5) {
                            rating += '<img src="/img/rating2.png" />';
                            x++;
                        }
                    }

                    html += '<div class="review col-xs-10 col-xs-offset-1"><div class="row">' +
                        '<div class="col-sm-3"><a href="/review/' + item.reviewid +"/"+ item.slug + queryString +'" rel="nofollow"><img src="' + item.preview_image + '" /></a><a class="btn btn-green" href="/' + item.siteid + queryString +'" rel="nofollow">Register</a></div>' +
                        '<div class="col-sm-9">' +
                        '<h2><a href="/review/' + item.reviewid +"/"+ item.slug + queryString + '">' + item.title + '</a></h2>' +
                        '<span class="black fs12">By ' + item.author + ' on ' + item.dt_created +
                        '<br> Rating: ' + rating + ' ';

                    if(item.comments > 0)
                        html += '<a href="/review/' + item.reviewid +"/"+ item.slug + queryString +'">' + item.comments + ' comments</a>';

                    html += '</span><br><br>' +
                        item.content.substr(0, 300) + '... <a class="black fs12" href="/review/' + item.reviewid +"/" + item.slug + queryString + '">&raquo;Read More</a>' +
                        '</div></div></div>';
                });

                if (rsp.reviews.length < rsp.limit) {
                    $("#loadMore").hide();
                }
            }

            $(html).appendTo("#reviews");
        }
    });
}

$("#loadMore").click(function () {
    getReviews();
});

getReviews();