(function () {
    'use strict';

    var app = angular.module('app', [
        
        // Angular modules 
        'ngAnimate',        // animations
        'ngRoute',          // routing
        'ngSanitize',       // sanitizes html bindings (ex: sidebar.js)
        'ngCookies',        // Cookie
        'ui.bootstrap',
        'common'    // common functions, logger, spinner
    ]);

    // Handle routing errors and success events
    app.run(['$route', '$rootScope', 'routemediator',
        function ($route, $rootScope, routemediator) {
            // Include $route to kick start the router.
            routemediator.setRoutingHandlers();

        }]);

    app.config(["$routeProvider",
        function ($routeProvider) {
            $routeProvider.
                when("/home", {
                    title: "Home",
                    templateUrl: "app/module/home/home.html",
                    controller: "homeCon",
                    activeTab: 'home',
                    parent:true
                }).when("/about", {
                    title: "About",
                    templateUrl: "app/module/about/about.html",
                    controller: "aboutCon",
                    activeTab: 'about',
                    parent:true
                //}).when("/about/about", {
                //    title: "About",
                //    templateUrl: "app/module/about/about.html",
                //    controller: "aboutCon",
                //    activeTab: 'about',
                //    parent:false,
                }).when("/user", {
                title: "User",
                templateUrl: "app/module/user/user.html",
                controller: "userCon",
                activeTab: 'user',
                parent:false
            }).otherwise({
                    redirectTo: "/home"
                });
        }
    ]);
})();