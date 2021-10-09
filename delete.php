<?php
    session_start();
    // include "header.php";
if(!isset($_SESSION["ID"]) && $_SESSION["STATUS"] != "ACTIEF"){
    echo "<p>U hebt geen toegang tot dit gedeelte van de website</p>";
} else {
    include_once("header.php");
    
    include_once("DBconfig.php");


    if(isset($_GET["id"])){
        $sql = "DELETE FROM `movie` WHERE `movie`.`ID` = :ID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["ID" => $_GET['id']]);
        header("Location:index.php?page=overzicht");
    }

    if(isset($_POST["cancel"])){
        header("Location:index.php?page=overzicht");
    }
}
?>

 <div class="overzicht">
      <p>Weet u zeker dat u de film <?php echo $result["title"]?> wilt verwijderen?</p>
      <form action="" method="post" enctype="multipart/form-data">
      <input type="submit" name="cancel" value="cancel">
      <input type="submit" name="delete" value="delete">
     </form>
  </div>
    