
<?php
require_once 'db.php';

session_start(); 
if (!isset($_SESSION['user_id'])) { 
    header("Location: index.php"); 
    exit();
}
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT created_at, height, weight, bmi FROM bmi_records WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die("Database query failed: " . $conn->error);
}
if (!$result) {
    die("Database query failed: " . $conn->error);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Povjest</title>
    <link href="newcss.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container">
    <h1>Povjest</h1>
    <a href="index.php">Početna</a>
    <table>
        <thead>
            <tr>
                <th>Datum i vrijeme</th>
                <th>Visina (cm)</th>
                <th>Težina (kg)</th>
                <th>BMI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['height']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['weight']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['bmi']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>