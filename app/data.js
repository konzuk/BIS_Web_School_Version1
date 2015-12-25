
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
    function progressHandle(data)
    {

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
                    },errorHandle,progressHandle);
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
                    },errorHandle,progressHandle);
                //} else {
                //    deferred.resolve(test);
                //}
                return deferred.promise;
            };
           
            obj.post = function (controller, method, object, file) {

                var deferred = $q.defer();
                //var test = cache.get(method);
                //if (test === undefined) {
                    $http.post(serverbase + controller + '/' + method, { model: object, file: file },
                    {
                        headers: { 'Content-Type': undefined},

                        transformRequest: function (data) {
                            var fd = new FormData();
                            fd.append("model", angular.toJson(data.model));
                            fd.append('file', data.file);
                            return fd;
                        }


                    }).then(function (results) {
                        //cache.put(method, results === undefined ? null : results);
                        deferred.resolve(results);
                    },errorHandle,progressHandle);
                //} else {
                //    deferred.resolve(test);
                //}
                return deferred.promise;
            };
            return obj;
        }]);

    


})();