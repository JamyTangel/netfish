<?php

    session_start();
    include_once("DBconfig.php");

    if(isset($_GET["page"])){
        $page = $_GET["page"];
    } else{
        $page = "inloggen";
    }

    if($page){
        include($page . ".php");
    }

    include 'footer.php';
?>