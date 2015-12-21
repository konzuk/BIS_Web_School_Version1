/**
 * Created by konzuk on 12/18/2015.
 */

(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "addEditUserCon";
    app.controller(controllerId,
        ["$scope","$uibModalInstance","data", user]);

    function user ($scope, $uibModalInstance,data, user) {

        var controller = "account";

        if(!user)
        {
            $scope.model = user;
        }
        else
        {
            data.get(controller, "initialize_user").then(function(obj){
                $scope.model = obj.data;
            });
        }

        $scope.save = function () {
            data.post(controller, "add_user", $scope.model).then(function(obj){
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

// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $uibModal service used above.
