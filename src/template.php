<!DOCTYPE html>
<html lang="fr">
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
        <div id="footer">
			<p>© 2022 AIKIDO BOBIGNY</p>
		</div>
    </body>
</html>