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
        LayoutClass::printLogin();
    ?>
</body>
</html>