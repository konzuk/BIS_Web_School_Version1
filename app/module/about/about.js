
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "aboutCon";
    app.controller(controllerId,
        ["$scope", "common", about]);

    function about($scope, common) {

        $scope.message = "This is About Page";

        $scope.submit = submit();
        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
        function submit() {
            common.activateController([], controllerId)
                .then(function () {});
        }
    };
})();



