<h2>Liste des réservations</h2>

<table>
    <thead>
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Numéro de vol</td>
            <td>Nb places</td>
            <td>Actions</td>  
        </tr>
    </thead>
    <tbody>
<?php foreach($reservations as $k => $reservation): ?>
    <tr>
        <td><?php echo $reservation['nom']; ?></td>
        <td><?php echo $reservation['prenom']; ?></td>
        <td><?php echo $reservation['numero']; ?></td>
        <td><?php echo $reservation['nbplaces']; ?></td>
        <td><a href="#"><img src="images/pdf.png"></a> - <a href="index.php?action=suppReservation&id=<?php echo $k; ?>">Supprimer</a></td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
