<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" ng-app="app">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <title>{{title}}</title>

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />


</head>
<body>

<div ng-include="'/app/layout/shell.html'"></div>

<!-- Vendor Scripts -->
<script src="/scripts/angular.min.js"></script>
<script src="/scripts/angular-aria.min.js"></script>
<script src="/scripts/angular-animate.min.js"></script>
<script src="/scripts/angular-route.min.js"></script>
<script src="/scripts/angular-sanitize.min.js"></script>
<script src="/scripts/angular-cookies.min.js"></script>



<!--template-->
<script src="/scripts/TweenMax.min.js"></script>

<!-- Bootstrapping -->
<script src="/app/app.js"></script>
<script src="/app/config.js"></script>
<script src="/app/config.exceptionHandler.js"></script>
<!-- common Modules -->
<script src="/app/Common/common.js"></script>
<script src="/app/Common/logger.js"></script>

<!-- app Services -->
<script src="/app/data.js"></script>
<script src="/app/routemediator.js"></script>

<!-- Module -->

<script src="/app/layout/shell.js"></script>
<script src="/app/module/home/home.js"></script>
<script src="/app/module/about/about.js"></script>
<script src="/app/module/user/user.js"></script>

</body>
</html>
