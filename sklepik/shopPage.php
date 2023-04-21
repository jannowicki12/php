<?php
    require_once "systemClass.php";
    require_once "LayoutClass.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        SystemClass::printHead("./styles/main.css", "Sklep Internetowy");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
    <?php
        LayoutClass::printHeader();
    ?>
    <?php
        LayoutClass::printPages();
    ?>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name="search_text" id="search_text" placeholder="Search by Product Name" class="form-control" />
        </div>
        <div id="result"></div>
    </div>
    <br />
    <script>
                $(document).ready(function(){
                    load_data();
                    function load_data(query)
                    {
                        $.ajax({
                            url:"searchscript.php",
                            method:"post",
                            data:{query:query},
                            success:function(data)
                            {
                                $("#result").html(data);
                            }
                        });
                    }
                    
                    $("#search_text").keyup(function(){
                        var search = $(this).val();
                        if(search != "")
                        {
                            load_data(search);
                        }
                        else
                        {
                            load_data();			
                        }
                    });
                });
    </script>
    <?php
        LayoutClass::getProducts();
    ?>
    <?php
        LayoutClass::printFooter();
    ?>
</body>
</html>