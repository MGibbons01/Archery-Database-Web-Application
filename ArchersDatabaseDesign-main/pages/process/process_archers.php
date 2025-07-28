<?php
require_once("../settings.php");
require_once("../create_database.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// If form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars(trim($_POST["firstName"]));
    $lastName = htmlspecialchars(trim($_POST["lastName"]));
    $gender = htmlspecialchars(trim($_POST["gender"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $age = intval($_POST["age"]);
    $equipmentCode = htmlspecialchars(trim($_POST["equipmentCode"]));

    // Insert query without ArcherID (since it's auto-incremented)
    $insertQuery = "INSERT INTO Archers (FirstName, LastName, Gender, Email, Age, EquipmentCode) 
                    VALUES ('$firstName', '$lastName', '$gender', '$email', $age, '$equipmentCode')";

    if (mysqli_query($conn, $insertQuery)) {
        // Run the updated query to set Categories_ID
        $updateQuery = "
            UPDATE Archers a
            JOIN Class c ON (
                (CASE 
                    WHEN a.Gender = 'Male' THEN 'Male'
                    WHEN a.Gender = 'Female' THEN 'Female'
                    ELSE 'Non-binary'
                 END = c.Gender)
                AND (a.Age BETWEEN c.MinAge AND c.MaxAge)
            )
            JOIN Equipment e ON a.EquipmentCode = CASE
                WHEN e.Name = 'Recurve' THEN 'R'
                WHEN e.Name = 'Compound' THEN 'C'
                WHEN e.Name = 'Barebow' THEN 'B'
                WHEN e.Name = 'Longbow' THEN 'L'
            END
            JOIN Categories cat ON (c.Class_ID = cat.Class_ID AND e.Equipment_ID = cat.Equipment_ID)
            SET a.Categories_ID = cat.Categories_ID
            WHERE a.Email = '$email';"; // Use email to identify the newly added archer

        if (mysqli_query($conn, $updateQuery)) {
            echo "<p>Archer registered successfully and Categories_ID updated!</p>";
        } else {
            echo "<p>Error updating Categories_ID: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}

// Redirect to the view page after insertion
header("Location: ../view/view_archers.php");
mysqli_close($conn);
exit();
?>
