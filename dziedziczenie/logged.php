<?php
session_start();
require_once ("interfaceClass.php");
$interfaceClass = new InterfaceClass();
$interfaceClass -> logged();
?>
<!DOCTYPE html>
<html lang="pl">
    <?php
    interfaceClass::printHead("./assets/style.css");
    ?>
    <body>
        <?php
        interfaceClass::interfaceHeader();
        interfaceClass::printHeroSection("TO JEST STRONA DLA ZALOGOWANYCH", "zaloguj sie by widziec tresc");
        interfaceClass::interfaceFooter();
        ?>
    </body>
</html>