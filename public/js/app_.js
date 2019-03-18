var elemDiv = document.getElementById("div-imgLogin");
var elemDiv1 = document.getElementById("app");
elemDiv1["style"]["height"] = window.innerHeight  + "px";
elemDiv["style"]["height"] = window.innerHeight  + "px";

window.addEventListener('resize', function(event){
    elemDiv1["style"]["height"] = window.innerHeight  + "px";
    elemDiv["style"]["height"] = window.innerHeight  + "px";
});
