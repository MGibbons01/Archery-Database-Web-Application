<?php
require_once("settings.php");

// Create database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$tables = [

    // Equipment
    "CREATE TABLE IF NOT EXISTS Equipment (
        Equipment_ID INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(50) NOT NULL
    )",

    // Class
    "CREATE TABLE IF NOT EXISTS Class (
        Class_ID INT AUTO_INCREMENT PRIMARY KEY,
        Gender ENUM('Male', 'Female', 'Mixed') NOT NULL,
        MinAge INT NOT NULL,
        MaxAge INT NOT NULL
    )",

    // Categories
    "CREATE TABLE IF NOT EXISTS Categories (
        Categories_ID INT AUTO_INCREMENT PRIMARY KEY,
        Equipment_ID INT,
        Class_ID INT,
        FOREIGN KEY (Equipment_ID) REFERENCES Equipment(Equipment_ID),
        FOREIGN KEY (Class_ID) REFERENCES Class(Class_ID)
    )",

    // Club
    "CREATE TABLE IF NOT EXISTS Club (
        Club_ID INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(100) NOT NULL,
        Location VARCHAR(100)
    )",

    // Competition
    "CREATE TABLE IF NOT EXISTS Competition (
        Competition_ID INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(100) NOT NULL,
        Date DATE NOT NULL,
        IsChampionship BOOLEAN DEFAULT 0,
        Club_ID INT,
        FOREIGN KEY (Club_ID) REFERENCES Club(Club_ID)
    )",

    // Rounds
    "CREATE TABLE IF NOT EXISTS Rounds (
        Round_ID INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(100) NOT NULL,
        Categories_ID INT,
        FOREIGN KEY (Categories_ID) REFERENCES Categories(Categories_ID)
    )",

    // Ranges
    "CREATE TABLE IF NOT EXISTS Ranges (
        Range_ID INT AUTO_INCREMENT PRIMARY KEY,
        Round_ID INT,
        RangeValue INT,
        TargetFaceSize VARCHAR(50),
        NumOfEnds INT,
        FOREIGN KEY (Round_ID) REFERENCES Rounds(Round_ID)
    )",

    // Archers
    "CREATE TABLE IF NOT EXISTS Archers (
        ArcherID INT AUTO_INCREMENT PRIMARY KEY,
        FirstName VARCHAR(50) NOT NULL,
        LastName VARCHAR(50) NOT NULL,
        Gender ENUM('Male', 'Female', 'Non-binary', 'Other') NOT NULL,
        Email VARCHAR(100) UNIQUE NOT NULL,
        Age INT NOT NULL,
        Categories_ID INT,
        EquipmentCode VARCHAR(1), -- Added EquipmentCode column
        FOREIGN KEY (Categories_ID) REFERENCES Categories(Categories_ID)
    )",

    // Scores
    "CREATE TABLE IF NOT EXISTS Scores (
        Scores_ID INT AUTO_INCREMENT PRIMARY KEY,
        ArcherID INT,
        ScoreDate DATE NOT NULL,
        IsPractice BOOLEAN DEFAULT 0,
        Equipment_ID INT,
        Competition_ID INT,
        FOREIGN KEY (ArcherID) REFERENCES Archers(ArcherID),
        FOREIGN KEY (Equipment_ID) REFERENCES Equipment(Equipment_ID),
        FOREIGN KEY (Competition_ID) REFERENCES Competition(Competition_ID)
    )",


    // ArrowScore
    "CREATE TABLE IF NOT EXISTS ArrowScore (
        ArrowScore_ID INT AUTO_INCREMENT PRIMARY KEY,
        End_ID INT,
        ArrowNumber INT,
        Value INT,
        FOREIGN KEY (End_ID) REFERENCES EndTable(End_ID)
    )",

    // StagedScore
    "CREATE TABLE IF NOT EXISTS StagedScore (
        StageScore_ID INT AUTO_INCREMENT PRIMARY KEY,
        ArcherID INT,
        Round_ID INT,
        Equipment_ID INT,
        Date DATE,
        Approved BOOLEAN DEFAULT 0,
        Notes TEXT,
        FOREIGN KEY (ArcherID) REFERENCES Archers(ArcherID),
        FOREIGN KEY (Round_ID) REFERENCES Rounds(Round_ID),
        FOREIGN KEY (Equipment_ID) REFERENCES Equipment(Equipment_ID)
    )"

];

// Execute each query
// foreach ($tables as $query) {
//     if (mysqli_query($conn, $query)) {
//         echo "Table created successfully.<br>";
//     } else {
//         echo "Error creating table: " . mysqli_error($conn) . "<br>";
//     }
// }

// Close connection
mysqli_close($conn);
?>
