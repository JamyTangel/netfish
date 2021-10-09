<?php
    session_start();
    if(!isset($_SESSION["ID"]) && $_SESSION["STATUS"] != "ACTIEF"){
        echo "<p>U hebt geen toegang tot dit gedeelte van de website</p>";
    } else {
        include_once("header.php");
    }


    include 'footer.php';
?>
