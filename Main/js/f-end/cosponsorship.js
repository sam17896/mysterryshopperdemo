var cosponObj =  {};


(function(win, $, Raven) {

    cosponObj = {
        fetchData: null,
        $template: null,
        $injectTarget: null,
        init: function() {
            this.$template = $('#cosponsorshipEntryTemplate');
            this.$injectTarget = $('#cosponsorshipContainerTarget');
            if(! this.$template.length) {
                throw new Error('Could not find template');
            }
            if(! this.$injectTarget.length) {
                throw new Error('Could not find target');
            }
            return this;
        },
        fetch: function() {
            var self = this;
            $.ajax({
                url: '/custom_pages/getCurrentCosponsors',
                dataType: 'JSON',
                success: function(ret) {
                    //console.log('retData',ret);
                    self.fetchData = ret.data;
                    self.build();
                },
                error: function(jqXHR, ajaxSettings, thrownError) {
                    Raven.captureMessage(thrownError || jqXHR.statusText, {
                        extra: {
                            url: ajaxSettings.url,
                            status: jqXHR.status,
                            error: thrownError || jqXHR.statusText,
                            response: jqXHR.responseText.substring(0, 100)
                        }
                    });
                    self.build();
                }
            })
        },
        build: function() {
            if(! this.fetchData || ! this.fetchData.length) {
                this.$injectTarget.html('<div class="center text-center"><b>Currently there are no active cosponsors</b></div>');
                return;
            }
            this.$injectTarget.html('');
            this.fetchData.forEach(function(row) {
                var $cloned = this.$template.clone();  // create local cloned row
                $cloned.find('img').prop('src', row.img_src);  // populate new targets
                $cloned.find('.csDataContainer .csDataName').html(row.cospon_name);
                $cloned.find('.csDataContainer a.csDataLink').prop('href',row.cospon_link);
                $cloned.find('.csDataContainer .csDataMeta').html(row.cospon_additional);
                this.$injectTarget.append($cloned.html()); // append content
            }.bind(this))
        }
    };

})(window, jQuery, Raven);

