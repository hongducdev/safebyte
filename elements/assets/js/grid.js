(function ($) {
    "use strict";

    $(window).on("elementor/frontend/init", function () {
        setTimeout(function () {
            $(".pxl-grid").each(function (index, element) {
                var $grid_scope = $(this);
                if ($grid_scope.hasClass("pxl-post-list")) {
                    console.log("post-list");
                    var isoOptions = {};
                    var $grid_isotope = null;
                }
                var $grid_masonry = $grid_scope.find(".pxl-grid-masonry");
                var isoOptions = {
                    itemSelector: ".pxl-grid-item",
                    layoutMode: "masonry",
                    fitRows: {
                        gutter: 0,
                    },
                    percentPosition: true,
                    masonry: {
                        columnWidth: ".grid-sizer",
                    },
                    containerStyle: null,
                    stagger: 30,
                    sortBy: "name",
                };
                var $grid_isotope = $grid_masonry.isotope(isoOptions);

                $grid_scope.on(
                    "click",
                    ".pxl-grid-filter .filter-item",
                    function (e) {
                        var $this = $(this);
                        var term_slug = $this.attr("data-filter");

                        $this
                            .siblings(".filter-item.active")
                            .removeClass("active");
                        $this.addClass("active");
                        $grid_scope
                            .find(".pxl-post--inner")
                            .removeClass("animated");

                        if (
                            $this.closest(".pxl-grid-filter").hasClass("ajax")
                        ) {
                            var loadmore = $grid_scope.data("loadmore");
                            loadmore.term_slug = term_slug;
                            safebyte_grid_ajax_handler(
                                $this,
                                $grid_scope,
                                $grid_isotope,
                                {
                                    action: "safebyte_load_more_post_grid",
                                    loadmore: loadmore,
                                    iso_options: isoOptions,
                                    handler_click: "filter",
                                    scrolltop: 0,
                                }
                            );
                        } else {
                            $grid_isotope.isotope({ filter: term_slug });

                            if (
                                $grid_scope
                                    .find(".pxl-grid-filter")
                                    .hasClass("pxl-animate")
                            ) {
                                var $animate_el =
                                        $grid_scope.find(".pxl-grid-filter"),
                                    data = $animate_el.data("settings");
                                if (
                                    typeof data != "undefined" &&
                                    typeof data["animation"] != "undefined"
                                ) {
                                    setTimeout(function () {
                                        $animate_el
                                            .removeClass("pxl-invisible")
                                            .addClass(
                                                "animated " + data["animation"]
                                            );
                                    }, data["animation_delay"]);
                                } else {
                                    setTimeout(function () {
                                        $animate_el
                                            .removeClass("pxl-invisible")
                                            .addClass("animated fadeInUp");
                                    }, 300);
                                }
                            }
                        }
                    }
                );

                // pagination for grid
                $grid_scope.on(
                    "click",
                    ".pxl-grid-pagination .ajax a.page-numbers",
                    function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var $this = $(this);
                        var loadmore = $grid_scope.data("loadmore");
                        var paged = $this.attr("href");
                        paged = paged.replace("#", "");
                        loadmore.paged = parseInt(paged);
                        safebyte_grid_ajax_handler(
                            $this,
                            $grid_scope,
                            $grid_isotope,
                            {
                                action: "safebyte_load_more_post_grid",
                                loadmore: loadmore,
                                iso_options: isoOptions,
                                handler_click: "pagination",
                                scrolltop: 0,
                                wpnonce: main_params.wpnonce,
                            }
                        );
                        $("html,body").animate(
                            { scrollTop: $grid_scope.offset().top - 130 },
                            500
                        );
                    }
                );

                // load more for grid
                $grid_scope.on("click", ".btn-grid-loadmore", function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    var loadmore = $grid_scope.data("loadmore");
                    loadmore.paged =
                        parseInt($grid_scope.data("start-page")) + 1;

                    safebyte_grid_ajax_handler(
                        $this,
                        $grid_scope,
                        $grid_isotope,
                        {
                            action: "safebyte_load_more_post_grid",
                            loadmore: loadmore,
                            iso_options: isoOptions,
                            handler_click: "loadmore",
                            scrolltop: 0,
                            wpnonce: main_params.wpnonce,
                        }
                    );
                });

                // orderby for list
                $grid_scope.on("change", ".orderby", function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    var loadmore = $grid_scope.data("loadmore");
                    loadmore.orderby = $this.val();
                    loadmore.paged = 1;

                    safebyte_grid_ajax_handler(
                        $this,
                        $grid_scope,
                        $grid_isotope,
                        {
                            action: "safebyte_load_more_post_list",
                            loadmore: loadmore,
                            iso_options: isoOptions,
                            handler_click: "select_orderby",
                            scrolltop: 0,
                            wpnonce: main_params.wpnonce,
                        }
                    );
                });

                // pagination for list
                $grid_scope.on(
                    "click",
                    ".pxl-list-pagination .ajax a.page-numbers",
                    function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var $this = $(this);
                        var loadmore = $grid_scope.data("loadmore");
                        var paged = $this.attr("href");
                        paged = paged.replace("#", "");
                        loadmore.paged = parseInt(paged);
                        safebyte_grid_ajax_handler(
                            $this,
                            $grid_scope,
                            $grid_isotope,
                            {
                                action: "safebyte_load_more_post_list",
                                loadmore: loadmore,
                                iso_options: isoOptions,
                                handler_click: "pagination",
                                scrolltop: 0,
                                wpnonce: main_params.wpnonce,
                            }
                        );
                        $("html,body").animate(
                            { scrollTop: $grid_scope.offset().top - 130 },
                            500
                        );
                    }
                );

                // load more for list
                $grid_scope.on("click", ".btn-list-loadmore", function (e) {
                    e.preventDefault();
                    var $this = $(this);
                    var loadmore = $grid_scope.data("loadmore");
                    loadmore.paged =
                        parseInt($grid_scope.data("start-page")) + 1;

                    safebyte_grid_ajax_handler(
                        $this,
                        $grid_scope,
                        $grid_isotope,
                        {
                            action: "safebyte_load_more_post_list",
                            loadmore: loadmore,
                            iso_options: isoOptions,
                            handler_click: "loadmore",
                            scrolltop: 0,
                            wpnonce: main_params.wpnonce,
                        }
                    );
                });
            });
        }, 300);

        function safebyte_grid_ajax_handler(
            $this,
            $grid_scope,
            $grid_isotope,
            args = {}
        ) {
            var settings = $.extend(
                true,
                {},
                {
                    action: "",
                    loadmore: "",
                    iso_options: {},
                    handler_click: "",
                    scrolltop: 0,
                    wpnonce: "",
                },
                args
            );

            var offset_top = $grid_scope.offset().top;
            if (settings.handler_click == "loadmore") {
                var loadmore_text = $this
                    .closest(".pxl-load-more")
                    .data("loadmore-text");
                var loading_text = $this
                    .closest(".pxl-load-more")
                    .data("loading-text");
            }

            $.ajax({
                url: main_params.ajax_url,
                type: "POST",
                data: {
                    action: settings.action,
                    settings: settings.loadmore,
                    handler_click: settings.handler_click,
                    wpnonce: settings.wpnonce,
                },
                success: function (res) {
                    if (res.status == true) {
                        if (settings.handler_click == "loadmore") {
                            if (settings.loadmore.wg_type == "post-list") {
                                $grid_scope
                                    .find(".pxl-list-inner")
                                    .append(res.data.html);
                            } else {
                                $grid_scope
                                    .find(".pxl-grid-inner")
                                    .append(res.data.html);
                            }
                        } else {
                            if (settings.loadmore.wg_type == "post-list") {
                                $grid_scope
                                    .find(".pxl-list-inner .list-item")
                                    .remove();
                                $grid_scope
                                    .find(".pxl-list-inner")
                                    .html(res.data.html);
                            } else {
                                $grid_scope
                                    .find(".pxl-grid-inner .pxl-grid-item")
                                    .remove();
                                $grid_scope
                                    .find(".pxl-grid-inner")
                                    .html(res.data.html);
                            }
                        }

                        if (settings.iso_options && $grid_isotope != null) {
                            $grid_isotope.isotope("destroy");
                            $grid_isotope.isotope(settings.iso_options);
                        }

                        $grid_scope.data("start-page", res.data.paged);

                        if (
                            settings.loadmore["pagination_type"] == "loadmore"
                        ) {
                            if (res.data.paged >= res.data.max) {
                                $grid_scope.find(".pxl-load-more").hide();
                            } else {
                                $grid_scope.find(".pxl-load-more").show();
                            }
                        }

                        if (
                            settings.loadmore["pagination_type"] == "pagination"
                        ) {
                            if (settings.loadmore.wg_type == "post-list") {
                                $grid_scope
                                    .find(".pxl-list-pagination")
                                    .html(res.data.pagin_html);
                            } else {
                                $grid_scope
                                    .find(".pxl-grid-pagination")
                                    .html(res.data.pagin_html);
                            }
                        }

                        if ($grid_scope.find(".result-count").length > 0) {
                            $grid_scope
                                .find(".result-count")
                                .html(res.data.result_count);
                        }

                        // Reinitialize any necessary WordPress functions
                        if (
                            typeof wp !== "undefined" &&
                            wp.media &&
                            wp.media.attachment
                        ) {
                            wp.media.attachment =
                                new wp.media.model.Attachments();
                        }
                    }
                },
                beforeSend: function () {
                    $grid_scope
                        .find(".pxl-grid-overlay-loading")
                        .removeClass("loaded")
                        .addClass("loader");
                    if (settings.handler_click == "loadmore") {
                        $this.find(".pxl-loadmore-text").text(loading_text);
                        $this.parent().addClass("loading");
                    }
                },
                complete: function () {
                    $grid_scope
                        .find(".pxl-grid-overlay-loading")
                        .removeClass("loader")
                        .addClass("loaded");
                    if (settings.handler_click == "loadmore") {
                        $this.find(".pxl-loadmore-text").text(loadmore_text);
                        $this.parent().removeClass("loading");
                    }
                    if (settings.scrolltop) {
                        $("html, body").animate(
                            { scrollTop: offset_top - 100 },
                            0
                        );
                    }
                },
            });
        }
    });
})(jQuery);
