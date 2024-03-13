<?php
require_once('config.php'); // Inclure le fichier de configuration de la base de données

class UserManager {

    static function insertUser() {
        global $serveur, $gmail_user, $nom_utilisateur, $mot_de_passe;

        try {
            // Connexion à la base de données avec PDO
            $connexion = new PDO("mysql:host=$serveur;dbname=$gmail_user;charset=utf8mb4", $nom_utilisateur, $mot_de_passe);

            // Afficher les erreurs PDO
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Récupérer le login et le mot de passe du formulaire
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $mail = $_POST["mail"];
                $mot_de_passe = $_POST["mot_de_passe"];

                // Vérifier si l'utilisateur existe déjà dans la base de données
                $requete_Verif = $connexion->prepare("SELECT id FROM utilisateurs WHERE mail = ?");
                $requete_Verif->bindParam(1, $mail);
                $requete_Verif->execute();

                if ($requete_Verif->rowCount() > 0) { // requetes de verification utlisateur
                    // L'utilisateur existe déjà, afficher un message d'erreur
                    print '<p class="warning msg-alert">Cette adresse e-mail est déjà enregistrée. Choisissez une autre adresse e-mail.</p>';
                }
                else
                {
                    // L'utilisateur n'existe pas, procéder à l'insertion
                    if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mot_de_passe) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $motDePasseHash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

                        // Préparer la requête SQL pour insérer les données dans la base de données
                        $requete = $connexion->prepare("INSERT INTO utilisateurs (nom, prenom, mail, mot_de_passe) VALUES (?, ?, ?, ?)");

                        // Binder les paramètres
                        $requete->bindParam(1, $nom);
                        $requete->bindParam(2, $prenom);
                        $requete->bindParam(3, $mail);
                        $requete->bindParam(4, $motDePasseHash); // Utiliser le mot de passe hashé

                        // Exécuter la requête
                        $requete->execute();

                        print '<p class="warning msg-success">'.$nom.' : Enregistrement réussi !</p>';

                    } else {
                        print '<p class="warning msg-alert">Tous les champs sont obligatoires ou mail invalide</p>';
                    }
                }

                // Fermer la connexion
                $connexion = null;
            }
        } catch (PDOException $e) {
            echo '<p class="warning msg-alert">Erreur de connexion à la base de données : </p>' . $e->getMessage();
        }
    }
}

// Utilisation
UserManager::insertUser();
?>
