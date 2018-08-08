if(typeof cosponObj === 'object') {
    cosponObj.init().fetch();
} else {
    Raven.captureMessage('cosponObj was not loaded');
}
