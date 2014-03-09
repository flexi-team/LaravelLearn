To Create an Angular Controller you need to do as following step:

1.  Create a controller js file at /public/packages/app/[PART.]CONTROLLERNAME.ctrl.js
    Ex: create.user.ctrl.js, list.user.ctrl.js

2.  Use the below structure for controller file

(function() {

    define([DEPENDENCIES_LIST], function(DEPENDECIES_Vars) {
        var ControllerName = function($scope, $http, simpleAuth) {

            // NORMAL Scope data, functions and other functions just as normal
            $scope.data = {
                
            };

            
        };

        // Publish the constructor/construction array
        return ["$scope", "$http", "simpleAuth", LoginController];
    });

}());


3. Add this to app.js
 $app.controller("ControllerName", ControllerVar_From_Dep_Var);