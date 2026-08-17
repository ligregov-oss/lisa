
<?php
require_once 'db.php';
session_start(); 
if (!isset($_SESSION['user_id'])) { 
    header("Location: index.php"); 
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bmi = $_POST['bmi'];

    $created_at = date('Y-m-d H:i:s');
    $stmt = $conn->prepare("INSERT INTO bmi_records (user_id, height, weight, bmi, created_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iddds", $user_id, $height, $weight, $bmi, $created_at);
        if ($stmt->execute()) {
        echo "BMI saved successfully.";
    } else {
        echo "Error saving BMI: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
