
<?php
$servername = "localhost";
$username = "lgregov"; 
$password = "bTs5S-cJ*BX*8JyC";
$dbname = "wellnes";

$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
?>