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



        var controller = "account";


        if(accountModel)
        {
            $scope.isEdit = true;
            $scope.model = accountModel;
        }
        else
        {
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
                data.post(controller, "add_account", $scope.model).then(function (obj) {
                    if (obj.data) {
                        $uibModalInstance.close(true);
                    }
                    else {

                    }
                });
            }
            else {
                data.post(controller, "update_account", $scope.model).then(function (obj) {
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

