<div id="generate_ticket">
  <h2>Release Slot</h2>
  <form action="release-action.php" method="post">
    <label for="vehicle_number">Vehicle Number</label>
    <input type="text" id="vehicle_number" name="vehicle_number" required>

    <label for="vehicle_type">Vehicle Type</label>
    <select id="vehicle_type" name="vehicle_type" required>
      <option value="">Select vehicle type</option>
      <option value="2-wheeler">2-wheeler</option>
      <option value="4-wheeler">4-wheeler</option>
    </select>

    <button type="submit">Release slot</button>
  </form>
