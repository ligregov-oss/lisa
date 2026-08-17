
 <?php
require_once 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $name, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            echo "Prijava uspješna! Preusmjeravanje...";
            echo "<script>setTimeout(function(){ window.location.href = 'bmi_kalkulator.php'; }, 2000);</script>";
        } else {
            echo "Nevažeća lozinka.";
        }
    } else {
        echo "Nije pronađen korisnik s tom e-mail adresom.";
    }

    $stmt->close();
    $conn->close();
}
?>
