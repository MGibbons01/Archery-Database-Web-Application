<?php
require_once("../settings.php");
require_once("../create_database.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["round_name"]));
    $description = htmlspecialchars(trim($_POST["description"]));
    $endsPerRange = (int) $_POST["ends_per_range"];
    $numRanges = (int) $_POST["num_ranges"];
    $targetFace = htmlspecialchars(trim($_POST["target_face"]));
    $totalArrows = (int) $_POST["total_arrows"];
    $categoriesID = (int) $_POST["categories_id"];

    $query = "INSERT INTO Rounds (Categories_ID, Name, Description, EndsPerRange, NumRanges, TargetFace, TotalArrows)
              VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "issiiis", $categoriesID, $name, $description, $endsPerRange, $numRanges, $targetFace, $totalArrows);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p>Round added successfully!</p>";
        } else {
            echo "<p>Error executing query: " . mysqli_stmt_error($stmt) . "</p>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<p>Error preparing query: " . mysqli_error($conn) . "</p>";
    }

    header("Location: ../../index.php");
    mysqli_close($conn);
}
?>
