/*! popovers-users.js | Friendkit | © Css Ninja. 2019-2020 */
"use strict";
[]

function getUserPopovers() {
    $("*[data-user-popover]").each((function () {
        var n = $(this), e = $(this).attr("data-user-popover"), s = feather.icons["message-circle"].toSvg(),
            a = feather.icons["more-horizontal"].toSvg(), o = feather.icons["map-pin"].toSvg(),
            i = feather.icons.users.toSvg(), r = feather.icons.bookmark.toSvg();
        $.ajax({
            url: "/assets/data/api/users/users.json", async: !0, dataType: "json", success: function (t) {
                n.webuiPopover({
                    trigger: "hover",
                    placement: "auto",
                    width: 300,
                    padding: !1,
                    offsetLeft: 0,
                    offsetTop: 20,
                    animation: "pop",
                    cache: !1,
                    content: function () {
                        setTimeout((function () {
                            $(".loader-overlay").removeClass("is-active")
                        }), 1e3);

                        var user = t.filter(function (element){
                            return element.user_id === e
                        })

                        console.log(user);

                        return '\n                                <div class="profile-popover-block">\n\n                                    <div class="loader-overlay is-active">\n                                        <div class="loader is-loading"></div>\n                                    </div>\n\n                                    <div class="profile-popover-wrapper">\n                                        <div class="popover-cover">\n                                            <img src="' + user[0].cover_image + '">\n                                            <div class="popover-avatar">\n                                                <img class="avatar" src="' + user[0].profile_picture + '">\n                                            </div>\n                                        </div>\n\n                                        <div class="popover-meta">\n                                            <span class="user-meta">\n                                                <span class="username">' + user[0].first_name + " " + user[0].last_name + '</span>\n                                            </span>\n                                            \x3c!--span class="job-title">' + user[0].title + '</span--\x3e\n                                            <div class="common-friends">\n                                                ' + i + '\n                                                <div class="text">\n                                                    ' + user[0].course_enrolments + ' Courses \n                                                </div>\n                                            </div>\n                                            <div class="user-location">\n                                                ' + o + '\n                                                <div class="text">\n                                                    From <a href="#">' + user[0].location + '</a>\n                                                </div>\n                                            </div>\n                                        </div>\n                                    </div>\n                                    <div class="popover-actions">\n\n                                        <a  class="popover-icon">\n                                            ' + a + '\n                                        </a>\n                                        <a  class="popover-icon">\n                                            ' + r + '\n                                        </a>\n                                        <a class="popover-icon">\n                                            ' + s + "\n                                        </a>\n                                    </div>\n                                </div>\n                            "
                    }
                })
            }
        })
    }))
}

$(document).ready((function () {
    getUserPopovers()
}));