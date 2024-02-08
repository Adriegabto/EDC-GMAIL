<?php

class ControlloerBase{
    static function event(){
        
        if(isset($_POST['login']) && isset($_POST['password'])){ # vérification des champs
                
            # vérification si le format du mail est correcte 
            if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_POST['password'] && $_POST['firstname'] && $_POST['lastname']){
                    print "<p>Bonjour ".$_POST['login']."</p>";
                    
                    print '<p><a href="mailto:'.$_POST['login'].'">Contactez moi</a></p>';
                    print "<p>Votre sécurité c'est notre tranquillité : ".password_hash($_POST['password'], PASSWORD_DEFAULT)."</p>";
                    /* print "<p>".$_COOKIE['mail']."</p>"; */
                    
                    /* password_verify(1984, $hash) */
            }
            else{
                
                die("<p> Champs Obligatoires!!! <a href=\"index.php\">Rechargez la page</a></p>");
            }
            return false;
            
        }
    }
}

    ?>