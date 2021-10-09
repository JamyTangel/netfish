<?php
    include 'header.php';
?>

<div class="achtergrond">
        <div class="formulier">
            <form name="registreren" method="POST">
                <h1>Wachtwoord vergeten</h1>
                <input type="text" name="email"
                placeholder="email" /><br><br>
                <input type="submit" value="Resetten" />
                <a href="inloggen.php">terug</a>
            </form>
        </div>
    </div>

<?php
    include 'footer.php';
?>