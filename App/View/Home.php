<!DOCTYPE html>
<html>
  <head>
    <title>Parking Lot Management</title>
  </head>
  <body>
    <h1>Parking Lot Management System</h1>
    
    <div class="container">
      <!-- Availability section -->
      <div class="availability">
        <h2>Availability</h2>
        <form action="/home/availableSlot" method="POST">
        <button type="submit">availabe slot</button>
        </form>
       
      </div>

      <!-- Tickets section -->
      <div class="tickets">
        <h2>Tickets</h2>
       <form action="/feed/summary" method="POST">
       <button type="submit">Summary</button>
       </form>
      </div>

      <!-- Generate Ticket section -->
      <div class="generate-ticket">
        <h2>Generate Ticket</h2>
        <form action="/home/genrateTicket" method="POST">
          <label for="vehicle-number">Vehicle Number:</label>
          <input type="text" id="vehicle-number" name="vehicle_number" required>
          
          <label for="vehicle-type">Vehicle Type:</label>
          <select id="vehicle-type" name="vehicle_type" required>
            <option value="">Select vehicle type</option>
            <option value="2-wheeler">2-Wheeler</option>
            <option value="4-wheeler">4-Wheeler</option>
          </select>

          <button type="submit">Generate Ticket</button>
        </form>
      </div>

      <!-- Release Slot section -->
      <div class="release-slot">
        <h2>Release Slot</h2>
        <form action="/home/release" method="POST">
          <label for="vehicle-number-release">Vehicle Number:</label>
          <input type="text" id="vehicle-number-release" name="vehicle-number-release" required>

          <button type="submit">Release Slot</button>
        </form>
      </div>
    </div>
  </body>
</html>
