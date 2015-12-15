(function () {
    "use strict";
    var commonModule = angular.module("common", []);
    commonModule.factory("common",
        ["$q", "$rootScope", "$timeout", "config","logger",  common]);


    commonModule.provider("commonConfig", function () {
        this.config = {
        };
        this.$get = function () {
            return {
                config: this.config
            };
        };
    });

    function common($q, $rootScope, $timeout, config,logger) {

        var service;
        service = {
            $broadcast: $broadcast,
            $q: $q,
            $timeout: $timeout,
            activateController: activateController,
            logger: logger,
            //spinner: spinner,
        };

        return service;

        function activateController(promises, controllerId) {
            return $q.all(promises).then(function (eventArgs) {
                var data = { controllerId: controllerId };
                $broadcast(config.events.controllerActivateEvent, data);
            });
        }

        function $broadcast(event, data) {
            return $rootScope.$emit(event,data);
        }

        
        
    }
})();