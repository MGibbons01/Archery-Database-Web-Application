<?php
require_once("../settings.php");
require_once("../create_database.php");

// Connect to the database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $date = htmlspecialchars(trim($_POST["date"]));
    $location = htmlspecialchars(trim($_POST["location"]));
    $type = htmlspecialchars(trim($_POST["type"]));

    // Insert into Competitions table (adjust table name if needed)
    $insertQuery = "INSERT INTO Competitions (Name, Date, Location, Type) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $date, $location, $type);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Competition registered successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_stmt_close($stmt);

    // Redirect to view page
    // header("Location: ../view/view_competitions.php");
    header("Location: ../../index.php");
    exit();
}

mysqli_close($conn);
?>
