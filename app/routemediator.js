(function () {
    'use strict';

    // Factory name is handy for logging
    var serviceId = 'routemediator';

    // Define the factory on the module.
    // Inject the dependencies. 
    // Point to the factory definition function.
    angular.module('app')
        .factory(serviceId,
            ['$location', '$rootScope', 'config','common', routemediator]);

    function routemediator($location, $rootScope, config,common) {
        // Define the functions and properties to reveal.
        var handleRouteChangeError = false;
        var service = {
            setRoutingHandlers: setRoutingHandlers
        };

     

        return service;
        
        function setRoutingHandlers() {
            handleRoutingErrors();
            updateDocTitle();
            handleRouteChangeStart();
        }

        function handleRoutingErrors() {
            $rootScope.$on('$routeChangeError',
                function (event, current, previous, rejection) {
                    if (handleRouteChangeError) { return; }
                    handleRouteChangeError = true;
                    var msg = 'Error routing: ' + (current && current.name)
                        + '. ' + (rejection.msg || '');
                    common.logger.logWarning(msg, current, serviceId, true);
                    $location.path('/home');
                });
        }

        function handleRouteChangeStart() {
            $rootScope.$on('$routeChangeStart',
                function () {
                    common.$broadcast(config.events.routeChangeEvent, { Running: true });
                });
        }

        function updateDocTitle() {
            $rootScope.$on('$routeChangeSuccess',
                function(event, current, previous) {
                    common.$broadcast(config.events.routeChangeEvent, { Running: false });
                    handleRouteChangeError = false;
                    var title = config.docTitle + ' ' + (current.title || '');
                    $rootScope.title = title;
                });
        }

        
    }
})();