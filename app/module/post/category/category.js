
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "categoryCon";
    app.controller(controllerId,
        ["$scope", "common","type", category]);

    function category($scope, common,type) {

        //type can be event, lesson, media, news

        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



