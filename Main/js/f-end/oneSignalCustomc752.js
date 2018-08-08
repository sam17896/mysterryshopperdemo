if (typeof Object.assign != 'function') {  // Object.assign polyfill
    // Must be writable: true, enumerable: false, configurable: true
    Object.defineProperty(Object, "assign", {
        value: function assign(target, varArgs) { // .length of function is 2
            'use strict';
            if (target == null) { // TypeError if undefined or null
                throw new TypeError('Cannot convert undefined or null to object');
            }

            var to = Object(target);

            for (var index = 1; index < arguments.length; index++) {
                var nextSource = arguments[index];

                if (nextSource != null) { // Skip over if undefined or null
                    for (var nextKey in nextSource) {
                        // Avoid bugs when hasOwnProperty is shadowed
                        if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
                            to[nextKey] = nextSource[nextKey];
                        }
                    }
                }
            }
            return to;
        },
        writable: true,
        configurable: true
    });
}

var MyOneSignal = function (appId, config) {
    this.methodTag = ''
    this.appId = appId
    this.attempts = 0 // limit the number of times we will attempt to contact 1 signal
    this.playerId = ''
    this.isSupported = true
    this.hasDeniedPromptCookieName = 'hasDeniedMyOneSignalPrompt'
    var match = document.cookie.match(new RegExp(this.hasDeniedPromptCookieName + '=([^;]+)'))
    this.hasDeniedPrompt =  !!(match)
    this.init(config)
};

(function(win, MyOneSignal) {
    'use strict'
    var notifyButton = {
        enable: true, /* Required to use the notify button */ // we will set this to true if they are logged in.  Opens the gateway to allow them to manages notifications
        size: 'medium', /* One of 'small', 'medium', or 'large' */
        theme: 'default', /* One of 'default' (red-white) or 'inverse" (white-red) */
        position: 'bottom-right', /* Either 'bottom-left' or 'bottom-right' */
        offset: {
            bottom: '2px',
            left: '0px', /* Only applied if bottom-left */
            right: '2px' /* Only applied if bottom-right */
        },
        prenotify: true, /* Show an icon with 1 unread message for first-time site visitors */
        showCredit: false, /* Hide the OneSignal logo */
        text: {
        'tip.state.unsubscribed': 'Subscribe to notifications',
            'tip.state.subscribed': "You're subscribed to notifications",
            'tip.state.blocked': "You've blocked notifications",
            'message.prenotify': 'Click to subscribe to notifications',
            'message.action.subscribed': "Thanks for subscribing!",
            'message.action.resubscribed': "You're subscribed to notifications",
            'message.action.unsubscribed': "You won't receive notifications again",
            'dialog.main.title': 'Manage Site Notifications',
            'dialog.main.button.subscribe': 'SUBSCRIBE',
            'dialog.main.button.unsubscribe': 'UNSUBSCRIBE',
            'dialog.blocked.title': 'Unblock Notifications',
            'dialog.blocked.message': "Follow these instructions to allow notifications:"
        },
        colors: { // Customize the colors of the main button and dialog popup button
            'circle.background': 'rgb(0,0,0)',
            'circle.foreground': 'white',
            'badge.background': 'rgb(84,110,123)',
            'badge.foreground': 'white',
            'badge.bordercolor': 'white',
            'pulse.color': 'white',
            'dialog.button.background.hovering': 'rgb(77, 101, 113)',
            'dialog.button.background.active': 'rgb(70, 92, 103)',
            'dialog.button.background': 'rgb(84,110,123)',
            'dialog.button.foreground': 'white'
        }
    }
    var promptOptions = {
        siteName: 'Product Testing Alerts', /* Change bold title, limited to 30 characters */
        actionMessage: "Want us to send you updates for new roles & announcements straight to this device?", /* Subtitle, limited to 90 characters */
        exampleNotificationTitle: 'Here\'s one we made earlier…', /* Example notification title */
        exampleNotificationMessage: 'Asda shopper needed tomorrow..', /* Example notification message */
        exampleNotificationCaption: 'You can unsubscribe anytime', /* Text below example notification, limited to 50 characters */
        acceptButtonText: "Update Settings", /* Accept button text, limited to 15 characters */
        cancelButtonText: "No Thanks" /* Cancel button text, limited to 15 characters */
    }
    window.OneSignal = window.OneSignal || [];
    MyOneSignal.prototype = {
        isSupported: false,
        permission: '',
        init: function (config) {
            if (typeof config === 'undefined') {
                config = {}
            }
            if (config.hasOwnProperty('notifyButton')) {
                notifyButton = Object.assign(notifyButton, config.notifyButton)
            }
            if (config.hasOwnProperty('fullScreenPromptOptions')) {
                promptOptions = Object.assign(promptOptions, config.fullScreenPromptOptions)
            }
            var self = this
            window.OneSignal.push(["init", {
                appId: self.appId,
                autoRegister: false, // we do not want the browsers native register to pop up (we want to call our custom one once member)
                welcomeNotification: { // this is the notification users get after opting in.
                    disable: true
                },
                promptOptions: promptOptions,
                notifyButton: notifyButton
            }]);
            this.setUserId()
            this.listen()
            return this
        },
        bbLog: function (endpoint, data) {
            if (! this.playerId) return  // stop here this happens on initial signup with notificationPermissionChange firing without userId
            var xhr = new XMLHttpRequest(), self = this;
            xhr.open("POST", '/api/oneSignal/' + endpoint + '/' + self.playerId, true);
            xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            xhr.responseType = 'json';
            xhr.onload = function() {
                if (xhr.readyState !== 4) return
                if (xhr.status !== 200) { // don't need any response
                    /*
                    win.Raven.captureMessage('oneSignal-ajax '+ endpoint, {
                        extra: {
                            data: data,
                            playerId: self.playerId,
                            response: xhr.hasOwnProperty('response') ? xhr.response : 'no reponse',
                            status: xhr.status
                        }
                    })
                    */
                }
            };
            xhr.send(JSON.stringify(data));
        },
        fetchTags: function () {
            var xhr = new XMLHttpRequest(),
                self = this
            xhr.open("GET", '/api/oneSignal/getTags/' + Math.random());
            xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            xhr.responseType = 'json';
            xhr.onload = function() {
                if (xhr.readyState !== 4) return
                if (xhr.status === 200) {
                    var res = xhr.response
                    self.addTags(res.tags)
                }
            }
            xhr.send();
        },
        ready: function (isReady) {
            var self = this
            if (this.attempts > 5) return
            setTimeout(function () {
                try {
                    window.OneSignal.push(function() {
                        if (window.OneSignal.isPushNotificationsSupported()) {
                            isReady()
                        }
                    })
                } catch (e) {
                    self.attempts ++
                    self.ready()
                }
            }, 500)
        },
        shouldRegister: function (ready) {
            var self = this
            var time = this.attempts ? (this.attempts * 500) + 1000 : 500
            if (this.attempts > 5) return
            setTimeout(function () {
                try {
                    window.OneSignal.push(["getNotificationPermission", function(permission) {
                        self.permission = permission
                        ready()
                    }]);
                } catch (e) {
                    self.attempts ++
                    self.shouldRegister()
                }
            }, time)
        },
        fullScreenRegister: function () {
            if (this.permission === 'default' && ! this.hasDeniedPrompt) {  // only attempt if user has not seen the modal and onesignal does not have a permission on record
                this.methodTag = 'fullScreenRegister'
                window.OneSignal.push(function () {
                    window.OneSignal.registerForPushNotifications({
                        modalPrompt: true
                    });
                });
            }
        },
        browserRegister: function (methodTag) {
            if (! this.hasDeniedPrompt) {  // only attempt if user has not seen the modal and onesignal
                this.methodTag = typeof methodTag === 'undefined' ? 'browserRegister' : methodTag
                window.OneSignal.push(function () {
                    window.OneSignal.registerForPushNotifications();
                });
            }
        },
        slideDownRegister: function (methodTag) {
            if (this.permission === 'default' && ! this.hasDeniedPrompt) {  // only attempt if user has not seen the modal and onesignal and is not a member.  Will throw exception if already a member
                this.methodTag = typeof methodTag === 'undefined' ? 'slideDownRegister' : methodTag
                window.OneSignal.push(function () {
                    window.OneSignal.showHttpPrompt();
                })
            }
        },
        listen: function () {
            var self = this
            window.OneSignal.push(function () {
                window.OneSignal.on('notificationPermissionChange', function(permissionChange) {
                    self.debugTag()
                    // self.setUserId(function () {
                    self.bbLog('addActionNotificationPermissionChange', permissionChange)
                    // })
                })
                window.OneSignal.on('subscriptionChange', function (isSubscribed) {
                    self.debugTag()
                    self.setUserId(function () {
                        self.fetchTags()
                        self.bbLog('addActionSubscriptionChange', {
                            isSubscribed: + isSubscribed // coerce to int
                        })
                    })
                })
                window.OneSignal.on('customPromptClick', function(promptClickResult) {
                    if (! promptClickResult.hasOwnProperty('result')) return
                    if (promptClickResult.result === 'denied') {
                        // set cookie for the length of the session
                        document.cookie = self.hasDeniedPromptCookieName + '=1;'
                        self.hasDeniedPrompt = true
                    }
                });
            })
        },
        debugTag: function () { // debug tag for success type measure
            if (this.methodTag) {
                var self = this
                window.OneSignal.push(function () {
                    window.OneSignal.sendTags({
                        debugTag_SignupType: self.methodTag
                    })
                })
                this.methodTag = '' // reset it
            }
        },
        addTags: function (tagsObj) {
            window.OneSignal.push(function () {
                window.OneSignal.sendTags(tagsObj, function (tagsSent) { /* callback if you want */ })
            })
        },
        setUserId: function (callback) {
            if (this.playerId && typeof callback !== 'undefined') { // if we already have it don't request again
                callback()
                return
            }
            var self = this
            window.OneSignal.push(function () {
                window.OneSignal.getUserId(function (userId) {
                    self.playerId = userId
                    if (typeof callback !== 'undefined') {
                        callback()
                    }
                });
            })
        }
    }
})(window, MyOneSignal)

