<?php
// On inclut la classe de Twitter
require_once('class/twitter.class.php');

// On inclut les fichiers
include('include/config.inc.php');
include('include/functions.php');

// On regarde si l'utilisateur doit se connecter
if(!isConnectToTwitter()) {
    
    // On demande la connexion
    include('login.php');
    
} else {
    
    // On redirige l'utilisateur sur les pages connectées
    echo "ok";
    
}
?>