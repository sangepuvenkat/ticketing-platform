<?php
$event_id = $_POST['event_id'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'ticketing_system');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch seat availability
$seats = $conn->query("SELECT * FROM seats WHERE event_id = $event_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seat Selection</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <header>
    <h2>Seat Selection</h2>
    <p>Choose your seat for Event ID: <?php echo $event_id; ?></p>
  </header>

  <main>
    <section class="seat-selection">
      <form action="book.php" method="POST">
        <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
        
        <?php while($seat = $seats->fetch_assoc()): ?>
          <?php if ($seat['is_available']): ?>
            <label class="seat">
              <input type="radio" name="seat_id" value="<?php echo $seat['seat_id']; ?>">
              Seat <?php echo $seat['seat_number']; ?>
            </label>
          <?php else: ?>
            <span class="seat unavailable">Seat <?php echo $seat['seat_number']; ?></span>
          <?php endif; ?>
        <?php endwhile; ?>
        
        <input type="text" name="customer_name" placeholder="Enter your name" required>
        <button type="submit">Book Seat</button>
      </form>
    </section>
  </main>

</body>
</html>