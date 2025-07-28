<!-- roundsid (pk) -->
 <!-- competitionid (fk) -->
  <!-- name -->
   <!-- total rounds -->
    <!-- distance -->
     <!-- max score -->
      <!-- face size -->
      <!-- record arrow scores for each round -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sofia, Fernando, Matt">
    <meta name="description" content="archery database system">
    <title>Add Round</title>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ith8ist.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="add_round">
        <h2>Add Round</h2>
        <form action="../process/process_round.php" method="POST">
            <label for="round_name">Round Name:</label>
            <input type="text" name="round_name" id="round_name" required>

            <label for="description">Description:</label>
            <input type="text" name="description" id="description" required>

            <label for="ends_per_range">Ends per Range:</label>
            <input type="number" name="ends_per_range" id="ends_per_range" required>

            <label for="num_ranges">Number of Ranges:</label>
            <input type="number" name="num_ranges" id="num_ranges" required>

            <label for="target_face">Target Face Size:</label>
            <input type="text" name="target_face" id="target_face" placeholder="e.g., 122cm" required>

            <label for="total_arrows">Total Arrows:</label>
            <input type="number" name="total_arrows" id="total_arrows" required>

            <label for="categories_id">Categories ID:</label>
            <input type="number" name="categories_id" id="categories_id" required>

            <input type="submit" value="Add Round">
        </form>
    </div>
</body>
</html>
