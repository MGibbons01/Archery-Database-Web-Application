<?php
require_once("../settings.php");
require_once("../create_database.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM End");

echo "<h2>All Arrow Ends</h2>";

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>End ID</th>
            <th>Range ID</th>
            <th>End Number</th>
            <th>Arrow 1</th>
            <th>Arrow 2</th>
            <th>Arrow 3</th>
            <th>Arrow 4</th>
            <th>Arrow 5</th>
            <th>Arrow 6</th>
            <th>Total</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['End_ID']}</td>
                <td>{$row['Range_ID']}</td>
                <td>{$row['EndNumber']}</td>
                <td>{$row['Arrow1']}</td>
                <td>{$row['Arrow2']}</td>
                <td>{$row['Arrow3']}</td>
                <td>{$row['Arrow4']}</td>
                <td>{$row['Arrow5']}</td>
                <td>{$row['Arrow6']}</td>
                <td>{$row['Total']}</td>
              </tr>";
    }

    echo "</table>";
    mysqli_free_result($result);
} else {
    echo "<p>No ends found in the database.</p>";
}

mysqli_close($conn);
?>
