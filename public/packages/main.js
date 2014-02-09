var sampleApp = angular.module('sampleApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});




var testCtrl=function($scope,$http){
	$scope.name="seng panhna";
}