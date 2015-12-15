
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "userCon";
    app.controller(controllerId,
        ["$scope", "common","data", user]);

    function user($scope, common, data) {



        $scope.submit = submit;



        function submit(obj) {
            data.post('account','delete_user', obj).then(function(obj){
                if(obj.data) {
                    data.get('account', 'manage_user').then(function (obj) {
                        $scope.users = obj.data;
                    });
                }
            });
        };


        function getData() {

            data.get('account','manage_user').then(function(obj){
                $scope.users = obj.data;
            });
        };





        activate();
        function activate() {
            common.activateController([getData()], controllerId)
                 .then(function () {



                 });
        }


    };
})();



