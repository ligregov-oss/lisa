
<?php
session_start(); 
if (!isset($_SESSION['user_id'])) { 
    header("Location: index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link href="newcss.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Početna</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
    <div class="container">
        
    <h2>BMI Kalkulator</h2>
    <form id="bmiForm">
        
        <label for="height">Visina (cm):</label>
        <input type="number" step="0.01" id="height" name="height" required><br><br>
        
        <label for="weight">Težina (kg):</label>
        <input type="number" id="weight" name="weight" required><br><br>
        
        <input type="button" id="calculateBtn" value="Calculate BMI">
        <input type="button" id="saveBtn" value="Save BMI">
        
    </form>
    
    <div id="result"></div>
    <div id="image"></div>
    
    </div>
    <script src="javascript.js" type="text/javascript"></script>
</body>
</html>
