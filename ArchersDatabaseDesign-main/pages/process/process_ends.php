<?php
require_once("../settings.php");
require_once("../create_database.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $actionType = $_POST["action_type"];

    // Collect and validate arrow scores
    $arrows = [];
    for ($i = 1; $i <= 6; $i++) {
        if (isset($_POST["Arrow$i"])) {
            $val = $_POST["Arrow$i"];
            $arrows[] = intval($val);
        }
    }

    while (count($arrows) < 6) {
        $arrows[] = 0;
    }

    rsort($arrows);
    $total = array_sum($arrows);

    // Defaults for insert
    $rangeID = 1;
    $endNumber = 1;

    if ($actionType === "insert") {
        $insertQuery = "
            INSERT INTO End (Range_ID, EndNumber, Arrow1, Arrow2, Arrow3, Arrow4, Arrow5, Arrow6, Total)
            VALUES ($rangeID, $endNumber, {$arrows[0]}, {$arrows[1]}, {$arrows[2]}, {$arrows[3]}, {$arrows[4]}, {$arrows[5]}, $total)
        ";

        if (mysqli_query($conn, $insertQuery)) {
            $newId = mysqli_insert_id($conn);
            echo "<p>New End ID $newId created and arrow scores saved successfully!</p>";
        } else {
            echo "<p>Error inserting score: " . mysqli_error($conn) . "</p>";
        }
    } elseif ($actionType === "update") {
        $endID = isset($_POST["End_ID"]) ? intval($_POST["End_ID"]) : 0;


        if ($endID > 0) {
            $updateQuery = "
                UPDATE End SET 
                    Arrow1 = {$arrows[0]}, 
                    Arrow2 = {$arrows[1]}, 
                    Arrow3 = {$arrows[2]}, 
                    Arrow4 = {$arrows[3]}, 
                    Arrow5 = {$arrows[4]}, 
                    Arrow6 = {$arrows[5]}, 
                    Total = {$total}
                WHERE End_ID = {$endID}
            ";

            if (mysqli_query($conn, $updateQuery)) {
                echo "<p>End ID $endID updated successfully!</p>";
            } else {
                echo "<p>Error updating score: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>Error: Valid End ID must be provided for update.</p>";
        }
    } else {
        echo "<p>Error: Invalid action type selected.</p>";
    }

    mysqli_close($conn);
} else {
    echo "<p>Invalid request method.</p>";
}
?>
