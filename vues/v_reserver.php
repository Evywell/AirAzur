<h3>Réservation du vol n°<?php echo $idVol; ?></h3>
<form action="index.php?action=reserverVol" method="POST">
    <p>
        <label for="nom">Nom*</label>
        <input id="nom" type="text" name="nom">
    </p>
    <p>
        <label for="prenom">Prénom*</label>
        <input id="prenom" type="text" name="prenom">
    </p>
    <p>
        <label for="adresse">Adresse*</label>
        <input id="adresse" type="text" name="adresse">
    </p>
    <p>
        <label for="mail">Mail*</label>
        <input id="mail" type="text" name="mail">
    </p>
    <p>
        <label for="nbvoyageurs">Nombre de voyageurs*</label>
        <input id="nbvoyageurs" type="text" name="nbvoyageurs">
    </p>
    <input type="hidden" name="idVol" value="<?php echo $idVol; ?>">
    <button type="submit">valider</button>
    <button type="reset">Annuler</button>
</form>