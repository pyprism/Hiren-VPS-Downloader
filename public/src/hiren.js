/**
 * Created by prism on 10/27/14.
 */
angular.module('hiren', ['ngRoute'])
    .config( function($routeProvider, $locationProvider){
        $routeProvider
            .when('/ssh', {
                templateUrl: 'views/ssh.html',
                controller: 'sshx'

            });
            //.otherwise("/");
        $locationProvider.html5Mode(true);
    })
    .controller('sshx', function($scope){
        $scope.ssh = "example";
        console.log('s');
    });