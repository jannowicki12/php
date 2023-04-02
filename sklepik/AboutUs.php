<?php
    require_once "systemClass.php";
    require_once "LayoutClass.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        SystemClass::printHead("./styles/main.css", "Shop")
    ?>
</head>
<body>
<div id="page-container">
   <div id="content-wrap">
    <?php
        LayoutClass::printHeader();
    ?>
    <?php
        LayoutClass::printHero("About Us", "Lorem ipsum sit dolor amet");
    ?>
    </div>
    <?php
        LayoutClass::printFooter();
    ?> 
</div>
</body>
</html>