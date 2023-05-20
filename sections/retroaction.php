<div class="sautligne">
    <?php
    if (isset($erreurs) && !empty($erreurs) && is_array($erreurs)){
        echo '<div class="erreur">';
        echo '<p>Erreurs :</p>';
        foreach ($erreurs as $err){ echo "<p> $err </p>"; }
        echo '</div>';
    } else if (isset($info) && !empty($info)){
        echo '<div class="succes">';
        echo "<p>$info</p>";
        echo '</div>';
    }
    ?>
</div>