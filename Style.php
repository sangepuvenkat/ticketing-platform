body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #f8f9fa;
}

header {
  text-align: center;
  margin: 20px;
}

.main {
  max-width: 600px;
  width: 90%;
}

.event-selection, .seat-selection {
  background-color: #ffffff;
  padding: 20px;
  margin: 10px 0;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.seat {
  display: inline-block;
  margin: 5px;
}

.unavailable {
  text-decoration: line-through;
  color: #999;
}

button {
  margin-top: 10px;
  padding: 10px 20px;
  background-color: #007bff;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}