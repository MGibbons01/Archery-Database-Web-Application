<?php
require_once("../settings.php");
require_once("../create_database.php");

// Connect to the database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $description = htmlspecialchars(trim($_POST["description"]));

    // Insert into Categories table (adjust table name if needed)
    $insertQuery = "INSERT INTO Categories (Name, Description) VALUES (?, ?)";
    
    // Use prepared statement for safety
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "ss", $name, $description);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Category registered successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_stmt_close($stmt);
    
    // Redirect to category view page
    // header("Location: ../view/view_categories.php");
    header("Location: ../../index.php");

    exit();
}

mysqli_close($conn);
?>
