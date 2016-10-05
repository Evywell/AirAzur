<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AirAzur</title>
        <link rel="stylesheet" href="css/app.css"/>
    </head>
    <body>
        <div id="bandeau">
            <img src="http://lorempicsum.com/futurama/627/200/3">
        </div>
        <div id="menu">
            <ul>
                <li><a href="index.php?action=accueil">Accueil</a></li>
                <li><a href="index.php?action=voirVols">Voir le catalogue des vols</a></li>
                <li><a href="index.php?action=voirReservations">Voir les réservations</a></li>
            </ul>

        </div>
        
        <div id="contenu">
            <p>
                <?php echo flash(); ?>
            </p>