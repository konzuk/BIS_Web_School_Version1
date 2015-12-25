(function () {
    'use strict';

    var app = angular.module('app', [
        'datatables', 'datatables.bootstrap','summernote',
        // Angular modules
        'angular-loading-bar',
        'ngFileUpload',
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
            };
            $rootScope.isActiveChild = function (child) {
                if($route.current) {
                    return $route.current.child === child;
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
                                title: "User",
                                activeTab: 'account',
                                templateUrl: "app/module/account/user/user.html",
                                controller: "accountCon",
                                href:'#/account/user',
                                parent:false,
                                child:'user',
                                resolve: {
                                    type: function () {
                                        return "User";
                                    }
                                },

                            }).when("/account/depositor", {
                                title: "Depositor",
                                activeTab: 'account',
                                templateUrl: "app/module/account/depositor/depositor.html",
                                controller: "accountCon",
                                href:'#/account/depositor',
                                parent:false,
                                child:'depositor',
                                resolve: {
                                    type: function () {
                                        return "Depositor";
                                    }
                                },

                            }).when("/account/student", {
                                title: "Student",
                                activeTab: 'account',
                                templateUrl: "app/module/account/student/student.html",
                                controller: "accountCon",
                                href:'#/account/student',
                                parent:false,
                                child:'student',
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
                                title: "Deposit",
                                activeTab: 'deposit',
                                templateUrl: "app/module/deposit/deposit.html",
                                controller: "depositCon",

                                href:'#/deposit/deposit',
                                parent:false,
                                child:'deposit',

                            }).when("/deposit/profit", {
                                title: "Profit",
                                activeTab: 'deposit',
                                templateUrl: "app/module/deposit/profit.html",
                                controller: "profitCon",
                                href:'#/deposit/profit',
                                parent:false,
                                child:'profit',


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
                                child:'lessonCategory',
                                resolve: {
                                    type: function () {
                                        return "lesson";
                                    }
                                },

                            }).when("/lesson/lesson", {
                                title: "Lesson",
                                activeTab: 'lesson',
                                templateUrl: "app/module/post/post/post.html",
                                controller: "postCon",
                                href:'#/lesson/lesson',
                                parent:false,
                                child:'lesson',
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
                                child:'eventCategory',
                                resolve: {
                                    type: function () {
                                        return "event";
                                    }
                                },

                            }).when("/event/event", {
                                title: "Event",
                                activeTab: 'event',
                                templateUrl: "app/module/post/post/post.html",
                                controller: "postCon",
                                href:'#/event/event',
                                parent:false,
                                child:'event',
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
                                child:'newsCategory',
                                resolve: {
                                    type: function () {
                                        return "news";
                                    }
                                },

                            }).when("/news/news", {
                                title: "News",
                                activeTab: 'news',
                                templateUrl: "app/module/post/post/post.html",
                                controller: "postCon",
                                href:'#/news/news',
                                parent:false,
                                child:'news',
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
                            }).when("/media/media", {
                                title: "Media",
                                activeTab: 'media',
                                templateUrl: "app/module/media/media.html",
                                controller: "postCon",
                                href:'#/media/media',
                                child:'media',
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
                                title: "Contact",
                                activeTab: 'page',
                                templateUrl: "app/module/page/page.html",
                                controller: "pageCon",
                                href:'#/page/contact',
                                parent:false,
                                child:'contact',
                                resolve: {
                                    type: function () {
                                        return "contact";
                                    }
                                },

                            }).when("/page/about", {
                                title: "About",
                                activeTab: 'page',
                                templateUrl: "app/module/page/page.html",
                                controller: "pageCon",
                                href:'#/page/about',
                                parent:false,
                                child:'about',
                                resolve: {
                                    type: function () {
                                        return "about";
                                    }
                                },

//end
            }).otherwise({
                redirectTo: "/home"
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
                        child: route.child,
                    });
                }
            }
        });
        return routes;
    };
})();