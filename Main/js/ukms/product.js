$(document).ready(function () {
    $("#emailsignupbtn").click(function(){
        $("#signupPrompt").fadeOut(500,function(){
            $("#actualForm, #desktopArrow").fadeIn();
        });
    });

    $("#fblink").click(function () {
        if ($("#termsCheckbox").prop("checked") == false) {
            alert("Please accept our Privacy Policy and Terms!");
            return false;
        }

        return true;
    });

    var intervalID = null;
    function checkTnc() {
        if ($("#termsCheckbox").prop("checked") == false) {
            alert("Please accept our Privacy Policy and Terms!");
            return false;
        }

        return true;
    }

    var dots = 0;

    function doDots() {
        if (dots < 3) {
            $("#signupDots").append('.');
            dots++;
        }
        else {
            $("#signupDots").html('');
            dots = 0;
        }
    }

    $("#form").validate({
        submitHandler: function (form) {
            if (!checkTnc()) {
                return false;
            }

            $("#title").removeAttr("disabled");
            if (!$("#title").val()) {
                $("#titleHolder").css({"background": "#FFC200"});
                alert("Please supply a Title!");
                return false;
            }

            if (!$("#firstName").val()) {
                alert("Please supply a First Name!");
                return false;
            }

            if (!$("#lastName").val()) {
                alert("Please supply a Last Name!");
                return false;
            }

            if (!$("#email").val()) {
                alert("Please supply an Email!");
                return false;
            }

            $.ajax({
                data: {
                    email: $("#email").val()
                },
                type: "POST",
                url: "/products/checkEmail",
                beforeSend: function () {
                    $("#signupText").text("PLEASE WAIT");
                    intervalID = setInterval(doDots, 500);
                    $("#signupFormBtn").attr("disabled", true);
                },
                success: function (ret) {
                    $("#signupFormBtn").attr("disabled", false);
                    if (ret == "invalid") {
                        $("#signupText").text("SIGN UP");
                        clearInterval(intervalID);
                        $("#signupDots").html('');
                        $("#email").parent().removeClass("getStarted");
                        $("#userConf4").hide();
                        alert("Please supply a valid Email!");
                    }else{
                        form.submit();
                    }
                }
            });

            return false;
        }
    });
});

if ($("#articleFormHolder").length === 0) {
    $("#title").change(function () {
        $("#titleHolder").css({"background": "#01991a"});
        $("#getStartedText").hide();
        $("#userConf1").show();
    });

    $("#firstName").blur(function () {
        if ($(this).val()) {
            $(this).parent().addClass("getStarted");
            $("#userConf2").show();
        }
    });

    $("#lastName").blur(function () {
        if ($(this).val()) {
            $(this).parent().addClass("getStarted");
            $("#userConf3").show();
        }
    });

    $("#email").blur(function () {
        if ($(this).val()) {
            $(this).parent().addClass("getStarted");
            $("#userConf4").show();
        }
    });
}

//layout1
var mobileMenuToggled = false;
$("#mobileMenu").click(function () {
    if (mobileMenuToggled) {
        $("#topBarContainer ul").slideUp();
        mobileMenuToggled = false;
    } else {
        $("#topBarContainer ul").slideDown();
        mobileMenuToggled = true;
    }
});

$('#email').on('blur', function() {
    /**
     * Function changed because of too many popups for user
     * and confusion for users
     * task: [3148]
     */

    /**
     $(this).mailcheck({

        suggested: function(element, suggestion) {
            if(confirm("Did you mean " + suggestion.full + "?")){
                $("#email").val(suggestion.full);
            }
        },
        empty: function(element) {
            // callback code
        }
    });
     */
});

$(".vidPoss").fitVids();

