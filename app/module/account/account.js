
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "accountCon";
    app.controller(controllerId,
        ["$scope","$uibModal", "common","data", account]);

    function account($scope,$uibModal, common,data, type) {
        //type can be user,depositor,student
        $scope.showCreateAccount = function (size) {

            var modalInstance = $uibModal.open({
                animation: true,
                templateUrl: 'app/module/account/addEditAccountDialog.html',
                controller: 'addEditAccountDialogCon',
                backdrop: 'static',
                size: size,
                resolve: {
                    type: function () {
                        return type;
                    }
                    //account: function () {
                    //    return account;
                    //}
                }
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




