/**
 * Created by konzuk on 12/18/2015.
 */

(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "addEditDepositDialogCon";
    app.controller(controllerId,
        ["$scope","$uibModalInstance","data","type","depositModel", deposit]);

    function deposit ($scope, $uibModalInstance,data,type,depositModel) {

        var controller = "deposit";


        if(depositModel)
        {
            $scope.isEdit = true;
            $scope.model = depositModel;
        }
        else
        {
            data.get(controller, "initialize_deposit",type).then(function(obj){
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
                data.post(controller, "add_deposit", $scope.model).then(function (obj) {
                    if (obj.data) {
                        $uibModalInstance.close(true);
                    }
                    else {

                    }
                });
            }
            else {
                data.post(controller, "update_deposit", $scope.model).then(function (obj) {
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

