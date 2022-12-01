<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8">
        <title>AIKIDO BOBIGNY</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
            $menu->affiche();
            if (isset($contenu)) {
                echo $contenu;
            }
        ?>
    </body>
</html>