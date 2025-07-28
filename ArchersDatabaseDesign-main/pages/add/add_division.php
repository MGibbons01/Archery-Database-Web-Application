<!-- add division names like recurve, compound -->
 <!-- age range -->
  <!-- divisions id -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sofia, Fernando, Matt">
    <meta name="description" content="archery database system">
    <title>Add Division</title>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ith8ist.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="add_division">
        <h2>Add Division</h2>
        <form action="../process/process_division.php" method="POST">
            <label for="division_name">Division Name:</label>
            <input type="text" name="division_name" id="division_name" required>

            <label for="description">Description:</label>
            <input type="text" name="description" id="description">

            <input type="submit" value="Add Division">
        </form>
    </div>
</body>
</html>
