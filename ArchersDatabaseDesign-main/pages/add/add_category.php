<!-- category id (pk) -->
 <!-- name -->
  <!-- description -->
   <!-- under 14, open -->
    <!-- gender -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sofia, Fernando, Matt">
    <meta name="description" content="archery database system">
    <meta name="keywords" content="HTML5, homepage">
    <title>Register Category</title>

    <!-- CSS/Java Link -->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://use.typekit.net/ith8ist.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="add_category">
        <h2>Register Category</h2>
        <form action="../process/process_category.php" method="POST">
            <label for="name">Name of Category:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="description">Description:</label>
            <input type="text" name="description" id="description">


            
            <input type="submit" value="Register Category">
        </form>
    </div>
</body>
</html>
