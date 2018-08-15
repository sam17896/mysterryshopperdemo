	<script type="text/javascript">
function parseJSAtOnload() {
var links = ["https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", "https://www.mysteryshopperspakistan.com/Main/wp-content/cache/busting/1/wp-includes/js/jquery/jquery-1.12.4.js","https://www.mysteryshopperspakistan.com/Main/wp-content/cache/min/1/38e7ad9bd856d1729b0aed6fcd4a46b6.js"],
headElement = document.getElementsByTagName("head")[0],
linkElement, i;
for (i = 0; i < links.length; i++) {
linkElement = document.createElement("script");
linkElement.src = links[i];
headElement.appendChild(linkElement);
}
}
if (window.addEventListener)
window.addEventListener("load", parseJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", parseJSAtOnload);
else window.onload = parseJSAtOnload;
</script>

</body>
<div class="blog-footer" style="bottom: 0px;width: 100%;">
    <div class="container-max-width">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <p class="copyright">
                <p class="copyright"> © MSP 2018 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Web Design by <a href="http://planet01.net/" target="_blank">Planet01</a></p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 social_footer"><a href="https://www.facebook.com/mystryshoppers/" target="_blank" style="padding-left:12px; padding-right:12px;"><img src="<?php echo base_url(); ?>Main/wp-content/uploads/2017/01/s_facebook_1.png" style="margin-right:10%"></a><!-- <a href="https://twitter.com/CPM_Int" target="_blank" style="padding-left:12px; padding-right:12px;"><img src="<?php echo base_url(); ?>Main/wp-content/uploads/2017/01/s_twitter_2.png"></a><a href="http://www.linkedin.com/company/cpm-international" target="_blank" style="padding-left:12px; padding-right:12px;"><img src="<?php echo base_url(); ?>Main/wp-content/uploads/2017/01/s_linkedin_3.png"></a> --></div>
        <div style="clear:both;"></div>
    </div>
</div>
</div>
<script type="text/javascript">
  window.onload = function() {
    if (window.jQuery) {  
        // jQuery is loaded  
        //alert("Yeah!");
        $(".container-fluid").show();
    } else {
        alert('Files not loaded');
    }
}
$(document).ready(function() {
    $(".txtboxToFilter").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});


</script> 
<!--"https://www.mysteryshopperspakistan.com/Main/wp-content/cache/min/1/4a77dfb0541852c845fcedafbc7dd535.js"-->