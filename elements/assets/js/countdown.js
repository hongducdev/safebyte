(function ($) {
    "use strict";
    var pxl_widget_countdown_handler = function ($scope, $) {
        $scope.find(".pxl-countdown").each(function () {
            var _this = $(this);
            var count_down = $(this).find("> div").data("count-down");

            setInterval(function () {
                var startDateTime = new Date().getTime();
                var endDateTime = new Date(count_down).getTime();
                var distance = endDateTime - startDateTime;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor(
                    (distance % (1000 * 60 * 60)) / (1000 * 60)
                );
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                days = parseInt(days, 10);
                hours = parseInt(hours, 10);
                minutes = parseInt(minutes, 10);
                seconds = parseInt(seconds, 10);

                days = days < 10 ? "0" + days : days;
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                var text_day =
                    days >= 1
                        ? _this.attr("data-days")
                        : _this.attr("data-day");
                var text_hour =
                    hours >= 1
                        ? _this.attr("data-hours")
                        : _this.attr("data-hour");
                var text_minu =
                    minutes >= 1
                        ? _this.attr("data-minutes")
                        : _this.attr("data-minute");
                var text_second =
                    seconds >= 1
                        ? _this.attr("data-seconds")
                        : _this.attr("data-second");

                _this.html(
                    "" +
                        '<div class="countdown-item"><div class="countdown-item-inner"><div class="countdown-amount">' +
                        days +
                        '</div><div class="countdown-period">' +
                        text_day +
                        "</div></div></div>" +
                        '<div class="countdown-item"><div class="countdown-item-inner"><div class="countdown-amount">' +
                        hours +
                        '</div><div class="countdown-period">' +
                        text_hour +
                        "</div></div></div>" +
                        '<div class="countdown-item"><div class="countdown-item-inner"><div class="countdown-amount">' +
                        minutes +
                        '</div><div class="countdown-period">' +
                        text_minu +
                        "</div></div></div>" +
                        '<div class="countdown-item"><div class="countdown-item-inner"><div class="countdown-amount">' +
                        seconds +
                        '</div><div class="countdown-period">' +
                        text_second +
                        "</div></div></div>"
                );
            }, 1000);
        });
    };

    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_countdown.default",
            pxl_widget_countdown_handler
        );
    });
})(jQuery);
