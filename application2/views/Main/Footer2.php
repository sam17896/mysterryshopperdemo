	<script type="text/javascript">
function parseJSAtOnload() {
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
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
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
</script> 
<!--"https://www.mysteryshopperspakistan.com/Main/wp-content/cache/min/1/4a77dfb0541852c845fcedafbc7dd535.js"-->