// app.js
// depend: facebook module
/*define(['facebook'], function() {

      var fb = require('facebook');

    fb.init({
        appId: '600641303337567',
        status: true,
        xfbml: true
    });

    fb.getLoginStatus(function(response) {
        console.log(response);

        // make the API call  to get user object

        fb.api(
            "/me",
            function(response) {
                console.log(response);
                if (response && !response.error) {
                    // handle the result 
    }
}
    );
// Send request to facebook friends
// http://stackoverflow.com/questions/15804236/using-javascript-to-send-an-invite-to-facebook-friend

});

fb.login(function(response) {
    if (response.authResponse) {
        console.log('Welcome!  Fetching your information.... ', response.authResponse);
        FB.api('/me', function(response) {
            console.log('Good to see you, ' + response.name + '.');
        });
    } else {
        console.log('User cancelled login or did not fully authorize.');
    }
}); 


});
*/

(function() {
    var dependencies = [
        '../app/auth.sev',
        '../app/login.ctrl'

    ];

    define(dependencies, function(SimpleAuth, LoginController) {

        var $app = angular.module('app', ['ngRoute', 'ngAnimate']);
        $app
            .service("simpleAuth", SimpleAuth)
            .controller("loginController", LoginController);

        $app
            .config(function($routeProvider, $httpProvider, $locationProvider, $interpolateProvider) {
                $interpolateProvider.startSymbol('<%');
                $interpolateProvider.endSymbol('%>');
            });

        angular.bootstrap(document, ['app']);
        return $app;
    });

}());