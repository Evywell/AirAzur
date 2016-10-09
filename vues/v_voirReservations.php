<h2>Liste des réservations</h2>

<table style="width:100%" class="hover">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro de vol</th>
            <th>Nb places</th>
            <th>Actions</th>  
        </tr>
    </thead>
    <tbody>
<?php foreach($reservations as $k => $reservation): ?>
    <tr>
        <td><?php echo $reservation['nom']; ?></td>
        <td><?php echo $reservation['prenom']; ?></td>
        <td><?php echo $reservation['numero']; ?></td>
        <td><?php echo $reservation['nbplaces']; ?></td>
        <td><a href="index.php?action=pdfReservation&numReservation=<?php echo $k; ?>"><img src="images/pdf.png"></a> - <a href="index.php?action=suppReservation&id=<?php echo $k; ?>">Supprimer</a></td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
