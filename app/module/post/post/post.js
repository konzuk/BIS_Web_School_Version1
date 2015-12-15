
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "postCon";
    app.controller(controllerId,
        ["$scope", "common","type", post]);

    function post($scope, common,type) {

        //type can be event, lesson, media, news

        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



