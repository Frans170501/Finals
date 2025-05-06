<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book an Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans leading-relaxed tracking-wide">

  <!-- NavBar -->
  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-700">Healthcare Portal</h1>
      <nav class="space-x-4">
        <a href="index.php" class="hover:text-blue-600 transition">Back</a>
        
      </nav>
    </div>
  </header>

 <!-- doctor section -->
  <section class="mt-12 mb-12" id="doctors"> 
    <h3 class="text-3xl font-semibold text-blue-700 mb-8 text-center">
      Meet Our Doctors
    </h3>
    <div class="grid grid-cols-1 gap-8"> 
      <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center text-center">
        <img alt="Portrait" class="rounded-full mb-4 w-36 h-36 object-cover" height="150" src="" width="150"/>
        <h4 class="text-xl font-semibold mb-1">
          Dr. Alexa
        </h4>
        <p class="text-blue-600 font-medium mb-2">
          Cardiologist
        </p>
        <p class="text-gray-600">
          Expert in heart health and cardiovascular diseases with 15 years of
          experience.
        </p>
      </div>
      <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center text-center">
        <img alt="Portrait" class="rounded-full mb-4 w-36 h-36 object-cover" height="150" src="" width="150"/>
        <h4 class="text-xl font-semibold mb-1">
          Dr. Thea
        </h4>
        <p class="text-blue-600 font-medium mb-2">
          Pediatrician
        </p>
        <p class="text-gray-600">
          Caring for children’s health and wellness with a gentle approach.
        </p>
      </div>
      <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center text-center">
        <img alt="Portrait" class="rounded-full mb-4 w-36 h-36 object-cover" height="150" src="" width="150"/>
        <h4 class="text-xl font-semibold mb-1">
          Dr. Renelyn
        </h4>
        <p class="text-blue-600 font-medium mb-2">
          Dermatologist
        </p>
        <p class="text-gray-600">
          Specialist in skin care and treatment of skin conditions.
        </p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t py-4 text-center text-gray-600">
    &copy; <?php echo date("Y"); ?> Healthcare Portal. All rights reserved.
  </footer>

</body>
</html>
