(function () {
    'use strict';

    var app = angular.module('app', [
        'datatables', 'datatables.bootstrap',
        // Angular modules 
        'ngAnimate',        // animations
        'ngRoute',          // routing
        'ngMessages',       // validation
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
            $rootScope.navBarLists = getRoutes($route);
            $rootScope.isActive = function (activeTab) {
                if($route.current) {
                    return $route.current.activeTab === activeTab;
                }
                else return false;
            }
        }]);

    app.config(["$routeProvider",
        function ($routeProvider) {
            $routeProvider.
//start home tab
            when("/home", {
                title: "Home",
                activeTab: 'home',
                templateUrl: "app/module/home/home.html",
                controller: "homeCon",
                icon:"md-home",
                href:'#/home',
                parent:true,
//start account tab
            }).when("/account", {
                title: "Account",
                activeTab: 'account',
                redirectTo: "/account/user",
                icon: 'md-person',
                parent:true,
                            }).when("/account/user", {
                                title: "Manage User",
                                activeTab: 'account',
                                templateUrl: "app/module/account/user/user.html",
                                controller: "addEditAccountDialogCon",
                                href:'#/account/user',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "User";
                                    }
                                },

                            }).when("/account/depositor", {
                                title: "Manage Depositor",
                                activeTab: 'account',
                                templateUrl: "app/module/account/depositor/depositor.html",
                                controller: "addEditAccountDialogCon",
                                href:'#/account/depositor',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "Depositor";
                                    }
                                },

                            }).when("/account/student", {
                                title: "Manage Student",
                                activeTab: 'account',
                                templateUrl: "app/module/account/student/student.html",
                                controller: "addEditAccountDialogCon",
                                href:'#/account/student',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "Student";
                                    }
                                },

//start deposit tab
            }).when("/deposit", {
                redirectTo: "/deposit/deposit",
                title: "Deposit",
                icon:'md-attach-money',
                activeTab: 'deposit',
                parent:true
                            }).when("/deposit/deposit", {
                                title: "Manage Deposit",
                                activeTab: 'deposit',
                                templateUrl: "app/module/deposit/deposit.html",
                                controller: "depositCon",
                                href:'#/deposit/deposit',
                                parent:false,


                            }).when("/deposit/profit", {
                                title: "Profit",
                                activeTab: 'deposit',
                                templateUrl: "app/module/deposit/profit.html",
                                controller: "profitCon",
                                href:'#/deposit/profit',
                                parent:false,


//start lesson tab
            }).when("/lesson", {
                redirectTo: "/lesson/lesson",
                title: "Lesson",
                activeTab: 'lesson',
                icon:'md-description',
                parent:true

                            }).when("/lesson/category", {
                                title: "Lesson Category",
                                activeTab: 'lesson',
                                templateUrl: "app/module/post/category/category.html",
                                controller: "categoryCon",
                                href:'#/lesson/category',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "lesson";
                                    }
                                },

                            }).when("/lesson/lesson", {
                                title: "Manage Lesson",
                                activeTab: 'lesson',
                                templateUrl: "app/module/post/post/post.html",
                                controller: "postCon",
                                href:'#/lesson/lesson',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "lesson";
                                    }
                                },

//start event tab
            }).when("/event", {
                redirectTo: "/event/event",
                title: "Event",
                activeTab: 'event',
                icon:'md-event',
                parent:true

                            }).when("/event/category", {
                                title: "Event Category",
                                activeTab: 'event',
                                templateUrl: "app/module/post/category/category.html",
                                controller: "categoryCon",
                                href:'#/event/category',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "event";
                                    }
                                },

                            }).when("/event/event", {
                                title: "Manage Event",
                                activeTab: 'event',
                                templateUrl: "app/module/post/post/post.html",
                                controller: "postCon",
                                href:'#/event/event',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "event";
                                    }
                                },



//start news tab
            }).when("/news", {
                redirectTo: "/news/news",
                title: "News",
                activeTab: 'news',
                icon:'md-chat',
                parent:true

                            }).when("/news/category", {
                                title: "News Category",
                                activeTab: 'news',
                                templateUrl: "app/module/post/category/category.html",
                                controller: "categoryCon",
                                href:'#/news/category',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "news";
                                    }
                                },

                            }).when("/news/news", {
                                title: "Manage News",
                                activeTab: 'news',
                                templateUrl: "app/module/post/post/post.html",
                                controller: "postCon",
                                href:'#/news/news',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "news";
                                    }
                                },

//start media tab
            }).when("/media", {
                redirectTo: "/media/media",
                title: "Media",
                activeTab: 'media',
                icon:'md-perm-media',
                parent:true

                            }).when("/media/category", {
                                title: "Media Category",
                                activeTab: 'media',
                                templateUrl: "app/module/post/category/category.html",
                                controller: "categoryCon",
                                href:'#/media/category',

                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "media";
                                    }
                                },

                            }).when("/media/media", {
                                title: "Manage Media",
                                activeTab: 'media',
                                templateUrl: "app/module/post/post/post.html",
                                controller: "postCon",
                                href:'#/media/media',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "media";
                                    }
                                },

//start page tab
            }).when("/page", {
                redirectTo: "/page/contact",
                title: "Page",
                activeTab: 'page',
                icon:'md-web',
                parent:true

                            }).when("/page/contact", {
                                title: "Manage Contact",
                                activeTab: 'page',
                                templateUrl: "app/module/page/page.html",
                                controller: "pageCon",
                                href:'#/page/contact',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "contact";
                                    }
                                },

                            }).when("/page/about", {
                                title: "Manage About",
                                activeTab: 'page',
                                templateUrl: "app/module/page/page.html",
                                controller: "pageCon",
                                href:'#/page/about',
                                parent:false,
                                resolve: {
                                    type: function () {
                                        return "about";
                                    }
                                },

//end
            }).otherwise({
                redirectTo: ""
            });
        }
    ]);

    function getRoutes($route){
        var routes = [];
        angular.forEach($route.routes, function(route) {
            if (route.activeTab && route.parent) routes.push({
                href: route.href,
                text: route.title,
                icon: route.icon,
                activeTab: route.activeTab,
                child: [],
            });
        });
        angular.forEach($route.routes, function(route){
            if(route.activeTab && !route.parent)
            {
                var parent = routes.filter(function(item) { return item.activeTab === route.activeTab; })[0];
                if (parent)
                {
                    parent.child.push({
                        href: route.href,
                        text: route.title,
                        activeTab: route.activeTab,
                    });
                }
            }
        });
        return routes;
    };
})();