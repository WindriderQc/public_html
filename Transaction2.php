<?php
// Nom du fichier de la base de données SQLite
$databaseFile = 'LHSQC-STHS.db';

// Chemin vers le dossier contenant les logos des équipes
$logoPath = 'images/'; // Remplacez par le chemin de votre dossier contenant les logos

try {
    // Connexion à la base de données SQLite
    $db = new SQLite3($databaseFile);

    // Requête pour récupérer les champs spécifiés, incluant ReceivingTeamThemeID
    $query = "SELECT ReceivingTeamThemeID, ReceivingTeamName, ReceivingTeamText 
              FROM TradeLog";

    // Exécuter la requête
    $result = $db->query($query);

    // Vérifier si des résultats ont été retournés
    if (!$result) {
        throw new Exception("Aucun résultat trouvé.");
    }

    // Initialiser un compteur pour suivre les lignes
    $counter = 0;

    // Encapsuler le tableau dans une div avec une largeur de 1280px
    echo "<div style='width: 1280px; margin: auto;'>"; // Centrer la div sur la page

    // Parcourir les résultats et les afficher
    echo "<table style='border-collapse: collapse; width: 100%;'>"; // Utiliser toute la largeur disponible
    echo "<tr>
            <th style='border-bottom: 2px solid black; padding: 10px;'>Logo</th>
            <th style='border-bottom: 2px solid black; padding: 10px;'>Team Name</th>
            <th style='border-bottom: 2px solid black; padding: 10px;'>Assets</th>
            <th style='border-bottom: 2px solid black; padding: 10px;'>Logo</th>
            <th style='border-bottom: 2px solid black; padding: 10px;'>Team Name</th>
            <th style='border-bottom: 2px solid black; padding: 10px;'>Assets</th>
          </tr>";
    
    // Boucle pour parcourir toutes les lignes
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        // Si c'est la première ligne d'une paire, commence une nouvelle ligne de tableau
        if ($counter % 2 == 0) {
            echo "<tr>";
        }

        // Générer le chemin du logo basé sur le ReceivingTeamThemeID
        $logoFile = $logoPath . $row['ReceivingTeamThemeID'] . ".png"; // Assurez-vous que les fichiers sont des .png

        // Afficher le logo
        echo "<td style='border-bottom: 1px solid black; padding: 10px; text-align: center; width: 20%;'><img src='" . $logoFile . "' alt='" . $row['ReceivingTeamName'] . " Logo' width='50' height='50'></td>";
        
        // Afficher le nom de l'équipe après l'image
        echo "<td style='border-bottom: 1px solid black; padding: 10px;'>" . $row['ReceivingTeamName'] . "</td>";

        // Afficher le texte associé à l'équipe
        echo "<td style='border-bottom: 1px solid black; padding: 10px;'>" . $row['ReceivingTeamText'] . "</td>";

        // Si c'est la deuxième ligne d'une paire, fermer la ligne de tableau
        if ($counter % 2 == 1) {
            echo "</tr>";
        }

        // Incrémenter le compteur
        $counter++;
    }

    // Si le nombre de lignes est impair, on termine la dernière ligne du tableau sans diviseur
    if ($counter % 2 != 0) {
        echo "<td colspan='3' style='border-bottom: 1px solid black;'></td></tr>";  // Ajouter des cellules vides pour compléter la dernière ligne
    }

    echo "</table>";
    echo "</div>"; // Fermer la div

    // Fermer la connexion à la base de données
    $db->close();
} catch (Exception $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo "Erreur : " . $e->getMessage();
}
?>
