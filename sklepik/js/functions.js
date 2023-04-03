function powiadomienie(powiadomienie){
    document.getElementById("alert").style.color = "red";
    document.getElementById("alert").innerHTML = powiadomienie;

}
function Zmiendane(){
    document.getElementById("nowyemail").disabled=false;
    document.getElementById("nowehaslo").disabled=false;
    document.getElementById("pokazemail").parentNode.removeChild(document.getElementById("pokazemail"));
    document.getElementById("zmiendanebutton").disabled =false;
}

function edituser() {
    document.getElementById("editmail").disabled=false;
    document.getElementById("edithaslo").disabled=false;
    document.getElementById("editadmin").disabled=false;
    document.getElementById("pokazedit").parentNode.removeChild(document.getElementById("pokazedit"));
    document.getElementById("zmieneditbutton").disabled=false;

}