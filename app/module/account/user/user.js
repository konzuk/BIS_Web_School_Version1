
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "userCon";
    app.controller(controllerId,
        ["$scope","$uibModal", "common","data", user]);

    function user($scope,$uibModal, common,data) {



        $scope.showCreateUser = function (size) {

            var modalInstance = $uibModal.open({
                animation: true,
                templateUrl: 'app/module/account/user/AddEditUser.html',
                controller: 'addEditUserCon',
                size: size
                //resolve: {
                //    user: function () {
                //        return user;
                //    }
                //}
            });
            modalInstance.result.then(function (selectedItem) {
                getRecords();
            });
        };

        $scope.toggleAnimation = function () {
            $scope.animationsEnabled = !$scope.animationsEnabled;
        };


        activate();

        function getRecords()
        {
            data.get('account', 'get_all_accounts','User').then(function (obj) {

                if(obj.data)
                {
                    $scope.users = obj.data;
                }
                else
                {

                }
            });
        }
        function activate() {
            common.activateController([getRecords()], controllerId)
                 .then(function () {});
        }
    };




})();

// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $uibModal service used above.




