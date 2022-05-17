/*! tour.js | Friendkit | © Css Ninja. 2019-2020 */
"use strict";
var tour = {
    id: "hello-friendkit",
    onEnd: function () {
        $("#end-tour-modal").addClass("is-active")
    },
    steps: [{
        title: "Let's hop in!",
        content: "Get ready, we are taking you for a NerdLibrary tour.",
        target: document.querySelector("#tour-start"),
        placement: "bottom"
    }, {
        title: "Interactive",
        content: "NerdLibrary is built with the thought of interaction in mind.",
        target: document.querySelector("#made-for-social-too"),
        placement: "top",
        xOffset: 40
    }, {
        title: "Outstanding Features",
        content: "NerdLibrary comes with a lot of features, innovations and interactions. To maximize on your educational success!",
        target: document.querySelector("#icon-features"),
        placement: "top",
        xOffset: "center"
    }, {
        title: "Enough Talk, Let's Build",
        content: "We are taking a totally Practical Based Approach In Learning.!",
        target: document.querySelector("#practical-based-learning"),
        placement: "bottom",
        xOffset: "center"
    }, {
        title: "Test your Understanding In realtime",
        content: "Up to date testing on relevant skills taught",
        target: document.querySelector("#realtime-tests"),
        placement: "top",
        xOffset: "center"
    },
        {
        title: "Ask for yourself, Face to face",
        content: "Real time tutoring and Video based face to face lecturing and Tutoring available!",
        target: document.querySelector("#ask-lecturers"),
        placement: "right",
        xOffset: "center"
    },  {
        title: "Yes We are Available On Mobile too",
        content: "Your favorite platform is available on Mobile, Desktop And Web platform",
        target: document.querySelector("#responsive-design"),
        placement: "bottom",
        xOffset: "center"
    },
        {
        title: "Stuck on anything, Let us help you out",
        content: "Investing in understanding and Teaching you the most industry relevant knowledge, Practices and Information",
        target: document.querySelector("#live-support"),
        placement: "top",
        xOffset: "center"
    },{
        title: "Rewarded challenges",
        content: "Put to use what you have learned, and Win",
        target: document.querySelector("#knowledge-challenges"),
        placement: "top",
        xOffset: "center"
    },
        {
        title: "Creative Ways To keep you Up to Date",
        content: "We hve developed An innovative way for you to stay up to date with all the knowledge you're interested in",
        target: document.querySelector("#information-update"),
        placement: "top",
        xOffset: "center"
    },     {
        title: "Customize Your Profile For Your Own Feel",
        content: "We need to feel comfortable as you learn. Bring your own imagination to customise your own profile",
        target: document.querySelector("#custom-profile"),
        placement: "left",
        xOffset: "center"
    },
        {
        title: "We cater for everyone",
        content: "We made sure you felt at home right here",
        target: document.querySelector("#cater-everyone"),
        placement: "right",
        xOffset: "center",
        multipage: !0,
        onNext: function () {
            window.location = "/feed"
        }
    }, {
        title: "Main Layout",
        content: "This is the main app layout, the navbar provides controls to manage content, user account, and notifications.",
        target: document.querySelector("#main-navbar"),
        placement: "bottom",
        fixedElement: !0,
        xOffset: "center"
    }, {
        title: "Explore",
        content: "From here you can also access an additional explore menu from the navbar",
        target: document.querySelector("#explorer-trigger"),
        placement: "bottom",
        fixedElement: !0,
        xOffset: -5,
        onNext: function () {
            setTimeout((function () {
                $(".is-new-content").addClass("hopscotch-highlight"), $(".app-overlay").addClass("is-active")
            }), 800)
        }
    },
        {
        title: "UserPost Content",
        content: "You can use this UI element to start posting and sharing content, or anything about your mood, who you are with or what you are doing.",
        target: document.querySelector("#compose-card"),
        placement: "bottom",
        xOffset: "center",
        onNext: function () {
            $(".is-new-content").removeClass("hopscotch-highlight"), $(".app-overlay").removeClass("is-active"), setTimeout((function () {
                $("#feed-post-1").addClass("hopscotch-highlight"), $(".app-overlay").addClass("is-active")
            }), 1200)
        }
    },
        {
        title: "This is a UserPost",
        content: "This is how a post looks like. You can share content, images, links, videos and everything you'd like.",
        target: document.querySelector("#feed-post-1"),
        placement: "top",
        xOffset: "center",
        onNext: function () {
            $("#feed-post-1").removeClass("hopscotch-highlight"), $(".app-overlay").removeClass("is-active"), setTimeout((function () {
                $("#latest-activity-1").addClass("hopscotch-highlight"), $(".app-overlay").addClass("is-active")
            }), 1200)
        }
    }, {
        title: "This is a Widget",
        content: "Widgets are used to display abunch of useful information and mainly act as shortcuts.",
        target: document.querySelector("#latest-activity-1"),
        placement: "top",
        xOffset: "center",
        onNext: function () {
            $("#latest-activity-1").removeClass("hopscotch-highlight"), $(".app-overlay").removeClass("is-active")
        }
    }, {
        title: "User Account",
        content: "Your user account dropdown is here, you can use it to access quick links or to view your profile. Let's go to your profile.",
        target: document.querySelector("#account-dropdown"),
        placement: "left",
        xOffset: "5",
        fixedElement: !0,
        multipage: !0,
        onNext: function () {
            window.location = "/profile/main"
        }
    }, {
        title: "Profile",
        content: "This is your profile page, represented by your profile avatar. Click the plus button to display more actions.",
        target: document.querySelector("#user-avatar"),
        placement: "top",
        xOffset: 5
    }, {
        title: "Timeline",
        content: "This is your timeline. All your published posts and shared posts from your friends are here.",
        target: document.querySelector("#profile-timeline-posts"),
        placement: "top",
        xOffset: 5
    }, {
        title: "Basic Info",
        content: "Users and your friends can see some basic information about you, your hobbies or some of your photos.",
        target: document.querySelector("#profile-timeline-widgets"),
        placement: "top",
        xOffset: 5
    }, {
        title: "Friends",
        content: "You can click here to see all your friends and your photos.",
        target: document.querySelector("#profile-friends-link"),
        placement: "top",
        xOffset: 5
    }]
};
$(document).ready((function () {
    $("#tour-start").on("click", (function () {
        hopscotch.isActive || hopscotch.startTour(tour, 0)
    })), console.log(hopscotch.getState()), "hello-friendkit:4" === hopscotch.getState() ? hopscotch.startTour(tour, 4) : "hello-friendkit:10" === hopscotch.getState() && hopscotch.startTour(tour, 10)
}));