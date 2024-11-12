<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Ticketing Platform</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <header>
    <h1>Online Ticketing Platform</h1>
    <p>Select your event and book your seat!</p>
  </header>

  <main>
    <section class="event-selection">
      <form action="seats.php" method="POST">
        <label for="event">Choose an Event:</label>
        <select name="event_id" id="event">
          <?php
          // Database connection
          $conn = new mysqli('localhost', 'root', '', 'ticketing_system');
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          // Fetch events
          $result = $conn->query("SELECT * FROM events");
          while($row = $result->fetch_assoc()) {
            echo "<option value='{$row['event_id']}'>{$row['name']} - {$row['date']}</option>";
          }
          $conn->close();
          ?>
        </select>
        <button type="submit">View Seats</button>
      </form>
    </section>
  </main>

</body>
</html>