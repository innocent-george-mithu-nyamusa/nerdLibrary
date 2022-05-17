"use strict";
/*! autocompletes.js | Friendkit | © Css Ninja. 2019-2020 */

$(document).ready((function () {


    var linkHtml = '', formData;

    function setlinkhtml(newLinkHtml) {
        linkHtml = newLinkHtml
    }

    function setFormDataVal(Data) {
        formData = Data
    }

    function getFormData() {
        return formData;
    }

    function getlinkHtml() {
        return linkHtml;
    }

    function previewSuccess(response) {
        var linkResponse = {}, linkHtml = '', localDomain = 'nerdlife.co.zw', addBlank = true;

        if (response.error) {
            console.log(response.description);
            return;
        }

        linkResponse = response;
        const domain = extractRootDomain(`${linkResponse.url}`);

        if (domain !== localDomain) addBlank = true;

        linkHtml = `<div class="post-link">
                                        <!-- link image -->
                                        <div class="link-image">
                                            <img src="${linkResponse.image}" data-demo-src="${linkResponse.image}" alt="">
                                        </div>
                                        <!-- Link content -->
                                        <div class="link-content">
                                            <h4>
                                                <a ${addBlank ? 'target="_blank" rel="nofollow noopener noreferrer"' : null} href="${linkResponse.url}">${linkResponse.title}</a>
                                            </h4>
                                            <p>${linkResponse.description}</p>
                                            <small>${domain}</small>
                                        </div>
                                        <!-- Post actions -->
                        </div>`;
        setlinkhtml(linkHtml);
        processFormData();
    }


    function getPreviewHtml(target) {

        var key = "c4a6d7393e4ffef275a15241324a4424";

        $.ajax({
            url: "https://api.linkpreview.net",
            dataType: "jsonp",
            data: {q: target, key: key},
            success: previewSuccess,
            error: function (error) {
                // something went wrong
                console.log(error.status)

            }
        });

    }

    function postDataSuccess(data) {
        data = data.replace(/{POST-LINK}/g, getlinkHtml());

        allId.forEach(function ({id, name}, index) {
            var detail = "{" + id + "}";
            data = data.replace(detail, name);
        });

        $("#compose-card").after(data)

    }

    function processFormData() {
        var postFormData = getFormData();

        $.ajax({
            url: "/includes/createPost.php",
            method: "post",
            data: postFormData,
            contentType: false,
            processData: false,
            failed: function () {
            },
            success: postDataSuccess,
        });
    }


    if ($("#feed-users-autocpl").length) {
        var a = "", e = "", t = {
            url: "assets/data/api/users/user-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar src='" + e.pic + "' /><img class=avatar-badge src='" + e.badge + "' /></div><div class=entry-text>" + a + "<br><span>" + e.location + "</span></div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 5, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var t = $("#users-autocpl").val()

                    $("#users-autocpl").val(""), a = '\n                        <div class="control tag-control">\n                            <div class="tags has-addons">\n                                <a class="tag is-link">' + t + '</a>\n                                <a class="tag is-delete is-inverted"></a>\n                            </div>\n                        </div>\n                    ', e = '\n                        <span class="tagged-friend"><small>&mdash; with</small> <a class="is-inverted" href="#">' + t + "</a>,</span>\n                    ", $.when($("#tag-list").append(a)).done((function () {
                        $("#options-summary").append(e), $(".tag.is-delete").on("click", (function () {
                            var a = $(this).closest(".tags").find(".tag.is-link").text();
                            $(this).closest(".tag-control").remove(), $(".tagged-friend a").each((function () {
                                var e = $(this).text();
                                if (a !== e) return !1;
                                $(this).closest(".tagged-friend").remove()
                            }))
                        }))
                    }))
                }
            }
        };

        $("#feed-users-autocpl").easyAutocomplete(t)
    }

    if ($("#share-friend-tags-autocpl").length) {
        a = "", e = "";

        var s = {
            url: "assets/data/api/users/user-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar src='" + e.pic + "' /><img class=avatar-badge src='" + e.badge + "' /></div><div class=entry-text>" + a + "<br><span>" + e.location + "</span></div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 5, showAnimation: {

                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var t = $("#share-friend-tags-autocpl").val();

                    $("#share-friend-tags-autocpl").val(""), a = '\n                        <div class="control is-spaced tag-control">\n                            <div class="tags has-addons">\n                                <a class="tag is-link">' + t + '</a>\n                                <a class="tag is-delete is-inverted"></a>\n                            </div>\n                        </div>\n                    ', e = '\n                        <span class="tagged-friend"><small>&mdash; with</small> <a class="is-inverted" href="#">' + t + "</a>,</span>\n                    ", $.when($("#share-modal-tag-list").append(a)).done((function () {
                        $(".tag.is-delete").on("click", (function () {
                            $(this).closest(".tag-control").remove()
                        }))
                    }))
                }
            }
        };
        //
        $("#share-friend-tags-autocpl").easyAutocomplete(s)
    }

    if ($("#create-album-friends-autocpl").length) {
        a = "", e = "";
        var n = feather.icons.x.toSvg(), o = {
            url: "assets/data/api/users/user-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    console.log(e.name)
                    return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar src='" + e.pic + "' /><img class=avatar-badge src='" + e.badge + "' /></div><div class=entry-text>" + a + "<br><span>" + e.location + "</span></div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 5, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var e = $("#create-album-friends-autocpl").getSelectedItemData().id,
                        t = $("#create-album-friends-autocpl").getSelectedItemData().pic;

                    $("#create-album-friends-autocpl").val(""), a = '\n                        <div class="tagged-user">\n                            <img src="' + t + '" alt=""  data-user-popover="' + e + '">\n                            <div class="remove-tag">\n                                ' + n + "\n                            </div>\n                        </div>\n                    ", $.when($("#album-tag-list").append(a)).done((function () {
                        getUserPopovers(), $(".remove-tag").on("click", (function () {
                            $(this).closest(".tagged-user").remove()
                        }))
                    }))
                }
            }
        };
        $("#create-album-friends-autocpl").easyAutocomplete(o)
    }

    if ($(".simple-users-autocpl").length) {
        a = "", e = "";
        var l = {
            url: "assets/data/api/users/user-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar src='" + e.pic + "' /><img class=avatar-badge src='" + e.badge + "' /></div><div class=entry-text>" + a + "<br><span>" + e.location + "</span></div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 5, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    $(".simple-users-autocpl").val()
                }
            }
        };
        $(".simple-users-autocpl").easyAutocomplete(l)
    }

    if ($(".simple-groups-autocpl").length) {
        a = "", e = "";
        var c = {
            url: "assets/data/api/groups/groups-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar src='" + e.pic + "' /><img class=avatar-badge src='" + e.country + "' /></div><div class=entry-text>" + a + "<br><span>" + e.topic + "</span></div><div class=right-content>" + e.members + " members</div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 5, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    $(".simple-groups-autocpl").val()
                }
            }
        };
        $(".simple-groups-autocpl").easyAutocomplete(c)
    }

    if ($(".simple-locations-autocpl").length) {
        a = "", e = "";
        var p = {
            url: "assets/data/api/places/places-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar is-squared src='" + e.pic + "' /><img class=avatar-badge src='" + e.country + "' /></div><div class=entry-text>" + a + "<br><span>" + e.address + "</span></div><div class=right-content>" + e.visitors + " where there</div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 5, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    $(".simple-locations-autocpl").val()
                }
            }
        };
        $(".simple-locations-autocpl").easyAutocomplete(p)
    }

    if ($("#activities-autocpl").length) {
        a = "";
        var r = {
            url: "assets/data/api/activities/activity-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar src='" + e.pic + "' /></div><div class=entry-text>" + a + "<br><span>" + e.desc + "</span></div><div class=next-icon><i class=mdi mdi-chevron-right></i></div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 6, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var a = $("#activities-autocpl").val();
                    $("#activities-autocpl").val(""), "status" === a ? ($("#activities-autocpl-wrapper, .is-activity").addClass("is-hidden"), $("#mood-autocpl-wrapper").removeClass("is-hidden"), openMoodDrop()) : "drinking" === a ? ($("#activities-autocpl-wrapper, .is-activity").addClass("is-hidden"), $("#drinking-autocpl-wrapper").removeClass("is-hidden"), openDrinksDrop()) : "eating" === a ? ($("#activities-autocpl-wrapper, .is-activity").addClass("is-hidden"), $("#eating-autocpl-wrapper").removeClass("is-hidden"), openEatsDrop()) : "reading" === a ? ($("#activities-autocpl-wrapper, .is-activity").addClass("is-hidden"), $("#reading-autocpl-wrapper").removeClass("is-hidden"), openReadsDrop()) : "watching" === a ? ($("#activities-autocpl-wrapper, .is-activity").addClass("is-hidden"), $("#watching-autocpl-wrapper").removeClass("is-hidden"), openWatchDrop()) : "travelling" === a && ($("#activities-autocpl-wrapper, .is-activity").addClass("is-hidden"), $("#travel-autocpl-wrapper").removeClass("is-hidden"), openTravelDrop())
                }
            }
        };
        $("#activities-autocpl").easyAutocomplete(r)
    }

    if ($("#mood-autocpl").length) {
        a = "";
        var d = {
            url: "assets/data/api/activities/mood/mood-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper is-smaller><img class=autocpl-avatar src='" + e.pic + "' /></div><div class=entry-text>" + a + "</div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 5, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var e = $("#mood-autocpl").val(), t = $("#mood-autocpl").getSelectedItemData().pic,
                        n = $("#mood-autocpl").getSelectedItemData().name;

                    postFormData.append("post-mood", "feeling " + n)
                    $("#mood-autocpl").val(""), a = '\n                        <span class="mood-display"><img src="' + t + '"><span>' + e + "</span></span>\n                    ", $(".mood-display").length && $(".mood-display").remove(), $.when($("#options-summary").prepend(a)).done((function () {

                        $("#mood-autocpl-wrapper").addClass("is-hidden"), $(".mood-display").on("click", (function () {
                            postFormData.delete("post-mood");
                            $(".is-suboption").addClass("is-hidden"), $("#activities-suboption, #mood-autocpl-wrapper").removeClass("is-hidden"), openMoodDrop()
                        }))
                    }))
                }
            },
        };

        $("#mood-autocpl").easyAutocomplete(d)
    }

    if ($("#drinking-autocpl").length) {
        a = "";
        var m = {
            url: "assets/data/api/activities/drinking/drinking-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper is-smaller><img class=autocpl-avatar src='" + e.pic + "' /></div><div class=entry-text>" + a + "</div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 5, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var e = $("#drinking-autocpl").val(), t = $("#drinking-autocpl").getSelectedItemData().pic;
                    postFormData.append("post-mood", "drinking " + $("#drinking-autocpl").getSelectedItemData().name)

                    $("#drinking-autocpl").val(""), a = '\n                        <span class="mood-display"><img src="' + t + '"><span class="is-inverted""><span class="action-text">is drinking</span>' + e + "</span></span>\n                    ", $(".mood-display").length && $(".mood-display").remove(), $.when($("#options-summary").prepend(a)).done((function () {
                        $("#drinking-autocpl-wrapper").addClass("is-hidden"), $(".mood-display").on("click", (function () {
                            postFormData.delete("post-drinking");
                            $(".is-suboption").addClass("is-hidden"), $("#activities-suboption, #drinking-autocpl-wrapper").removeClass("is-hidden"), openDrinksDrop()
                        }))
                    }))
                }
            }
        };
        $("#drinking-autocpl").easyAutocomplete(m)
    }

    if ($("#eating-autocpl").length) {
        a = "";
        var u = {
            url: "assets/data/api/activities/eating/eating-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper is-smaller><img class=autocpl-avatar src='" + e.pic + "' /></div><div class=entry-text>" + a + "</div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 5, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var e = $("#eating-autocpl").val(), t = $("#eating-autocpl").getSelectedItemData().pic;
                    postFormData.append("post-mood", "eating " + $("#eating-autocpl").getSelectedItemData().name)
                    $("#eating-autocpl").val(""), a = '\n                        <span class="mood-display"><img src="' + t + '"><span><span class="action-text">is eating</span>' + e + "</span></span>\n                    ", $(".mood-display").length && $(".mood-display").remove(), $.when($("#options-summary").prepend(a)).done((function () {
                        $("#eating-autocpl-wrapper").addClass("is-hidden"), $(".mood-display").on("click", (function () {
                            postFormData.delete("post-eating");
                            $(".is-suboption").addClass("is-hidden"), $("#activities-suboption, #eating-autocpl-wrapper").removeClass("is-hidden"), openEatsDrop()
                        }))
                    }))
                }
            }
        };
        $("#eating-autocpl").easyAutocomplete(u)
    }

    if ($("#reading-autocpl").length) {
        a = "";
        var v = {
            url: "assets/data/api/activities/reading/reading-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar src='" + e.pic + "' /></div><div class=entry-text>" + a + "<br><span class=is-description>" + e.desc + "</span></div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 6, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var e = $("#reading-autocpl").val(), t = $("#reading-autocpl").getSelectedItemData().pic;
                    postFormData.append("post-mood", "reading " + $("#reading-autocpl").getSelectedItemData().name)
                    $("#reading-autocpl").val(""), a = '\n                        <span class="mood-display"><img src="' + t + '"><span class="is-inverted""><span class="action-text">is reading</span>' + e + "</span></span>\n                    ", $(".mood-display").length && $(".mood-display").remove(), $.when($("#options-summary").prepend(a)).done((function () {
                        $("#reading-autocpl-wrapper").addClass("is-hidden"), $(".mood-display").off(), $(".mood-display").on("click", (function () {
                            postFormData.delete("post-drinking");
                            $(".is-suboption").addClass("is-hidden"), $("#reading-suboption, #reading-autocpl-wrapper").removeClass("is-hidden"), openReadsDrop()
                        }))
                    }))
                }
            }
        };
        $("#reading-autocpl").easyAutocomplete(v)
    }

    if ($("#watching-autocpl").length) {
        a = "";
        var g = {
            url: "assets/data/api/activities/watching/watching-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar src='" + e.pic + "' /></div><div class=entry-text>" + a + "<br><span class=is-description>" + e.desc + "</span></div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 6, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var e = $("#watching-autocpl").val(), t = $("#watching-autocpl").getSelectedItemData().pic;
                    postFormData.append("post-mood", "watching " + $("#watching-autocpl").getSelectedItemData().name)
                    $("#watching-autocpl").val(""), a = '\n                        <span class="mood-display"><img src="' + t + '"><span class="is-inverted""><span class="action-text">is watching</span>' + e + "</span></span>\n                    ", $(".mood-display").length && $(".mood-display").remove(), $.when($("#options-summary").prepend(a)).done((function () {
                        $("#watching-autocpl-wrapper").addClass("is-hidden"), $(".mood-display").off(), $(".mood-display").on("click", (function () {
                            postFormData.delete("post-watching");
                            $(".is-suboption").addClass("is-hidden"), $("#watching-suboption, #watching-autocpl-wrapper").removeClass("is-hidden"), openReadsDrop()
                        }))
                    }))
                }
            }
        };
        $("#watching-autocpl").easyAutocomplete(g)
    }
    if ($("#travel-autocpl").length) {
        a = "";
        var h = {
            url: "assets/data/api/activities/travel/travel-autocpl.json",
            getValue: "name",
            template: {
                type: "custom", method: function (a, e) {
                    return "<div class=template-wrapper><div class=icon-wrapper><img class=autocpl-avatar src='" + e.pic + "' /></div><div class=entry-text>" + a + "</div></div> "
                }
            },
            highlightPhrase: !1,
            list: {
                maxNumberOfElements: 10, showAnimation: {
                    type: "fade", time: 400, callback: function () {
                    }
                }, match: {enabled: !0}, onChooseEvent: function () {
                    var e = $("#travel-autocpl").val(), t = $("#travel-autocpl").getSelectedItemData().pic;
                    postFormData.append("post-mood", $("#travel-autocpl").getSelectedItemData().name)
                    $("#travel-autocpl").val(""), a = '\n                        <span class="mood-display"><img src="' + t + '"><span class="is-inverted""><span class="action-text">Travels to</span>' + e + "</span></span>\n                    ", $(".mood-display").length && $(".mood-display").remove(), $.when($("#options-summary").prepend(a)).done((function () {
                        $("#travel-autocpl-wrapper").addClass("is-hidden"), $(".mood-display").on("click", (function () {
                            postFormData.delete("post-travel");
                            $(".is-suboption").addClass("is-hidden"), $("#activities-suboption, #travel-autocpl-wrapper").removeClass("is-hidden"), openTravelDrop()
                        }))
                    }))
                }
            }
        };
        $("#travel-autocpl").easyAutocomplete(h)
    }

    $("#location-autocpl").length && $((function () {
        var a, e, t = document.getElementById("location-autocpl");
        a = new google.maps.places.Autocomplete(t, {types: ["(cities)"]}), $("#go").click((function () {
            var t = a.getPlace();
            e = new google.maps.Geocoder, console.log(t.geometry), lat = t.geometry.location.lat(), lng = t.geometry.location.lng();
            var s = new google.maps.LatLng(lat, lng);
            e.geocode({latLng: s}, (function (a) {
                for (i = 0; i < a.length; i++) for (var e = 0; e < a[i].address_components.length; e++) for (var t = 0; t < a[i].address_components[e].types.length; t++) "postal_code" == a[i].address_components[e].types[t] && (zipcode = a[i].address_components[e].short_name, $("span.zip").html(zipcode))
            }))
        }))
    }))

    $("#link-autocpl").on("change", function () {
        const link = $(this).val();
        postFormData.append("post-link", link);
    })

    $("#publish-button").on("click", function (e) {
        e.preventDefault();

        var hasLink = postFormData.has('post-link'), hasImage = postFormData.has("post-image");

        $(this).addClass("is-loading");

        postFormData.append("post-on-activity", $("#checkbox-1").prop("checked"));
        postFormData.append("post-on-story", $("#checkbox-2").prop("checked"));
        postFormData.append("story-restriction", $("#story-restriction-status").html());
        postFormData.append("activity-restriction", $("#activity-restriction-status").html());
        postFormData.append("post-user-tagged-number", allId.length.toString());
        postFormData.append("post-type-image", !0);

        allId.forEach(function ({id, name}, index) {
            postFormData.append("post-user-id-" + index, id);
        });

        setFormDataVal(postFormData);

        var target = postFormData.get('post-link');
        //If post has some text

        if (hasLink) {
            getPreviewHtml(target);
        } else {
            processFormData();
        }
        $("#link-autocpl, #publish").val("");
        $("#options-summary, #feed-upload, #tag-list").html("");
        $("#checkbox-2").removeAttr("checked")
        $(".close-publish, .channel").click();
        $(this).removeClass("is-loading").addClass("is-disabled");
        $("#feed-upload-input-1, #feed-upload-input-2").val("").attr("disabled", !1), $(this).closest(".upload-wrap").remove()

        postFormData = new FormData();
        // allId = [];
        // $(this).animate(2000).delay(20000).removeClass("is-loading");
    });

    $(".add-comment-btn").on("click", function () {

        var postId = $(this).data("post-item-id"), responseId = "", postOwner = $(this).data("post-owner-id");
        var itemName = (".post-comment-text-" + postId);
        var commentText = $(`${itemName}`).val();
        responseId = $(itemName).attr("responseId");
        var otherComments = ".add-other-comment-" + postId, commentsNumber = "#number-of-comments-" + postId;
        var numberOfComments = $(`${commentsNumber}`).data("number-of-comments");
        var allNumberOfComments = parseInt(numberOfComments) + 1;
        $(`${commentsNumber}`).data("number-of-comments", allNumberOfComments)
        $("#post-number-of-comments-" + postId).html(allNumberOfComments);
        $(`.post-comment-text-${postId}`).val("");

        $.ajax({
            url: "/includes/createComment.php",
            method: "post",
            data: {
                commentText: commentText,
                postId: postId,
                responseId: responseId,
                postOwner: postOwner
            },
            dataType: "text",
            failed: function () {
                console.log("failed to send information");
            },
            success: function (response) {

                if(!responseId) {
                    $(`${otherComments}`)[0].insertAdjacentHTML("beforebegin", response);
                }else {
                    $("#reply-to-comment-"+responseId).before(response).focus();
                }

                $(".empty-comment-placeholder").remove();
                $(`${commentsNumber}`).html(`(${allNumberOfComments})`);


            },
        });
    });

    $(".reply-link").on("click", function () {

        var postId = $(this).data("post-item-id"), commentId = $(this).data("comment-id");
        var itemName = (".post-comment-text-" + postId);

        $(itemName).focus().attr("responseId", commentId);
    });


}));