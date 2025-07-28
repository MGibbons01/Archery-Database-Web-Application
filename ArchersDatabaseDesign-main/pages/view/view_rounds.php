<?php
require_once("../settings.php");
require_once("../create_database.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM Rounds";
$result = mysqli_query($conn, $query);

echo "<h2>Existing Rounds</h2>";

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>Round ID</th>
            <th>Categories ID</th>
            <th>RoundDef ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Ends Per Range</th>
            <th>Number of Ranges</th>
            <th>Target Face</th>
            <th>Total Arrows</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['Round_ID']}</td>
                <td>{$row['Categories_ID']}</td>
                <td>{$row['RoundDef_ID']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Description']}</td>
                <td>{$row['EndsPerRange']}</td>
                <td>{$row['NumRanges']}</td>
                <td>{$row['TargetFace']}</td>
                <td>{$row['TotalArrows']}</td>
              </tr>";
    }

    echo "</table>";
    mysqli_free_result($result);
} else {
    echo "<p>No rounds found in the database.</p>";
}

mysqli_close($conn);
?>
