
(function () {
    'use strict';

    var app = angular.module('app');


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