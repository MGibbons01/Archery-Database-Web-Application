<!DOCTYPE html>
<html language="en">
<head>
    <head>
        <!--Basic Setup-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Sofia, Fernando, Matt">
        <meta name="description" content="archery database system">
        <meta name="keywords" content="HTML5, homepage">
        <title>Add Archer</title>

        <!-- CSS/Java Link -->
        <link rel="stylesheet" href="../css/style.css">

        <!--Fonts & Icons-->
        <link rel="stylesheet" href="https://use.typekit.net/ith8ist.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
</head>
<body>
    <div id="add_archer">
        <h2>Register New Archer</h2>
        <form action="../process/process_archers.php" method="POST">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" required>
            
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" required>
            
            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="">Select:</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Non_Binary">Non Binary</option>
            </select>
            
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            
            <label for="age">Age:</label>
            <input type="number" name="age" min="1" max="120" required>
            
            <label for="equipmentCode">Equipment:</label>
            <div>
                <input type="radio" name="equipmentCode" value="R" required> Recurve
                <input type="radio" name="equipmentCode" value="C" required> Compound
                <input type="radio" name="equipmentCode" value="B" required> Recurve/Compound Barebow
                <input type="radio" name="equipmentCode" value="L" required> Longbow
            </div>
            
            <input type="submit" value="Register Archer">
        </form>
    </div>
</body>
</html>
