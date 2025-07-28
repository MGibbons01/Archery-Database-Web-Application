<?php
require_once("../settings.php");
require_once("../create_database.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM Archers");

echo "<h2>Registered Archers</h2>";

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    // Made them into their own line for better readability, functionality remains the same
    echo "<tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Age</th>
            <th>Categories ID</th>
            <th>Equipment Code</th>
          </tr>"; // Added Categories_ID and EquipmentCode headers

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['ArcherID']}</td>
                <td>{$row['FirstName']}</td>
                <td>{$row['LastName']}</td>
                <td>{$row['Gender']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['Age']}</td>
                <td>{$row['Categories_ID']}</td> <!-- Added Categories_ID -->
                <td>{$row['EquipmentCode']}</td> <!-- Added EquipmentCode -->
              </tr>";
    }

    echo "</table>";
    mysqli_free_result($result);
} else {
    echo "<p>No archers found.</p>";
}

mysqli_close($conn);
?>
