$(".list-group-item").click(function () {
    //remove all
    $(".list-group-item").removeClass("active");
    $(".list-group-item").find(".glyphicon").removeClass("rotateDownIn");
    $(".list-group-item").find(".glyphicon").addClass("rotateDownOut");
    //add for this
    $(this).addClass("active");
    $(this).find(".glyphicon").removeClass("rotateDownOut");
    $(this).find(".glyphicon").addClass("rotateDownIn");
});
