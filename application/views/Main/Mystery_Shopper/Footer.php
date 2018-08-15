<div class="blog-footer" style="bottom: 0px;width: 100%;">
    <div class="container-max-width">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            
                <p class="copyright"> © MSP 2018 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Web Design by <a href="http://planet01.net/" target="_blank">Planet01</a></p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 social_footer"><a href="https://www.facebook.com/mystryshoppers/" target="_blank" style="padding-left:12px; padding-right:12px;"><img src="<?php echo base_url(); ?>Main/wp-content/uploads/2017/01/s_facebook_1.png"></a><!-- <a href="https://twitter.com/CPM_Int" target="_blank" style="padding-left:12px; padding-right:12px;"><img src="<?php echo base_url(); ?>Main/wp-content/uploads/2017/01/s_twitter_2.png"></a><a href="http://www.linkedin.com/company/cpm-international" target="_blank" style="padding-left:12px; padding-right:12px;"><img src="<?php echo base_url(); ?>Main/wp-content/uploads/2017/01/s_linkedin_3.png"></a> --></div>
        <div style="clear:both;"></div>
    </div>
</div>

<script type='text/javascript' src='<?php echo base_url(); ?>Main/wp-content/cache/busting/1/wp-includes/js/jquery/jquery-1.12.4.js'></script>

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