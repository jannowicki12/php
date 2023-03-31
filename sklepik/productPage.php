<?php
    require_once "systemClass.php";
    require_once "LayoutClass.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        SystemClass::printHead("./styles/main.css", "Sklep Internetowy")
    ?>
</head>
<body>
<div id="page-container">
   <div id="content-wrap">
    <?php
        LayoutClass::printHeader();
    ?>
    <?php
        LayoutClass::showProduct();
    ?>
    </div>
    <?php
        LayoutClass::printFooter();
    ?> 
</div>
</body>
</html>