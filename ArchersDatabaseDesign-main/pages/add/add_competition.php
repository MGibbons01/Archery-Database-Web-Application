<!-- competition id (PK) -->
 <!-- name -->
  <!-- date -->
   <!-- location -->
    <!-- type -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sofia, Fernando, Matt">
    <meta name="description" content="archery database system">
    <meta name="keywords" content="HTML5, homepage">
    <title>Add Competition</title>

    <!-- CSS/Java Link -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://use.typekit.net/ith8ist.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="add_competition">
        <h2>Register Competition</h2>
        <form action="../process/process_competition.php" method="POST">
            <label for="name">Name of Competition:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
            
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>

            <label for="type">Type:</label>
            <input type="text" name="type" id="type" required>
            
            <input type="submit" value="Register Competition">
        </form>
    </div>
</body>
</html>
