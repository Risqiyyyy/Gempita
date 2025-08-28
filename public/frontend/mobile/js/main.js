function handleMenu() {
    var open = document.getElementById("menu-open");
    var close = document.getElementById("menu-close");
    if (open.style.display !== "none") {
        open.style.display = "none";
        close.style.display = "block";
    } else {
        close.style.display = "none";
        open.style.display = "block";
    }
}
$(document).ready(function () {
    $("#open-menu").click(function () {
        handleMenu();
        $("#main-menu").slideToggle();
    });
    if ($("#slider-galleries").length > 0) {
        new Splide("#slider-galleries", {
            perPage: 4,
            rewind: true,
            pagination: true,
            arrows: false,
            gap: "5px",
        }).mount();
    }
});

// Ads Paralax
var $ = jQuery;
var height_b = 250;
var width_b = 0;
$(document).ready(function () {
    setTimeout(function () {
        if ($("#div-ad-parallax").find("iframe").attr("height") !== undefined) {
            height_b = $("#div-ad-parallax").find("iframe").attr("height");
            width_b = $("#div-ad-parallax").find("iframe").attr("width");

            $("#adds-top").css({
                height: height_b + "px",
            });
            $(".main-content").css({
                "margin-top": "0",
            });
            $(".wrap-header").css({
                position: "relative",
            });
            $("#close-adds-top").css({
                display: "block",
            });
        }
    }, 3000);
});

var status_ads_parallax_top = true;
$(document).ready(function () {
    $("#close-adds-top").click(function () {
        $(".wrap-header").css({
            position: "fixed",
            top: "0px",
        });
        $(".main-content").css({
            "margin-top": "25px",
        });
        $("#adds-top").css({
            display: "none",
        });
        $("#close-adds-top").css({
            display: "none",
        });
        status_ads_parallax_top = false;
    });
});

setTimeout(function () {
    $(window).scroll(function () {
        y_scroll_pos_data = window.pageYOffset;
        top_current = parseInt(height_b) - parseInt(height_b);
        // top_current = parseInt(height_b) - y_scroll_pos_data;
        // console.log(`top_current: ${top_current} status_ads_parallax_top: ${status_ads_parallax_top}`);
        if (top_current < 6 || status_ads_parallax_top == false) {
            $(".wrap-header").css({
                position: "sticky",
                top: "0px",
            });
            // $('#adds-top').css({
            //     "z-index": "-2"
            // });
        }

        if (top_current > 0 && status_ads_parallax_top == true) {
            $(".wrap-header").css({
                position: "relative",
                // "position": "fixed"
            });
            $("#adds-top").css({
                opacity: "1",
                "z-index": "1",
            });
            $("#close-adds-top").css({
                visibility: "visible",
            });
        }
    });
}, 0);
