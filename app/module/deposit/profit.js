
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "profitCon";
    app.controller(controllerId,
        ["$scope", "common", profit]);

    function profit($scope, common) {



        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



