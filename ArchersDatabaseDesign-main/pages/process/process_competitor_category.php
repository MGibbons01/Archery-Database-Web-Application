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
    $archer_id = intval($_POST["archer_id"]);
    $category_id = intval($_POST["category_id"]);
    $division_id = intval($_POST["division_id"]);

    // Insert into CompetitorCategories table (adjust if your table is named differently)
    $insertQuery = "INSERT INTO CompetitorCategories (ArcherID, CategoryID, DivisionID) VALUES (?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "iii", $archer_id, $category_id, $division_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Archer successfully assigned to category and division!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_stmt_close($stmt);

    // Redirect to view page
    // header("Location: ../view/view_competitor_categories.php");
    header("Location: ../../index.php");
    exit();
}

mysqli_close($conn);
?>
