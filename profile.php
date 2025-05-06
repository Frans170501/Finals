<?php
session_start();

include('config.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

// Fetch the user details from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user exists
if (!$user) {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>User Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-b from-blue-50 to-white min-h-screen flex flex-col">
  <header class="bg-white shadow-md p-4 sticky top-0 z-30">
   <div class="container mx-auto flex items-center justify-between">
    <h1 class="text-2xl font-semibold text-blue-700 flex items-center gap-2">
     <i class="fas fa-user-circle text-blue-600 text-3xl"></i>
     User Profile
    </h1>
    <a class="text-blue-600 hover:text-blue-800 font-medium transition flex items-center gap-1" href="index.php">
     <i class="fas fa-home"></i>
     Back to Home
    </a>
   </div>
  </header>
  <main class="container mx-auto px-4 py-12 flex-grow">
   <div class="bg-white shadow-lg rounded-xl p-8 max-w-3xl mx-auto border border-blue-100">
    <div class="flex flex-col md:flex-row md:items-center md:gap-8">
     <div class="flex-shrink-0 mb-6 md:mb-0">
      <img alt="User avatar placeholder image" class="rounded-full border-4 border-blue-600 w-36 h-36 object-cover" height="150" loading="lazy" src="https://storage.googleapis.com/a1aa/image/a61b2690-6e34-4417-55ce-157e7a885345.jpg" width="150"/>
     </div>
     <div>
      <h2 class="text-3xl font-semibold text-blue-700 mb-2 break-words max-w-xs md:max-w-none">
       Welcome, <?php echo htmlspecialchars($user['full_name']); ?>
      </h2>
      <p class="text-gray-600 text-sm md:text-base max-w-xs md:max-w-none">
       Here is your profile information. You can update your details anytime.
      </p>
     </div>
    </div>
    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-8 text-gray-700">
  <div class="flex items-center gap-3">
    <i class="fas fa-envelope text-blue-600 text-xl w-6"></i>
    <div>
      <p class="font-semibold text-blue-700">Email</p>
      <p class="break-words"><?php echo htmlspecialchars($user['email']); ?></p>
    </div>
  </div>
  <div class="flex items-center gap-3">
    <i class="fas fa-phone-alt text-blue-600 text-xl w-6"></i>
    <div>
      <p class="font-semibold text-blue-700">Phone</p>
      <p class="break-words"><?php echo htmlspecialchars($user['phone']); ?></p>
    </div>
  </div>
  <div class="flex items-start gap-3 sm:col-span-2">
    <i class="fas fa-map-marker-alt text-blue-600 text-xl w-6 mt-1"></i>
    <div>
      <p class="font-semibold text-blue-700">Address</p>
      <p class="break-words"><?php echo htmlspecialchars($user['address']); ?></p>
    </div>
  </div>

  <!-- Birthday -->
  <div class="flex items-center gap-3">
    <i class="fas fa-birthday-cake text-blue-600 text-xl w-6"></i>
    <div>
      <p class="font-semibold text-blue-700">Birthday</p>
      <p class="break-words"><?php echo htmlspecialchars(date('F j, Y', strtotime($user['birthday']))); ?></p>
    </div>
  </div>

   <!-- Age -->
   <div class="flex items-center gap-3">
    <i class="fas fa-user-clock text-blue-600 text-xl w-6"></i>
    <div>
      <p class="font-semibold text-blue-700">Age</p>
      <p class="break-words">
        <?php 
        
          // Calculate age 
          if (!empty($user['birthday'])) {
              $birthDate = new DateTime($user['birthday']);
              $today = new DateTime('today');
              $age = $birthDate->diff($today)->y;
              echo $age . " years old";
          } else {
              echo "Not provided";
          }
        ?>
      </p>
    </div>
  </div>

</div>
    <div class="mt-12 flex flex-col sm:flex-row sm:justify-center gap-4">
     <a class="bg-blue-600 text-white px-8 py-3 rounded-md font-semibold hover:bg-blue-700 transition flex items-center justify-center gap-2" href="edit_profile.php">
      <i class="fas fa-edit"></i>
      Edit Profile
     </a>
     <form action="/logout" class="inline-block" method="POST">
      <button class="bg-red-600 text-white px-8 py-3 rounded-md font-semibold hover:bg-red-700 transition flex items-center justify-center gap-2 w-full sm:w-auto" type="submit">
       <i class="fas fa-sign-out-alt"></i>
       Log Out
      </button>
     </form>
    </div>
   </div>
  </main>
  <footer class="bg-white border-t border-blue-100 py-6 mt-auto">
   <div class="container mx-auto text-center text-gray-500 text-sm select-none">
    © <?php echo date('Y'); ?> Your Company. All rights reserved.
   </div>
  </footer>
</body>
</html>
