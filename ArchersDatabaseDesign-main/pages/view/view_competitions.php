<?php
require_once("../settings.php");
require_once("../create_database.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM Competition");

echo "<h2>Registered Competitions</h2>";

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Championship?</th>
            <th>Club ID</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['Competition_ID']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Date']}</td>
                <td>" . ($row['IsChampionship'] ? "Yes" : "No") . "</td>
                <td>{$row['Club_ID']}</td>
              </tr>";
    }

    echo "</table>";
    mysqli_free_result($result);
} else {
    echo "<p>No competitions found.</p>";
}

mysqli_close($conn);
?>
