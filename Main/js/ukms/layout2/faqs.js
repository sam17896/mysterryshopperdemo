$(document).ready(function() {
    $('.expand').on('click', function() {
        var self = $(this);
        if (self.hasClass("clicked")) {
            self.next().slideUp();
            self.removeClass("clicked");
        } else {
            self.next().slideDown();
            self.addClass("clicked");
        }
    });

    $('#show-contact-checkbox').on('click', function() {
        checkContactToggle();
    });

    checkContactToggle(true);

    setTimeout(function() {
        $('.show-contact').slideDown();
    }, 10000);

    $('#contactEmailReason').on('change', function(e) {
        e.stopPropagation();
        dependentFormElements();
    });

    readyRepopulateSelectValues()
});

function checkContactToggle(scrollToContact) {
    if($("#show-contact-checkbox").is(':checked'))
        $(".contactHolder").slideDown();
    else
        $(".contactHolder").slideUp();

    if(scrollToContact == true) {
        $('html,body').animate({
            scrollTop: $(".contactHolder").offset().top
        }, 1000);
    }
}

/* show hide form elements on dependent parent change */
function dependentFormElements() {
    var $dependentElement = $('.contactAffiliateProgramShowHide'),
        $parentSelect = $('#contactEmailReason');

    if( $parentSelect.val() === 'Affiliate Program' ) {
        $dependentElement.slideDown();
    } else {
        $dependentElement.slideUp();
        $dependentElement.find('select').val('');
    }
}

function readyRepopulateSelectValues() {

    var $emailReason = $('#contactEmailReason'),
        $affiliateProgram = $('#contactAffiliateProgram'),
        isFormSubmitted = parseInt($('#postback').data('submitted'));

    if( $emailReason.data('value').length ) {
        $emailReason.val($emailReason.data('value'));

        // show dependent select
        if( $affiliateProgram.data('value').length ) {
            $affiliateProgram.val($affiliateProgram.data('value'));
        }
    }

    dependentFormElements();

    // if the form has been submitted we will open it
    if( isFormSubmitted ) {
        $("#show-contact-checkbox").prop('checked', 'checked');
        checkContactToggle(true);
    }


}