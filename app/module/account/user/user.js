
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "userCon";
    app.controller(controllerId,
        ["$scope","$uibModal", "common","data", user]);

    function user($scope,$uibModal, common,data) {

        data.get('account', 'manage_user').then(function (obj) {
            $scope.users = obj.data.Models;
        });
        $scope.createUser = function (size) {

            var modalInstance = $uibModal.open({
                animation: true,
                templateUrl: 'app/module/account/user/AddEditUser.html',
                controller: 'addEditUserCon',
                size: size
                //resolve: {
                //    items: function () {
                //        return $scope.items;
                //    }
                //}
            });
            modalInstance.result.then(function (selectedItem) {
                data.get('account', 'manage_user').then(function (obj) {
                    $scope.users = obj.data.Models;
                });
            });
        };

        $scope.toggleAnimation = function () {
            $scope.animationsEnabled = !$scope.animationsEnabled;
        };


        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };




})();

// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $uibModal service used above.




