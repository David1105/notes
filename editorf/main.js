/* eslint no-alert: 0 */

'use strict';

//
// Here is how to define your module
// has dependent on mobile-angular-ui
//
var app = angular.module('MobileNotes', [
    'ngRoute',
    'mobile-angular-ui',

    // touch/drag feature: this is from 'mobile-angular-ui.gestures.js'.
    // This is intended to provide a flexible, integrated and and
    // easy to use alternative to other 3rd party libs like hammer.js, with the
    // final pourpose to integrate gestures into default ui interactions like
    // opening sidebars, turning switches on/off ..
    'mobile-angular-ui.gestures'
]);

app.run(function ($transform) {
    window.$transform = $transform;
});

//
// You can configure ngRoute as always, but to take advantage of SharedState location
// feature (i.e. close sidebar on backbutton) you should setup 'reloadOnSearch: false'
// in order to avoid unwanted routing.
//
app.config(function ($routeProvider) {
    $routeProvider.when('', {
        templateUrl: 'list.php',
        reloadOnSearch: false
    });
    $routeProvider.when('/login', {
        templateUrl: 'login.html',
        reloadOnSearch: false
    });
	    $routeProvider.when('/reg', {
        templateUrl: 'reg.html',
        reloadOnSearch: false
    });
});


//
// For this trivial demo we have just a unique MainController
// for everything
//
app.controller('MainController', function ($rootScope, $scope) {

    $scope.swiped = function (direction) {
        alert('Swiped ' + direction);
    };

    // User agent displayed in home page
    $scope.userAgent = navigator.userAgent;

    // Needed for the loading screen
    $rootScope.$on('$routeChangeStart', function () {
        $rootScope.loading = true;
    });

    $rootScope.$on('$routeChangeSuccess', function () {
        $rootScope.loading = false;
    });

    //
    // 'Login' screen
    //
    $scope.rememberMe = true;
    $scope.email = '';

    $scope.login = function () {
        alert('Вы заполнили все поля');
    };

});