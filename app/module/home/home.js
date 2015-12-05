
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "homeCon";
    app.controller(controllerId,
        ["$scope", "common", home]);

    function home($scope, common) {

        $scope.message = "This is Home Page";
        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



