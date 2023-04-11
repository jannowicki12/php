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
// function editproduktu() {
//     document.getElementById("editname").disabled=false;
//     document.getElementById("editprice").disabled=false;
//     document.getElementById("editdesc").disabled=false;
//     document.getElementById("editcount").disabled=false;
//     document.getElementById("pokazeditproduktu").parentNode.removeChild(document.getElementById("pokazeditproduktu"));
//     document.getElementById("zmieneditproduktubutton").disabled=false;
// }
