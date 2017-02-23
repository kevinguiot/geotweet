<?php

// On vérifie que nous ne sommes pas connectés
if(!isConnectToTwitter()) {

    // On vérifie si un formulaire est envoyé
    if(!empty($_POST)) {

    } else {
        
        //On affiche le formulaire
        ?>
        
        <form method="post">
            <table>
                <?php
                //On parcourt le nom des cookies
                foreach($cookies as $cookie) {
                    echo '<tr>';
                    echo '<td>'.$cookie.'</td>';
                    echo '<td><input type="text" name="'.$cookie.'"></td>';
                    echo '</tr>';
                }
                ?>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Se connecter à l'A.P.I Twitter">
                    </td>
                </tr>
            </table>
        </form>
        
        <?php
    }
}
?>