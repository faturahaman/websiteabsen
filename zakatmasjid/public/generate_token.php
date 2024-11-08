<?php
require '../config/db.php';

// Generate a unique token for the day
$token = bin2hex(random_bytes(16)); // Generates a random 32-character string
$today = date('Y-m-d');

// Insert or update the token for today
$query = "REPLACE INTO tb_tokens (date, token) VALUES ('$today', '$token')";
mysqli_query($conn, $query);

// Generate a QR code URL for the token link
$attendanceUrl = "https://yoursite.com/attendance.php?token=$token";
$qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($attendanceUrl) . "&size=200x200";

// You can save this URL ($qrCodeUrl) to display or manually print it
echo "Today's QR code URL: " . $qrCodeUrl;
?>
