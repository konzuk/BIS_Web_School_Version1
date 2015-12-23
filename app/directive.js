
(function () {
    'use strict';

    var app = angular.module('app');

    app.directive('fileModel', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function(scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;

                element.bind('change', function(){
                    scope.$apply(function(){

                        var fd = new FormData();
                        fd.append('file', file);
                        console.log('file is ' );
                        console.dir(fd);



                        modelSetter(scope, element[0].files[0]);
                    });
                });
            }
        };
    }]);

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