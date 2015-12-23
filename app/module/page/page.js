
(function () {
    "use strict";

    var app = angular.module("app");

    var controllerId = "pageCon";
    app.controller(controllerId,
        ["$scope", "common","type", page]);

    function page($scope, common,type) {

        //type can be contact, about


        $scope.options = {
            height: 200,                 // set editor height

            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor

            focus: true,                 // set focus to editable area after initializing summernote

            toolbar: [
                ['edit',['undo','redo']],
                ['headline', ['style']],
                ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
                ['fontface', ['fontname']],
                ['textsize', ['fontsize']],
                ['fontclr', ['color']],
                ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link','picture','video','hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]

            ]
        };
        activate();
        function activate() {
            common.activateController([], controllerId)
                 .then(function () {});
        }
    };
})();



