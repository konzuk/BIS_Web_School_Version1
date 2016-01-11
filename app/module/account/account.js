
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "accountCon";
    app.controller(controllerId,
        ["$scope","$uibModal", "common","data","type", account]);

    function account($scope,$uibModal, common,data, type) {
        //type can be user,depositor,student


        $scope.delete =  function (acc)
        {
            if (confirm("Do you want to delete account: " + acc.UserName)) {
                data.post('account', "delete_account", acc).then(function (obj) {
                    if (obj.data) {
                        getRecords();
                    }
                    else {

                    }
                });
            }
        };

        $scope.resetPassword =  function (acc)
        {
            if (confirm("Do you want to reset password")) {
                data.post('account', "reset_password", acc).then(function (obj) {
                    if (obj.data) {
                        //getRecords();
                        alert("Reset password success!")
                    }
                    else {

                    }
                });
            }
        };

        $scope.activateAccount =  function (acc)
        {
            if (confirm("Do you want to " + (acc.IsActive == 1 ? "Deactivate" : "Activate") + " account?")) {
                acc.IsActive = acc.IsActive == 1 ? 0 : 1 ;
                data.post('account', "activate_account", acc).then(function (obj) {
                    if (obj.data) {
                        //getRecords();
                    }
                    else {
                        acc.IsActive = acc.IsActive == 1 ? 0 : 1 ;
                    }
                });
            }
        };

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
                    },
                    accountModel: function () {
                        return null;
                    }
                }
            });

            modalInstance.result.then(function (data) {
                if(data) {
                    getRecords();
                }
                else {
                    //todo
                }
            });
        };


        $scope.showUpdateAccount = function (size, account) {

            var modalInstance = $uibModal.open({
                animation: true,
                templateUrl: 'app/module/account/addEditAccountDialog.html',
                controller: 'addEditAccountDialogCon',
                backdrop: 'static',
                size: size,
                resolve: {
                    type: function () {
                        return type;
                    },
                    accountModel: function () {
                        return angular.copy(account);
                    }
                }
            });

            modalInstance.result.then(function (data) {
                if(data) {
                    getRecords();
                }
                else {
                    //todo
                }
            });
        };

        $scope.toggleAnimation = function () {
            $scope.animationsEnabled = !$scope.animationsEnabled;
        };

        activate();

        function getRecords()
        {
            data.get('account', 'get_all_accounts',type).then(function (obj) {

                if(obj.data)
                {
                    $scope.accounts = obj.data;
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




