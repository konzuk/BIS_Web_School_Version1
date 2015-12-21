/**
 * Created by konzuk on 12/18/2015.
 */

(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "addEditAccountDialogCon";
    app.controller(controllerId,
        ["$scope","$uibModalInstance","data", account]);

    function account ($scope, $uibModalInstance,data,type, account) {

        var controller = "account";

        if(account)
        {
            $scope.model = account;
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
            data.post(controller, "add_account", $scope.model).then(function(obj){
                if(obj.data)
                {
                    $uibModalInstance.close('success');
                }
                else
                {

                }
            });

        };

        $scope.cancel = function () {
            $uibModalInstance.dismiss('cancel');
        };
    };
})();

