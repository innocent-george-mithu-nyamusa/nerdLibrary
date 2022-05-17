$(document).ready(function () {

    $('.like-item').on("click", function (){

        var itemId = $(this).data("item-id"),commentOwner = (this).data("item-owner-id"), currentLikeCount = $("#like-count-"+itemId).data("current-like-count"), likedState = $(this).hasClass("liked");

        if(likedState) {
            currentLikeCount -=1;
            $(this).removeClass("liked");
        }else {
            $(this).addClass("liked");
        }

        var sendData = {
            itemId: itemId,
            likedState: "false",
            commentOwner: commentOwner,
            resourceComment: "comment"
        }

        sendData.likedState = likedState.toString();

        $.ajax({
            url: "/includes/updateSpecialResources.php",
            method: "post",
            data: sendData,
            dataType: "text",
            failed: function () {
                console.log("failed to send like item information");
            },
            success: function (response) {

                if(response == 1) {

                    currentLikeCount +=1;
                    // $(this).addClass("liked");

                } else {

                    currentLikeCount -=1;

                    if(currentLikeCount < 0) {
                        currentLikeCount = 0;
                    }

                    // $(this).removeClass("liked");
                }

                $("#like-count-"+itemId).html(currentLikeCount);
                $("#like-count-"+itemId).attr("data-current-like-count", currentLikeCount);

            },
        });

    });

});