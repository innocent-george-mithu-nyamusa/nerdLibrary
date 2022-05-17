/*! main.js | Friendkit | © Css Ninja. 2019-2020 */
"use strict";
var env = "development";
initPageloader(), $(document).ready((function () {
    "development" === env && (changeDemoHrefs(), changeDemoImages());
    var e = document.querySelectorAll("[data-lazy-load]");
    lozad(e, {
        loaded: function (e) {
            e.parentNode.classList.add("loaded")
        }
    }).observe(), $(".demo-link a").on("click", (function (e) {
        e.preventDefault();
        var i = $(this).closest(".demo-link").attr("data-theme");
        window.localStorage.setItem("theme", i);
        var t = $(this).attr("href");
        window.open(t)
    })), toggleTheme(), $(".highlight-block code").each((function (e, i) {
        hljs.highlightBlock(i)
    })), initNavbar(), initNavbarV2(), initSidebarV1(), linkCheck(), initResponsiveMenu(), initNavDropdowns(), initNavbarCart(), initDropdowns(), initTabs(), initModals(), initBgImages(), feather.replace(), initEmojiPicker(), initLightboxEmojis(), initVideoEmbed(), initLoadMore(), initTooltips(), initLikeButton(), initSimplePopover(), initShareModal(), initUsersAutocomplete(), initSuggestionSearch()
}));