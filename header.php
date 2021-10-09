<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="header">
            <div class="menu">

                <?php
                    if(isset($_SESSION["ID"]) && $_SESSION["STATUS"] == "ACTIEF"){
                        if($_SESSION["ROL"] == 1){
                    
                ?>

                <li><a class="menuitem" href="video.php">Video's</a></li>
                <li><a class="menuitem" href="beheer.php">Toevoegen</a></li>
                <li><a class="menuitem" href="overzicht.php">Overzicht</a></li>
                <li><a class="menuitem" href="inloggen.php">Inloggen</a></li>
                <?php
                        }elseif($_SESSION["ROL"] == 0){
                ?>

                <a class="menuitem" href="video.php">Video's</a>
                <a class="menuitem" href="profiel.php">Profiel</a>
                <a class="menuitem" href="inloggen.php">Inloggen</a>

                <?php }} ?>
            </div>
            <img src="images/NETFISH_LogoWebsite.jpg" alt="Netfish" width="300" height="100">
        </div>