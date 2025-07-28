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
    $division_name = htmlspecialchars(trim($_POST["division_name"]));
    $description = htmlspecialchars(trim($_POST["description"]));

    // Insert into Divisions table
    $insertQuery = "INSERT INTO Divisions (DivisionName, Description) VALUES (?, ?)";
    
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "ss", $division_name, $description);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Division added successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_stmt_close($stmt);

    // Redirect to view page or relevant section
    // header("Location: ../view/view_divisions.php");
    header("Location: ../../index.php");
    exit();
}

mysqli_close($conn);
?>
