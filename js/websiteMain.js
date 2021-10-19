
$(document).ready(function () {
    //alert("JQUERY WORKING"); 


    // for(let i = 0; i < webNav.length; i++){
    //     $("#naviMenu").append("<a href=",webNav[i], ".html>blah</a>")
    // }

  
    $("img.hamburMenu").unbind("click").click(function() {
        console.log("CLICK");
        $("nav").toggle(100);
    });

});