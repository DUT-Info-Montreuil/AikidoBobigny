<!DOCTYPE html>
	<head>
	    <title>MVC3</title>
        <h1>MVC3</h1>
    </head>
    
<body>
    <header> 
        <?php
            $menu->affiche();
        ?>
    </header>
    <?php
        if(isset($mod))
            echo $mod;

    ?>

</body>
<footer>
        <p>Je m'appele pas </p>
</footer>
</html>