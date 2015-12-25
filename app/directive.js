
(function () {
    'use strict';

    var app = angular.module('app');


    app.directive('myValidate', function() {
        return {
            restrict: 'EA',
            transclude: true,
            scope: {
                submitted: '=validating',
                field: '=field',
                label: '@'

            },
            template:   '<span ng-messages="(submitted || field.$dirty) && field.$error" >'+
                            '<ng-transclude> </ng-transclude>'+
                            '<label class="error" ng-message="pattern">File must be an {{label}}</label>' +
                            '<label class="error" ng-message="required">{{label}} is required.</label>'+
                            '<label class="error" ng-message="email">Invalid email address.</label>'+
                            '<label class="error" ng-message="minlength">{{ label }} is too short.</label>'+
                            '<label class="error" ng-message="maxlength">{{ label }} is too long.</label>' +
                            '<label class="error" ng-message="maxSize">{{label}} is to large, it must be smaller than 10 Mb.</label>'+
                            '<label class="error" ng-message="minSize">{{label}} is to small, it must be bigger than 1 Mb</label>'+

                        '</span>'
        };
    });



    app.directive("compareTo", function() {
        return {
            require: "ngModel",
            scope: {
                otherModelValue: "=compareTo"
            },
            link: function(scope, element, attributes, ngModel) {

                ngModel.$validators.compareTo = function(modelValue) {
                    return modelValue == scope.otherModelValue;
                };

                scope.$watch("otherModelValue", function() {
                    ngModel.$validate();
                });
            }
        };
    });


    app.directive('uiWizardForm', ['$compile', function($compile) {
        return {
            link: function(scope, ele) {
            ele.wrapInner('<div class="steps-wrapper">');
            var steps = ele.children('.steps-wrapper').steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft"
            });
            $compile(steps)(scope)
                }
            }
    }]);

    app.directive('sidebarMenu', function() {
        return {
            // Restrict it to be an attribute in this case
            restrict: 'A',
            // responsible for registering DOM listeners as well as updating the DOM
            link: function(scope, element, attrs) {
                $(element).on('click', menuItemClick);
            }
        };
    });


    var menuItemClick = function(e) {
        if(!$("#wrapper").hasClass("enlarged")){
            if($(this).parent().hasClass("has_sub")) {
                e.preventDefault();
            }
            if(!$(this).hasClass("subdrop")) {
                // hide any open menus and remove all other classes
                //$("ul.submenu",$("ul")).slideUp(350);
                //$("a.menuheader",$("ul")).removeClass("subdrop");
                $("ul",$(this).parents("ul:first")).slideUp(350);
                $("a",$(this).parents("ul:first")).removeClass("subdrop");
                $("#sidebar-menu .pull-right i").removeClass("md-remove").addClass("md-add");

                // open our new menu and add the open class
                if($(this).hasClass("havechild")) {
                    $(this).next("ul").slideDown(350);
                    $(this).addClass("subdrop");
                    $(".pull-right i", $(this).parents(".has_sub:last")).removeClass("md-add").addClass("md-remove");
                    $(".pull-right i", $(this).siblings("ul")).removeClass("md-remove").addClass("md-add");
                }
            }else if($(this).hasClass("subdrop")) {
                $(this).removeClass("subdrop");
                $(this).next("ul").slideUp(350);
                $(".pull-right i",$(this).parent()).removeClass("md-remove").addClass("md-add");
            }
        }
    };

})();