<?php
$event_id = $_POST['event_id'];
$seat_id = $_POST['seat_id'];
$customer_name = $_POST['customer_name'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'ticketing_system');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert ticket and mark seat as booked
$conn->query("INSERT INTO tickets (event_id, seat_id, customer_name) VALUES ($event_id, $seat_id, '$customer_name')");
$conn->query("UPDATE seats SET is_available = 0 WHERE seat_id = $seat_id");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Confirmation</title>
</head>
<body>

  <header>
    <h2>Booking Confirmation</h2>
  </header>

  <main>
    <p>Thank you, <?php echo htmlspecialchars($customer_name); ?>! Your seat has been booked.</p>
  </main>

</body>
</html>