<?php
    include 'header.php';
?>

<?php
    include_once("DBconfig.php");

    if(isset($_POST["submit"])){
        $user = $_POST["user"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $userArray = array("user"=>$user , "email"=>$email, "password"=>$password);
        $sql= "INSERT INTO `user` (`ID`, `username`, `email`, `password`, `is_admin`) 
               VALUES (NULL, :user, :email, :password, '0');";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($userArray);
    }
?>
    <div class="achtergrond">
        <div class="formulier">
            <form name="registreren" method="POST">
                <h1>registreren</h1>
                <input type="text" name="user"
                placeholder="gebruikersnaam" /><br><br>
                <input type="email" name="email"
                placeholder="e-mail" /><br><br>
                <input type="password" name="password"
                placeholder="wachtwoord" /><br><br>
                <input type="submit" name="submit" value="registreren" />
                <a href="inloggen.php">terug</a>
            </form>
        </div>
    </div>

<?php
    include 'footer.php';
?>