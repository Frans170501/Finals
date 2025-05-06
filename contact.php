<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans leading-relaxed tracking-wide">

  
  <header class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-700">Healthcare Portal</h1>
      <nav class="space-x-4">
        <a href="index.php" class="hover:text-blue-600 transition">Back</a>
      </nav>
    </div>
  </header>

  <!-- Contact Section -->
  <section class="bg-white rounded-lg shadow p-8 max-w-3xl mx-auto my-12" id="contact">
    <h3 class="text-3xl font-semibold text-blue-700 mb-6 text-center">
      Contact Us
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Contact Info -->
      <div>
        <h4 class="text-xl font-semibold mb-4">Our Location</h4>
        <p class="text-gray-700 mb-2">
          123 Health St.<br>
          Wellness City, HC 45678<br>
          United States
        </p>
        <h4 class="text-xl font-semibold mb-4 mt-6">Phone & Email</h4>
        <p class="text-gray-700 mb-2">
          Phone:
          <a class="text-blue-600" href="tel:+15551234567">+1 555 123 4567</a>
        </p>
        <p class="text-gray-700">
          Email:
          <a class="text-blue-600" href="mailto:info@healthcareportal.com">info@healthcareportal.com</a>
        </p>
      </div>

      <!-- Contact Form -->
      <div>
        <h4 class="text-xl font-semibold mb-4">Send Us a Message</h4>
        <form action="submit_contact.php" method="POST" class="space-y-4" id="contact-form">
          <div>
            <label for="contactName" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" id="contactName" name="contactName" placeholder="Your name" required
                   class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
          </div>
          <div>
            <label for="contactEmail" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="contactEmail" name="contactEmail" placeholder="you@example.com" required
                   class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" />
          </div>
          <div>
            <label for="contactMessage" class="block text-gray-700 font-medium mb-2">Message</label>
            <textarea id="contactMessage" name="contactMessage" rows="4" placeholder="Write your message here" required
                      class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
          </div>
          <div class="text-center">
            <button type="submit"
                    class="bg-blue-600 text-white px-8 py-3 rounded-md font-semibold hover:bg-blue-700 transition">
              Send Message
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t mt-12 py-6 text-center text-gray-600">
    &copy; <?php echo date("Y"); ?> Healthcare Portal. All rights reserved.
  </footer>

</body>
</html>