<!-- appointment.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book an Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans leading-relaxed tracking-wide">

  <!-- Navbar-->
  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-700">Healthcare Portal</h1>
      <nav class="space-x-4">
        <a href="index.php" class="hover:text-blue-600 transition">Back</a>
       
      </nav>
    </div>
  </header>

  <!-- Appointment Booking Section -->
  <section class="bg-white rounded-lg shadow p-8 max-w-3xl mx-auto my-12">
    <h3 class="text-3xl font-semibold text-blue-700 mb-6 text-center">
      Book an Appointment
    </h3>
    <form action="submit_appointment.php" method="POST" class="space-y-6" id="appointment-form">
      <div>
        <label for="fullName" class="block text-gray-700 font-medium mb-2">Full Name</label>
        <input type="text" id="fullName" name="fullName" placeholder="John Smith" required
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>
      <div>
        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
        <input type="email" id="email" name="email" placeholder="john@example.com" required
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>
      <div>
        <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="+1 555 123 4567" required
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>
      <div>
        <label for="doctor" class="block text-gray-700 font-medium mb-2">Select Doctor</label>
        <select id="doctor" name="doctor" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
          <option disabled selected value="">Select a doctor</option>
          <option value="Dr. Alexa - Cardiologist">Dr. Alexa - Cardiologist</option>
          <option value="Dr. Thea - Pediatrician">Dr. Thea - Pediatrician</option>
          <option value="Dr. Renelyn - Dermatologist">Dr. Renelyn - Dermatologist</option>
        </select>
      </div>
      <div>
        <label for="date" class="block text-gray-700 font-medium mb-2">Preferred Date</label>
        <input type="date" id="date" name="date" required
               min="<?php echo date('Y-m-d'); ?>"
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>
      <div>
        <label for="time" class="block text-gray-700 font-medium mb-2">Preferred Time</label>
        <input type="time" id="time" name="time" required
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>
      <div>
        <label for="message" class="block text-gray-700 font-medium mb-2">Additional Notes</label>
        <textarea id="message" name="message" rows="3" placeholder="Any specific concerns or requests"
                  class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
      </div>
      <div class="text-center">
        <button type="submit"
                class="bg-blue-600 text-white px-8 py-3 rounded-md font-semibold hover:bg-blue-700 transition">
          Submit Appointment
        </button>
      </div>
    </form>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t mt-12 py-6 text-center text-gray-600">
    &copy; <?php echo date("Y"); ?> Healthcare Portal. All rights reserved.
  </footer>

</body>
</html>
