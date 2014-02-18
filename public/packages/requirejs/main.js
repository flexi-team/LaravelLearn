var base = "../../";
require.config({
    shim: {
        'facebook': {
            exports: 'FB'
        }
    },
    paths: {
        'facebook': '//connect.facebook.net/en_US/all'
    }
})
require([
    base + 'packages/social/fb',
    // Load jquery library
    base + 'packages/jquery/jquery-1.11.0.min',
    // Load angularjs library
    base + 'packages/angularjs/angular.min',
    // Load JS APP
    base + 'packages/app/app',

]);