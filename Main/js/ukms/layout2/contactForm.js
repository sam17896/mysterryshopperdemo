/**
 * Checks user message input and checks whether selected department
 * 'what is your query about' is the best suited based on keywords.
 * If so, a light box is presented with a recomondation which you can accept or decline
 * If not, submits as normal.
 * TODO: RM: refactor contact form js in faqs.php into pt.contact form
 */
( function(win, $) {
    "use strict"

    var pt =  {
        contactForm : {}
    }
    pt.contactForm = function() {
        // set some properties
        this.$contactEmailReason = $('#contactEmailReason');
        this.$contactMessage = $('#contactMessage');
        // this will set to true for all options now, but behaviour can be changed be removing items from query lookup and keywords
        this.isKeywordCheckRequired = false;
        this.$contactForm = $('#contactForm');
        this.isKeywordFound = null;
        this.isValid = true;
        this.departmentSet = 'customerService';
        this.recommendedDepartment = 'Customer Service';
        this.defaultRecommendedDepartment = 'Customer Service'; // fallback right at end if we have an undefined
        // used for basic validation
        this.basicFields = [
            'contactName', 'contactEmail', 'contactMessage', 'contactEmailReason'
        ];
        // lookup to get keywords object name based on department selected
        this.queryReasonLookup = {
            'Did not receive my confirmation email' : 'notGotEmailConf',
            'Affiliate Program' : 'affiliate',
            'I want to unsubscribe' : 'unsubscribe',
            'Customer Service' : 'customerService',
        };
        this.keywords = {
            affiliate: {
                keywords: ['traffic', 'CPL', 'CPA', 'rate', 'commission', 'comission', 'commision', 'affiliate', 'program', 'rate', 'programme', 'program'],
                // recommended department if found
                departmentChange: 'Affiliate Program'
            },
            notGotEmailConf: {
                keywords: ['welcome', 'confirmation', 'validate', 'validation'],
                departmentChange: 'Did not receive my confirmation email'
            },
            unsubscribe: {
                keywords: ['unsubscribe', '3rd party', 'advertising', 'notifications', 'third party'],
                departmentChange: 'I want to unsubscribe'
            },
            customerService : {
                keywords: [],
                departmentChange: 'Customer Service'
            }
        };
        this.init();
    }
    pt.contactForm.prototype = {
        init: function () {
            // todo: reset properties.
            this.stopListners().startListners();
        },
        stopListners: function() {
            $('#submitButton, #aysYes, #aysNo').off('click');
            return this;
        },
        startListners: function () {
            var self = this;
            $('#submitButton').on('click', function (e) {
                e.preventDefault();
                self.onFormSubmit();
            });
            this.$contactEmailReason.on('change', function() {
                self.setQueryReason();
            })
        },
        onFormSubmit: function() {

            this.quickValidate();

            if( ! this.isValid ) {
                this.stopListners().startListners();
                return false;
            }

            //console.log('this', this);
            this.setQueryReason().checkKeywords();

            // another protection
            if( typeof this.departmentSet === 'undefined' )
                this.areYouSure();

            if( this.isKeywordCheckRequired // this was from when some departments did not need a check
                && ! this.isKeywordFound // we did not find a keyword word from chosen department
                && this.recommendedDepartment !== this.keywords[this.departmentSet].departmentChange // make sure we are not already on department (happens with customer services as it has no keywords and is default)
            ) {
                // were not sure if you have the department
                this.areYouSure();
            } else {
                this.submitForm();
            }
        },
        areYouSure: function() {
            var self = this;

            /* our protection friend from a bad day */
            if( typeof this.recommendedDepartment === 'undefined')
                this.recommendedDepartment = this.defaultRecommendedDepartment;

            $('#ays-message span').html('Based on your query, our <b>'+this.recommendedDepartment+'</b> department would be better suited to help you.');
            $('#ays-message span').append('&nbsp;&nbsp; To ensure your query is answered as quickly as possible, please confirm that you would like your enquiry to be directed to this department');
            $.magnificPopup.open({
                type:'inline',
                items: {
                    src: $('#areYouSureHolder')
                }
            });

            $('#aysYes').on('click', function(e) {
                // we are going to change the department based on recomondation
                e.stopPropagation();
                self.$contactEmailReason.val( self.recommendedDepartment );
                // probably want to remove dependencies if???
                self.submitForm();
            });

            $('#aysNo').on('click', function(e) {
                // we are going to keep with chosen
                e.stopPropagation();
                self.submitForm();
            });

        },
        submitForm: function() {
            //alert(this.$contactEmailReason.val())
            //alert('we are about to submit')
            this.$contactForm.submit();
        },
        setQueryReason: function() {
            this.departmentSet = this.queryReasonLookup[this.$contactEmailReason.val()];
            this.isKeywordCheckRequired = ( typeof this.departmentSet !== 'undefined' );
            return this;
        },
        checkKeywords: function () {
            if( !this.isKeywordCheckRequired || typeof this.departmentSet === 'undefined' )
                return this;

            var messageContent = this.$contactMessage.val(),
                len = this.keywords[this.departmentSet].keywords.length,
                keywordArr = this.keywords[this.departmentSet].keywords,
                self = this,
                i = 0;

            for (; i < len; ++i) {
                var haystack = keywordArr[i].toString().toLowerCase();
                if (messageContent.toLowerCase().indexOf( haystack ) != -1) {
                    self.isKeywordFound = true;
                    break
                }
            }

            /**
             * Loop through keyword departments and check if there is a recommondation
             */
            $.each( this.keywords, function(index, props) {
                i = 0;
                if( index !== self.departmentSet ) {
                    len = self.keywords[index].keywords.length;
                    for (; i < len; ++i) {
                        var haystack = props.keywords[i].toString().toLowerCase();
                        if (messageContent.toLowerCase().indexOf( haystack ) != -1) {
                            // this would be our recomondation
                            self.recommendedDepartment = props.departmentChange;
                            break
                        }
                    }
                }
            });

            return this;
        },
        quickValidate: function() {
            var i = 0,
                self = this;

            this.isValid = true;

            $('.form-error').html('');

            for(; i < this.basicFields.length; ++i) {
                var $elem = $('#'+this.basicFields[i]);
                if( ! $elem.val() ) {
                    $elem.parent('div').find('.form-error').html('Required field');
                    self.isValid = false;
                }
            }
        }
    };

    $(document).ready( function() {
        new pt.contactForm();
    });

})( window, jQuery )