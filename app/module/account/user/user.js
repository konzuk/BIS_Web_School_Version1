
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "userCon";
    app.controller(controllerId,
        ["$scope", "common", user]);

    function user($scope, common) {



        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



