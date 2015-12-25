
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "mediaCon";
    app.controller(controllerId,
        ["$scope", "common","type", media]);

    function media($scope, common,type) {

        //type can be event, lesson, media, news

        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



