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
        <?php
            LayoutClass::printHeader();
            LayoutClass::printHero("Witaj", "Sklep internetowy");
            SystemClass::printHeros("Witaj", "Sklep internetowy");
        ?>
    </body>
    <footer>
        <?php
            LayoutClass::printFooter();
        ?>
    </footer>
</html>