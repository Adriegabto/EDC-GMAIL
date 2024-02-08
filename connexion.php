<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <link href="./css/connexion.css" rel="stylesheet">
    <title>Gmail-login</title>
</head>

<header>
    <nav class="navbar">
        <div class="navbar-logo"><img src="asset/mail.png" alt="logo"> Gmail</div>
        <div class="navbar-links">
            <a href="./index.php" class="navbar-link">POUR LES PROS</a>
            <a href="./connexion.php" class="navbar-link">CONNEXION</a>
            <a href="#form" class="navbar-link navbar-link-important">CRÉER UN COMPTE</a>
        </div>
    </nav>
</header>
<body>
    
<div class="container">
    <?php

    require_once __DIR__ . "/controller/controller_base.class.php";
    ControlloerBase::event();
    ?>

    <form class="signup-form" method="post">
        <fieldset>
            <legend>Connectez-vous à votre compte</legend>
            <div class="input-container">
                <label for="lastname">Mail ou Login *</label>
                <input type="text" id="login" name="login" placeholder="login">
            </div>
            <div class="input-container">
                <label for="firstname">Mot de passe *</label>
                <input type="password" id="password" name="password" placeholder="Votre password">
            </div>
            <div class="submit-container">
                <button type="submit">CONNEXION A VOTRE COMPTE</button>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>