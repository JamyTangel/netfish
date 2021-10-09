<?php
    session_start();
    if(!isset($_SESSION["ID"]) && $_SESSION["STATUS"] != "ACTIEF"){
        echo "<p>U hebt geen toegang tot dit gedeelte van de website</p>";
    } else {
        include_once("header.php");



    include_once "DBconfig.php";
    
    $sql = "SELECT * FROM `movie`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);

    ?>
    <div class="overzicht">
    <table>
    <tr>
        <td>Titel</td>
        <td>Jaar</td>
        <td>Omschrijving</td>
        <td>Afbeelding</td>
    </tr>

    <?php foreach($result as $movie):?>
    <tr>
        <td><?php echo $movie["title"]?></td>
        <td><?php echo $movie["year"]?></td>
        <td><?php echo $movie["description"]?></td>
        <td> <img src="<?php echo $movie["url"]?>" alt=""></td>
        <td><a href="delete.php?id=<?= $movie["ID"]?>">delete</a></td>
    </tr>
    <?php endforeach;?>
    </table>
    </div>
<?php }?>
