
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "pageCon";
    app.controller(controllerId,
        ["$scope", "common","type", page]);

    function page($scope, common,type) {

        //type can be contact, about

        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



