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

    require_once __DIR__ . "/controller/controller_main.class.php";
    ControlloerBase::event();
    ?>

<?php
$mysqli = new mysqli("localhost", "root", "", "projet_fakegmail");

// Vérif la con
if ($mysqli->connect_errno) {
    echo "Échec de connexion à la base de données: " . $mysqli->connect_error;
    exit();
}

// recup les données de la table
$result = $mysqli->query("SELECT first_name, last_name, email, password FROM database_gmail");

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Prénom</th><th>Nom</th><th>Email</th><th>Mot de passe</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["password"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Aucun résultat trouvé";
}

$mysqli->close();
?>

    <?php
    include_once "include/form.inc.php";
    ?>

</div>



</body>
</html>