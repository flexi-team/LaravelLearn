var base = "../../";
require.config({
    shim: {
        'facebook': {
            exports: 'FB'
        }
    },
    paths: {
        'facebook': '//connect.facebook.net/en_US/all',
        'helper': '../app/helper.utils'
    }
})
require([
    base + 'packages/social/fb',
    // Load jquery library
    base + 'packages/jquery/jquery-1.11.0.min',
    base + 'packages/jquery/jquery-migrate-1.2.1.min',
    // Load angularjs library

    // Load Bootstrap Libraries
    base + 'packages/bootstrap/bootstrap.min',

    base + 'packages/angularjs/angular.min',
    // Load JS APP
    base + 'packages/app/app',
    base + 'packages/tools/mapbox/mapbox',
    base + 'packages/tools/owl-carousel/owl.carousel.min'

]);