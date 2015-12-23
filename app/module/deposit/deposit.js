
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "depositCon";
    app.controller(controllerId,
        ["$scope", "common", deposit]);

    function deposit($scope, common) {


        //$scope.delete =  function (deposit)
        //{
        //    if (confirm("Do you want to delete deposit: " + acc.UserName)) {
        //        data.post('deposit', "delete_deposit", acc).then(function (obj) {
        //            if (obj.data) {
        //                getRecords();
        //            }
        //            else {
        //
        //            }
        //        });
        //    }
        //};
        //
        //$scope.showCreateDeposit = function (size) {
        //
        //    var modalInstance = $uibModal.open({
        //        animation: true,
        //        templateUrl: 'app/module/deposit/addEditDepositDialog.html',
        //        controller: 'addEditDepositDialogCon',
        //        backdrop: 'static',
        //        size: size,
        //        resolve: {
        //            type: function () {
        //                return type;
        //            },
        //            depositModel: function () {
        //                return null;
        //            }
        //        }
        //    });
        //
        //    modalInstance.result.then(function (data) {
        //        if(data) {
        //            getRecords();
        //        }
        //        else {
        //            //todo
        //        }
        //    });
        //};
        //
        //
        //$scope.showUpdateDeposit = function (size, deposit) {
        //
        //    var modalInstance = $uibModal.open({
        //        animation: true,
        //        templateUrl: 'app/module/deposit/addEditDepositDialog.html',
        //        controller: 'addEditDepositDialogCon',
        //        backdrop: 'static',
        //        size: size,
        //        resolve: {
        //            type: function () {
        //                return type;
        //            },
        //            depositModel: function () {
        //                return angular.copy(deposit);
        //            }
        //        }
        //    });
        //
        //    modalInstance.result.then(function (data) {
        //        if(data) {
        //            getRecords();
        //        }
        //        else {
        //            //todo
        //        }
        //    });
        //};
        //
        //$scope.toggleAnimation = function () {
        //    $scope.animationsEnabled = !$scope.animationsEnabled;
        //};
        //
        //function getRecords()
        //{
        //    data.get('deposit', 'get_all_deposits',type).then(function (obj) {
        //
        //        if(obj.data)
        //        {
        //            $scope.deposits = obj.data;
        //        }
        //        else
        //        {
        //
        //        }
        //    });
        //}

        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {

                 });
        }
    };
})();



