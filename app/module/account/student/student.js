
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "studentCon";
    app.controller(controllerId,
        ["$scope", "common", student]);

    function student($scope, common) {



        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



