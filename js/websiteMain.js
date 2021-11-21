
$(document).ready(function () {
    //alert("JQUERY WORKING"); 


    // for(let i = 0; i < webNav.length; i++){
    //     $("#naviMenu").append("<a href=",webNav[i], ".html>blah</a>")
    // }

  
    $("img.hamburMenu").unbind("click").click(function() {
        //console.log("CLICK");
        $("nav").toggle(100);
    });

    $("img.changeImgSize").click(function () {
        console.log("CLICK");
        $("img.changeImgSize").toggleClass("bigImg")
    });

    $("img.changeImgSize2").click(function () {
        console.log("CLICK1");
        $("img.changeImgSize2").toggleClass("bigImg")
    });
    $("img.changeImgSize3").click(function () {
        console.log("CLICK2");
        $("img.changeImgSize3").toggleClass("regImg bigImg")
    });
    $("img.changeImgSize4").click(function () {
        console.log("CLICK3");
        $("img.changeImgSize4").toggleClass("regImg bigImg")
    });
    $("img.changeImgSize5").click(function () {
        console.log("CLICK5");
        $("img.changeImgSize5").toggleClass("regImg bigImg")
    });

});