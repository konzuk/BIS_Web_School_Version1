/**
 * Created by konzuk on 12/18/2015.
 */

(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "addEditAccountDialogCon";
    app.controller(controllerId,
        ["$scope","$uibModalInstance","data","type","accountModel", account]);

    function account ($scope, $uibModalInstance,data,type,accountModel) {


        var typeObj = "";

        if(type == 'User')
        {
            typeObj = "User";
        }

        if(type == 'Depositor')
        {
            typeObj = "Depositor";
        }

        if(type == 'Student')
        {
            typeObj = "Student";
        }

        var controller = "account";


        $scope.myFile = "/app/template/images/avatar-1.jpg";

        if(accountModel)
        {
            $scope.title="Update "+ typeObj;
            $scope.isEdit = true;
            data.get(controller, "get_account",accountModel.AccountId).then(function(obj){
                if(obj.data)
                {
                    $scope.model = obj.data;
                }
                else
                {

                }
            });
        }
        else
        {

            $scope.title="Create New " + typeObj;
            data.get(controller, "initialize_account",type).then(function(obj){
                if(obj.data)
                {
                    $scope.model = obj.data;
                }
                else
                {

                }
            });
        }

        $scope.save = function () {
            if(!$scope.isEdit) {
                data.post(controller, "add_account", $scope.model, $scope.myFile).then(function (obj) {
                    if (obj.data) {
                        $uibModalInstance.close(true);
                    }
                    else {

                    }
                });
            }
            else {
                data.post(controller, "update_account", $scope.model, $scope.myFile).then(function (obj) {
                    if (obj.data) {
                        $uibModalInstance.close(true);
                    }
                    else {

                    }
                });
            }

        };

        $scope.cancel = function () {
            $uibModalInstance.dismiss('cancel');
        };
    };
})();

