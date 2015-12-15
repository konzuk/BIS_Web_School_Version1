(function () {
    "use strict";

    var controllerId = "shellCon";

    angular.module("app").controller(controllerId,
        ["$rootScope", "$scope","$route", "common", "config", shell]);





    function shell($rootScope, $scope,$route, common, config) {

        var getLogFn = common.logger.getLogFn;
        var log = getLogFn(controllerId);

        $scope.isRouteChanging = true;
        $scope.isDataGetting = false;
        $scope.isFirstLoad = true;

        $scope.activeTab = $route.current.activeTab;
        $scope.navBarLists = getRoutes($route);

        activate();


        function activate() {
            common.activateController([], controllerId)
                 .then(function () {
                     $scope.isFirstLoad = false;

                });
        }

        $rootScope.$on(config.events.controllerActivateEvent,
            function (event, args) {
                log("Controller Successful Activated",args.controllerId)
            }
        );

       
        $rootScope.$on(config.events.routeChangeEvent,
            function(event, args) {
                $scope.isRouteChanging = args.Running;
            }
        );

        $rootScope.$on(config.events.gettingDataEvent,
           function (event, args) {
               $scope.isDataGetting = args.Running;


           }
       );

    };
})();