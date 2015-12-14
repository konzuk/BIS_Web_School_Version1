
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "userCon";
    app.controller(controllerId,
        ["$scope", "common","data", user]);

    function user($scope, common, data) {


        data.get('account','manage_user').then(function(obj){
            $scope.users = obj.data;
        });

        $scope.submit = submit;
        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }

        function submit(obj) {
            data.post('account','delete_user', obj).then(function(obj){
                if(obj.data) {
                    data.get('account', 'manage_user').then(function (obj) {
                        $scope.users = obj.data;
                    });
                }

            });

        }
    };
})();



