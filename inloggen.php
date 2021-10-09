<?php
    include 'header.php';
?>

<div class="achtergrond">
    <div class="formulier">
        <form name="registreren" method="POST">
            <h1>Inloggen</h1>
            <input type="text" name="user"
            placeholder="gebruikersnaam" /><br><br>
            <input type="email" name="email"
            placeholder="email" /><br><br>
            <input type="password" name="password"
            placeholder="wachtwoord" /><br><br>
            <input type="submit" name="submit" value="inloggen" />
            <br><br><br>
            <a href="wwvergeten.php">Wachtwoord vergeten?</a><br>
            <a href="registreren.php">Nog geen account? Registreer hier!</a>
        </form>
    </div>
</div>

<?php
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        echo "<br> $email";
        echo "<br> $password";

        $sql = "SELECT * FROM `user` WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $userArray = array("email"=>$email);
        $stmt->execute($userArray);
        $result = $stmt->fetch();

        $dbpassword = $result["password"];
        if(password_verify($password, $dbpassword)){
            $_SESSION["ID"] = session_id();

            $_SESSION["USER_ID"] = $result["ID"];

            $_SESSION["USER_NAME"] = $result["username"];

            $_SESSION["STATUS"] = "ACTIEF";

            $_SESSION["ROL"] = $result["is_admin"];
            

            if($_SESSION["ROL"] == 1){
                header("Location:index.php?page=beheer");
                die(); 
            }else{
                header("Location:index.php?page=video");
                die();
            }

        }else{
            echo "wrong password";
        }
        
    }
    echo "<br>";



    include 'footer.php';
?>