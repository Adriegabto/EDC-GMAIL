<?php
    // start session
    session_start();
?>
<?php
    include_once "include/head.inc.php";
?> 

<body>

<?php
    include_once "include/header.inc.php";
?>

<?php 
    include_once "include/hero.inc.php";
?>


<div class="container">


<p>
                    
                <?php
                    $_SESSION["first_name"] = "Ledorf";
                    $_SESSION["last_name"] = "Rasmus";
                    $_SESSION["heure"] = date("d/m/Y");
                    print "<br>Bonjour ".$_SESSION["last_name"]."<br>" ;
                    print "dernière connexion le : ".$_SESSION["heure"]."<br> 
                    valeur de la session : ".$_COOKIE['PHPSESSID'];
                ?>
                </p>

<?php

    require_once __DIR__ . "bdd/UserManager.class.bdd";
    ?>

<form class="signup-form" id="form" action="<?php print $_SERVER["PHP_SELF"]; ?>">
        <fieldset>
            <legend>Créer un compte</legend>
            <div class="input-container">
                <label for="lastname">Nom :</label>
                <input type="text" id="lastname" name="lastname" placeholder="Votre nom">
            </div>
            <div class="input-container">
                <label for="firstname">Prénom :</label>
                <input type="text" id="firstname" name="firstname" placeholder="Votre prénom">
            </div>
            <div class="input-container">
                <label for="email">Mail :</label>
                <input type="email" id="email" name="email" placeholder="exemple@gmail.com">
            </div>
            <div class="input-container">
                <label for="password">Choisir votre mot de passe :</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="submit-container">
                <button type="submit">VALIDER VOTRE COMPTE</button>
            </div>
        </fieldset>
    </form>


</div>



</body>
</html>