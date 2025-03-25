(function ($) {
    "use strict";

    var pxl_widget_image_scroll_handler = function ($scope, $) {
        var $imageScroll = $scope.find(".pxl-image-scroll");
        var $images = $imageScroll.find(".pxl-item-image");
        var $titles = $imageScroll.find(".pxl-item-title");
        var $contents = $imageScroll.find(".pxl-item-content");

        if (!$imageScroll.length) return;

        function setActiveItem(index) {
            $images.removeClass("active");
            $titles.removeClass("active");
            $contents.removeClass("active");

            $images.eq(index).addClass("active");
            $titles.eq(index).addClass("active");
            $contents.eq(index).addClass("active");
        }

        $titles.on("click", function () {
            var index = $titles.index(this);
            setActiveItem(index);
        });

        var currentIndex = 0;
        var autoScroll = setInterval(function () {
            currentIndex++;
            if (currentIndex >= $titles.length) {
                currentIndex = 0;
            }
            setActiveItem(currentIndex);
        }, 3000);

        setActiveItem(0);
    };

    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_image_scroll.default",
            pxl_widget_image_scroll_handler
        );
    });
})(jQuery);
