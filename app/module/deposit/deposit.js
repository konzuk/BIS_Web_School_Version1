
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "depositCon";
    app.controller(controllerId,
        ["$scope", "common", deposit]);

    function deposit($scope, common) {



        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



