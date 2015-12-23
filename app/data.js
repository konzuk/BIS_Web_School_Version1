
(function () {
    'use strict';

    var app = angular.module('app');

    function errorHandle(data)
    {
        if(data && data.status === 521)
        {
            window.location = data.statusText;
        }
    }

    app.factory("data", ['$http',
        //'$cacheFactory',
        '$q',

        function ($http,
                  //$cacheFactory,
                  $q) {

            var serverbase = 'index.php/';
            //var cache = $cacheFactory('cache');
            var obj = {};

            obj.gets = function (controller,method) {
                var deferred = $q.defer();
                //var test = cache.get(method);
                //if (test === undefined) {
                    $http.get(serverbase + controller + '/' + method).then(function (results) {
                        //cache.put(method, results === undefined ? null : results);
                        deferred.resolve(results);
                    },errorHandle);
                //} else {
                //    deferred.resolve(test);
                //}
                return deferred.promise;
            };

            obj.get = function (controller,method,filter) {

                var deferred = $q.defer();
                //var test = cache.get(method);
                //if (test === undefined) {
                    $http.get(serverbase + controller + '/' + method+'/' + filter).then(function (results) {
                        //cache.put(method, results === undefined ? null : results);
                        deferred.resolve(results);
                    },errorHandle);
                //} else {
                //    deferred.resolve(test);
                //}
                return deferred.promise;
            };
           
            obj.post = function (controller, method, object) {

                var deferred = $q.defer();
                //var test = cache.get(method);
                //if (test === undefined) {
                    $http.post(serverbase + controller + '/' + method, object).then(function (results) {
                        //cache.put(method, results === undefined ? null : results);
                        deferred.resolve(results);
                    },errorHandle);
                //} else {
                //    deferred.resolve(test);
                //}
                return deferred.promise;
            };
            return obj;
        }]);

    


})();