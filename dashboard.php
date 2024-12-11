<?php
$servername = "localhost";
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่านฐานข้อมูล
$dbname = "rentel_car"; // ชื่อฐานข้อมูล

// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูล
$sql = "SELECT id, customerID, carID, rentalDate, returnDate, totalCost FROM rentals"; // ปรับเปลี่ยน fields ตามจำเป็น
$result = $conn->query($sql);
echo "<tr>
        <td>
            <a href='form.html" . "'>Back to Insert</a>
        </td>
        </tr>";
echo "</table>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Customer ID</th><th>Car ID</th><th>Rental Date</th><th>Return Date</th><th>Total Cost</th><th>Actions</th></tr>";
    // แสดงข้อมูลในแต่ละแถว
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["customerID"]."</td>
                <td>".$row["carID"]."</td>
                <td>".$row["rentalDate"]."</td>
                <td>".$row["returnDate"]."</td>
                <td>".$row["totalCost"]."</td>
                <td>
                    <a href='edit.php?id=".$row["id"]."'>Edit</a> |
                    <a href='delete.php?id=".$row["id"]."'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
