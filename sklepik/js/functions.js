function powiadomienie(powiadomienie){
    document.getElementById("alert").style.color = "red";
    document.getElementById("alert").innerHTML = powiadomienie;

}
function Zmiendane(){
    document.getElementById("nowyemail").disabled=false;
    document.getElementById("nowehaslo").disabled=false;
    document.getElementById("zmiendanebutton").disabled =false;
}