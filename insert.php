<?php
$servername = "localhost";
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่านฐานข้อมูล
$dbname = "rentel_car"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$customerID = $_POST['customerID'];
$carID = $_POST['carID'];
$rentalDate = $_POST['rentalDate'];
$returnDate = $_POST['returnDate'];
$totalCost = $_POST['totalCost'];

// คำสั่ง SQL เพื่อบันทึกข้อมูล
$stmt = $conn->prepare("INSERT INTO rentals (customerID, carID, rentalDate, returnDate, totalCost) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iissi", $customerID, $carID, $rentalDate, $returnDate, $totalCost);

// ดำเนินการบันทึกข้อมูล
$stmt->execute();

echo "New record created successfully";
echo "<tr>
        <td>
            <a href='form.html" . "'>Back to Insert</a>
            <a href='dashboard.php" . "'>Next</a>
        </td>
        </tr>";
echo "</table>";
// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
?>
