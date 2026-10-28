<?php
$projets = ["Gestion de bibliothèque", "Site e-commerce", "Application de notes"];
?>

<h1>Liste des projets</h1>

<ul>
<?php foreach ($projets as $projet) { ?>
    <li><?php echo $projet; ?></li>
<?php } ?>
</ul>