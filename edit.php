<?php
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "rentel_car"; // Your database name

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the SELECT query
    $stmt = $conn->prepare("SELECT * FROM rentals WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Display the edit form
        echo "<form action='update.php' method='post'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <!-- Add other form fields here with their respective values -->
                <input type='submit' value='Update'>
              </form>";
    } else {
        echo "No record found with that ID.";
    }
    $stmt->close();
} else {
    echo "Invalid ID.";
}

$conn->close();
?>
