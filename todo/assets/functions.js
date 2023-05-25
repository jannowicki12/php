function Zmiendane(){
    document.getElementById("nowyemail").disabled=false;
    document.getElementById("nowehaslo").disabled=false;
    document.getElementById("pokazemail").parentNode.removeChild(document.getElementById("pokazemail"));
    document.getElementById("zmiendanebutton").disabled =false;
}