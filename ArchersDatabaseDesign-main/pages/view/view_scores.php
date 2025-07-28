<?php
require_once("../settings.php");
require_once("../create_database.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM Scores");

echo "<h2>Scores</h2>";

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>Score ID</th>
            <th>Archer ID</th>
            <th>Competition ID</th>
            <th>Is Practice?</th>
            <th>Score</th>
            <th>Score Date</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['Scores_ID']}</td>
                <td>{$row['ArcherID']}</td>
                <td>{$row['Competition_ID']}</td>
                <td>" . ($row['IsPractice'] ? "Yes" : "No") . "</td>
                <td>{$row['Scores']}</td>
                <td>{$row['ScoreDate']}</td>
              </tr>";
    }

    echo "</table>";
    mysqli_free_result($result);
} else {
    echo "<p>No scores found.</p>";
}

mysqli_close($conn);
?>
