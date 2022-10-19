<!DOCTYPE html>
	<head>
	    <title>Aikido Bobigny</title>
    </head>
    
<body>
    <header> 
    <h1>Aikïdo Bobigny</h1>
        <?php
            $menu->affiche();
        ?>
    </header>
    <?php
        if(isset($mod))
            echo $mod;

    ?>
    <h2><?= $month->toString();?></h2>
    <?php $month->getWeeks();
    ?>
    <table class = "calendar__table">
        <?php for ($i = 0; $i < $month->getWeeks();$i++): ?>
        <tr>
            <td>
                Lundi<br>
                <?= $day->format('d'); ?>
            </td>
            <td>Mardi</td>
            <td>Mercredi</td>
            <td>Jeudi</td>
            <td>Vendredi</td>
            <td>Samedi</td>
            <td>Dimanche</td>
        </tr>
        <?php endfor; ?>
    </table>

</body>
<footer>
        <p>COPYRIGHT </p>
</footer>
</html>