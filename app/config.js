(function () {
    'use strict';

    var app = angular.module('app');

    var events = {
        controllerActivateEvent: 'controller.activateSuccess',
        routeChangeEvent: 'route.changing',
        gettingDataEvent: 'data.getting'
    };

    var routes = {
        controllerActivateEvent: 'controller.activateSuccess',
        routeChangeEvent: 'route.changing',
        gettingDataEvent: 'data.getting'
    };

    var config = {
        appErrorPrefix: '[BIS Error] ',
        docTitle: '',
        events: events,
        version: '1.0.0',

    };

    app.constant('DEBUG_MODE', /*DEBUG_MODE*/true /*DEBUG_MODE*/);

    app.value('config', config);

    app.config(['$logProvider', 'DEBUG_MODE', function ($logProvider, DEBUG_MODE) {
        // turn debugging off/on (no info or warn)
        if ($logProvider.debugEnabled) {
            $logProvider.debugEnabled(DEBUG_MODE);
        }
    }]);


})();