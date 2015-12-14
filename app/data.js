
(function () {
    'use strict';

    var app = angular.module('app');

    app.factory("data", ['$http',
        //'$cacheFactory',
        '$q',

        function ($http,
                  //$cacheFactory,
                  $q) {

            var serverbase = 'index.php/';
            //var cache = $cacheFactory('cache');
            var obj = {};

            obj.gets = function (q) {

            };

            obj.gets = function (controller,method) {
                var deferred = $q.defer();
                //var test = cache.get(method);
                //if (test === undefined) {
                    $http.get(serverbase + controller + '/' + method).then(function (results) {
                        //cache.put(method, results === undefined ? null : results);
                        deferred.resolve(results);
                    });
                //} else {
                //    deferred.resolve(test);
                //}
                return deferred.promise;
            };

            obj.get = function (controller,method,id) {

                var deferred = $q.defer();
                //var test = cache.get(method);
                //if (test === undefined) {
                    $http.get(serverbase + controller + '/' + method+'/' + id).then(function (results) {
                        //cache.put(method, results === undefined ? null : results);
                        deferred.resolve(results);
                    });
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
                    });
                //} else {
                //    deferred.resolve(test);
                //}
                return deferred.promise;
            };
            return obj;
        }]);

    


})();