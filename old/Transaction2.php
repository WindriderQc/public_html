<?php
// Nom du fichier de la base de données SQLite
$databaseFile = 'LHSQC-STHS.db';

try {
    // Vérifier si le fichier de la base de données existe
    if (!file_exists($databaseFile)) {
        throw new Exception("Base de données non trouvée.");
    }

    // Connexion à la base de données SQLite
    $db = new SQLite3($databaseFile);

    // Requête pour récupérer les champs spécifiés
    $query = "SELECT SendingTeamNumber, SendingTeamName, ReceivingTeamNumber, ReceivingTeamName, ReceivingTeamText FROM YourTableName";

    // Exécuter la requête
    $result = $db->query($query);

    // Vérifier si des résultats ont été retournés
    if (!$result) {
        throw new Exception("Aucun résultat trouvé.");
    }

    // Parcourir les résultats et les afficher
    echo "<table border='1'>";
    echo "<tr><th>Sending Team Number</th><th>Sending Team Name</th><th>Receiving Team Number</th><th>Receiving Team Name</th><th>Receiving Team Text</th></tr>";
    
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['SendingTeamNumber'] . "</td>";
        echo "<td>" . $row['SendingTeamName'] . "</td>";
        echo "<td>" . $row['ReceivingTeamNumber'] . "</td>";
        echo "<td>" . $row['ReceivingTeamName'] . "</td>";
        echo "<td>" . $row['ReceivingTeamText'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";

    // Fermer la connexion à la base de données
    $db->close();
} catch (Exception $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo "Erreur : " . $e->getMessage();
}
?>
