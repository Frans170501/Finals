<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Healthcare Portal
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-gray-50 min-h-screen flex flex-col">
  <!-- Header -->
  <header class="bg-white shadow">
   <div class="container mx-auto px-4 py-4 flex items-center justify-between">
    <div class="flex items-center space-x-3">
     <img alt="Healthcare Portal Logo, blue cross with heart symbol" class="w-12 h-12" height="48" img src="image/" width="48"/>
     <h1 class="text-2xl font-semibold text-blue-700">
      Healthcare Portal
     </h1>
    </div>
    <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
     <a class="hover:text-blue-600 transition" href="services.php">
      Services
     </a>
     <a class="hover:text-blue-600 transition" href="doctors.php">
      Doctors
     </a>
     <a class="hover:text-blue-600 transition" href="appointment.php">
  Appointments
     </a>
     <a class="hover:text-blue-600 transition" href="contact.php">
      Contact
     </a>
     <a class="hover:text-blue-600 transition" href="profile.php">Profile</a>
    </nav>
    <button aria-label="Toggle menu" class="md:hidden text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600" id="mobile-menu-button">
     <i class="fas fa-bars fa-lg">
     </i>
    </button>
   </div>
   <nav class="hidden md:hidden bg-white border-t border-gray-200" id="mobile-menu">
    <a class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition" href="#services">
     Services
    </a>
    <a class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition" href="#doctors">
     Doctors
    </a>
    <a class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition" href="#appointments">
     Appointments
    </a>
    <a class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition" href="#contact">
  Contact
    </a>
   </nav>
  </header>
  <main class="flex-grow container mx-auto px-4 py-8">
   <!-- Hero Section -->
   <section class="flex flex-col md:flex-row items-center bg-white rounded-lg shadow p-6 md:p-12 mb-12" id="home">
    <div class="md:w-1/2 mb-8 md:mb-0">
     <h2 class="text-4xl font-extrabold text-blue-700 mb-4">
      Your Health, Our Priority
     </h2>
     <p class="text-gray-700 mb-6">
      Access top healthcare services, book appointments with expert doctors,
          and manage your health all in one place.
     </p>
     <a class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-700 transition" href="appointment.php">
  Book an Appointment
</a>
    </div>
    <div class="md:w-1/2 flex justify-center">
     <img alt="image" class="rounded-lg shadow-lg" height="300" src="" width="400"/>
    </div>
   </section>
   
  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200 py-6">
   <div class="container mx-auto px-4 text-center text-gray-600 text-sm">
    © 2024 Healthcare Portal. All rights reserved.
   </div>
  </footer>
  <script>
   const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
 </body>
</html>