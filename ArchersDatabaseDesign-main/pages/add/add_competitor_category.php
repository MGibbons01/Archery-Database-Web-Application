<!-- competitor category id -->
 <!-- archers_id (fk) -->
  <!-- categories_id (fk) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sofia, Fernando, Matt">
    <meta name="description" content="archery database system">
    <title>Assign Archer to Category</title>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ith8ist.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="assign_category">
        <h2>Assign Archer to Category</h2>
        <form action="../process/process_competitor_category.php" method="POST">
            <label for="archer_id">Archer ID:</label>
            <input type="number" name="archer_id" id="archer_id" required>

            <label for="category_id">Category ID:</label>
            <input type="number" name="category_id" id="category_id" required>

            <label for="division_id">Division ID:</label>
            <input type="number" name="division_id" id="division_id" required>

            <input type="submit" value="Assign Category">
        </form>
    </div>
</body>
</html>
