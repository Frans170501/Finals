<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book an Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans leading-relaxed tracking-wide">

  <!-- Navbar -->
  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-700">Healthcare Portal</h1>
      <nav class="space-x-4">
        <a href="index.php" class="hover:text-blue-600 transition">Back</a>
       
      </nav>
    </div>
  </header>

  <!-- Services Section -->
  <section class="mb-12 mt-8" id="services">
    <h3 class="text-3xl font-semibold text-blue-700 mb-8 text-center">
      Our Services
    </h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">
      <!-- General Checkup and Radiology -->
      <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center text-center">
        <i class="fas fa-stethoscope fa-3x text-blue-600 mb-4"></i>
        <h4 class="text-xl font-semibold mb-2 text-black-700">General Checkup</h4>
        <p class="text-gray-600">
          Comprehensive health checkups to keep you in optimal condition.
        </p>
      </div>
      <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center text-center">
        <i class="fas fa-x-ray fa-3x text-blue-600 mb-4"></i>
        <h4 class="text-xl font-semibold mb-2 text-black-700">Radiology</h4>
        <p class="text-gray-600">
          Advanced imaging services including X-rays, MRI, and CT scans.
        </p>
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mt-8">
      <!-- Pharmacy and Emergency Care -->
      <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center text-center">
        <i class="fas fa-pills fa-3x text-blue-600 mb-4"></i>
        <h4 class="text-xl font-semibold mb-2 text-black-700">Pharmacy</h4>
        <p class="text-gray-600">
          Wide range of medicines and health products available on-site.
        </p>
      </div>
      <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center text-center">
        <i class="fas fa-ambulance fa-3x text-blue-600 mb-4"></i>
        <h4 class="text-xl font-semibold mb-2 text-black-700">Emergency Care</h4>
        <p class="text-gray-600">
          24/7 emergency services with expert medical staff on call.
        </p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t mt-12 py-6 text-center text-gray-600">
    &copy; <?php echo date("Y"); ?> Healthcare Portal. All rights reserved.
  </footer>

</body>
</html>
