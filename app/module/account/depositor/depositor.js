
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "depositorCon";
    app.controller(controllerId,
        ["$scope", "common", depositor]);

    function depositor($scope, common) {



        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



