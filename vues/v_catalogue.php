<?php foreach($vols as $vol): ?>
<div>
<p>
    vol <strong><?php echo $vol->numero; ?></strong>
    départ : <?php echo $vol->depart_nom . ' - ' . $vol->depart_pays . ' - ' . $vol->date_depart; ?><br />
    arrivée : <?php echo $vol->arrivee_nom . ' - ' . $vol->arrivee_pays . ' - ' . $vol->date_arrivee; ?><br />
    <strong>prix <?php echo $vol->prix; ?> - <a href="index.php?action=reserver&id=<?php echo $vol->numero ?>">Réserver</a></strong>
</p>
</div>
<?php endforeach; ?>
