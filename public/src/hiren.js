/**
 * Created by prism on 10/27/14.
 */
angular.module('hiren', ['ngRoute']).
    config( function($routeProvider, $locationProvider){
        $routeProvider
            .when('/ssh', {
                templateUrl: '../views/ssh.html',
                controller: 'ssh'

            });
        $locationProvider.html5Mode(true);
    }).
    controller('ssh', function($scope){
        $scope.xox = "Sa";
    });