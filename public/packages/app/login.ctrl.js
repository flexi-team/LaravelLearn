(function() {

    define(['facebook', 'helper'], function(fb, helper) {
        var LoginController = function($scope, $http, simpleAuth) {

            $scope.user = {
                email: "",
                password: ""
            };

            $scope.login = function() {
                console.log($scope.user, helper.api);
                $http.post(
                    helper.api + "api-login",
                    $scope.user
                ).success(function(data) {
                    console.log("Login success!", data);
                }).error(function() {
                    console.log("Login fail!", data);
                });

            }

            $scope.signup = function() {

            }
        };

        // Publish the constructor/construction array
        return ["$scope", "$http", "simpleAuth", LoginController];
    });

}());