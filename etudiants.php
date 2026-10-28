<?php
    $etudiants = [
        [
            "nom" => "Alice Dupont",
            "filiere" => "Informatique",
            "note" => 16.5
        ],
        [
            "nom" => "Bob Martin",
            "filiere" => "Réseaux",
            "note" => 14.0
        ],
        [
            "nom" => "Charlie Roy",
            "filiere" => "Développement Web",
            "note" => 15.5
        ]
    ];

    echo "<h1>Liste des Etudiants</h1>";
    echo "<ul>";
    foreach ($etudiants as $etudiant) {
        echo "<li><strong>" . $etudiant['nom'] . "</strong> - " . $etudiant['filiere'] . " Note: " . $etudiant['note'] . "/20</li>";
    }
    echo "</ul>";
?>