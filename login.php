<?php
session_start();

// Include the database connection file
include('config.php');

// Initialize error message variable
$error_message = '';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } else {
        // Prepare SQL query to check user credentials
        $query = "SELECT id, full_name, password FROM users WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        if ($user) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Store user session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['full_name'] = $user['full_name'];

                // Redirect to profile page or dashboard
                header('Location: profile.php');
                exit();
            } else {
                $error_message = 'Incorrect password.';
            }
        } else {
            $error_message = 'No account found with that email address.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Healthcare Portal - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #e0f2fe;
    }
  </style>
</head>

<body class="min-h-screen flex flex-col">
  <!-- Header -->
  <header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <img alt="Healthcare Portal Logo, blue cross with heart symbol" class="w-12 h-12" height="48"
          src="https://storage.googleapis.com/a1aa/image/7fd09601-3de7-4482-e2c8-ee34fd609f55.jpg" width="48" />
        <h1 class="text-2xl font-semibold text-blue-700">
          Healthcare Portal
        </h1>
      </div>
      <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
        <a class="hover:text-blue-600 transition" href="index.php">Home</a>
        <a class="hover:text-blue-600 transition" href="#services">Services</a>
        <a class="hover:text-blue-600 transition" href="#doctors">Doctors</a>
        <a class="hover:text-blue-600 transition" href="#appointments">Appointments</a>
        <a class="hover:text-blue-600 transition" href="#contact">Contact</a>
      </nav>
      <button aria-label="Toggle menu" class="md:hidden text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
        id="mobile-menu-button">
        <i class="fas fa-bars fa-lg"></i>
      </button>
    </div>
    <nav class="hidden md:hidden bg-white border-t border-gray-200" id="mobile-menu">
      <a class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition" href="index.php">Home</a>
      <a class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition" href="#services">Services</a>
      <a class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition" href="#doctors">Doctors</a>
      <a class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition" href="#appointments">Appointments</a>
      <a class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition" href="#contact">Contact</a>
    </nav>
  </header>

  <!-- Main Login Form -->
  <main class="flex-grow container mx-auto px-4 py-12 flex justify-center items-center">
    <div class="relative max-w-md w-full bg-white rounded-3xl shadow-2xl p-10 overflow-hidden">
      <div class="absolute -top-20 -right-20 w-52 h-52 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob">
      </div>
      <div class="absolute -bottom-20 -left-20 w-52 h-52 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000">
      </div>
      <div class="relative z-10">
        <div class="flex justify-center mb-8">
          <img alt="Blue medical cross symbol with a heart in the center, representing healthcare and compassion"
            class="w-20 h-20" height="80" src="https://storage.googleapis.com/a1aa/image/e043d878-8c2d-4788-7db7-fab768d7569f.jpg" width="80" />
        </div>
        <h2 class="text-4xl font-extrabold text-blue-700 mb-6 text-center tracking-wide">
          Welcome Back
        </h2>
        <p class="text-center text-gray-600 mb-8">
          Sign in to access your healthcare dashboard and manage your appointments.
        </p>

        <!-- Display error message if login fails -->
        <?php if ($error_message): ?>
          <div class="text-red-600 text-center mb-6">
            <p><?php echo htmlspecialchars($error_message); ?></p>
          </div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="space-y-6" novalidate>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2" for="email">
              Email address
            </label>
            <div class="relative">
              <input autocomplete="email" class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" id="email" name="email" placeholder="you@example.com" required type="email" />
              <span class="absolute inset-y-0 right-4 flex items-center text-blue-600">
                <i class="fas fa-envelope"></i>
              </span>
            </div>
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2" for="password">
              Password
            </label>
            <div class="relative">
              <input autocomplete="current-password" class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" id="password" name="password" placeholder="Enter your password" required type="password" />
              <span class="absolute inset-y-0 right-4 flex items-center text-blue-600 cursor-pointer" id="togglePassword" title="Show/Hide Password">
                <i class="fas fa-eye"></i>
              </span>
            </div>
          </div>

          <div class="flex justify-center">
            <label class="inline-flex items-center text-sm text-gray-700">
              <input class="form-checkbox h-5 w-5 text-blue-600 rounded" id="remember_me" name="remember_me" type="checkbox" />
              <span class="ml-2 select-none">Remember me</span>
            </label>
          </div>

          <button class="w-full py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl shadow-lg hover:from-blue-700 hover:to-indigo-700 transition" type="submit">
            Sign In
          </button>
        </form>

        <p class="mt-8 text-center text-gray-600 text-sm">
          Don't have an account?
          <a class="font-semibold text-blue-600 hover:text-blue-500 transition" href="signup.php">
            Sign up
          </a>
        </p>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200 py-6 mt-auto">
    <div class="container mx-auto px-4 text-center text-gray-600 text-sm select-none">
      © 2024 Healthcare Portal. All rights reserved.
    </div>
  </footer>

  <script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    togglePassword.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      togglePassword.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    });
  </script>

</body>

</html>
