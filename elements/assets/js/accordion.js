(function ($) {
    "use strict";
    var pxl_widget_accordion_handler = function ($scope, $) {
        $scope
            .find(".pxl-accordion .pxl-accordion--title")
            .on("click", function (e) {
                e.preventDefault();
                if ($(this).parent().hasClass("active")) {
                    return;
                }

                var pxl_target = $(this).data("target");
                var pxl_parent = $(this).parents(".pxl-accordion");
                var pxl_active = pxl_parent.find(".pxl-accordion--title");
                $.each(pxl_active, function (index, item) {
                    var pxl_item_target = $(item).data("target");
                    if (pxl_item_target != pxl_target) {
                        $(item).removeClass("active");
                        $(this).parent().removeClass("active");
                        $(pxl_item_target).slideUp(400);
                    }
                });
                $(this).parent().toggleClass("active");
                $(pxl_target).slideToggle(400);
            });

        // Custom for accordion 3
        var pxl_accordion_3 = $scope.find(".pxl-accordion3");
        var pxl_accordion_3_height = pxl_accordion_3.height();
        pxl_accordion_3
            .find(".pxl-accordion--steps")
            .css("height", pxl_accordion_3_height);
    };
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_accordion.default",
            pxl_widget_accordion_handler
        );
    });
})(jQuery);
