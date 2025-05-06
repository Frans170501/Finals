<?php
include('config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $age = (int)$_POST['age'];
    $address = htmlspecialchars(trim($_POST['address']));
    $birthday = $_POST['birthday'];
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];  // Collect password
    $phone = htmlspecialchars(trim($_POST['phone']));  // Collect phone number

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query to insert user data into the database
    $sql = "INSERT INTO users (full_name, age, address, birthday, email, password, phone) 
            VALUES (:full_name, :age, :address, :birthday, :email, :password, :phone)";
    
    // Prepare the statement
    $stmt = $pdo->prepare($sql);
    
    // Bind the parameters
    $stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);  // Bind hashed password
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);  // Bind phone number
    
    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to login page or display success message
        header('Location: index.php?signup=success');
        exit();
    } else {
        // Error handling if insertion fails
        echo "Error: Could not register the user.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up - Healthcare Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #e0f2fe;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center">
  <div class="bg-white p-10 rounded-3xl shadow-xl max-w-md w-full">
    <h2 class="text-3xl font-extrabold text-blue-700 text-center mb-6">Create Your Account</h2>
    <form action="signup.php" method="POST" class="space-y-6">
      <div>
        <label for="full_name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
        <input type="text" id="full_name" name="full_name" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600"/>
      </div>
      <div>
        <label for="age" class="block text-sm font-semibold text-gray-700 mb-2">Age</label>
        <input type="number" id="age" name="age" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600" min="1" />
      </div>
      <div>
        <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
        <input type="text" id="address" name="address" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600"/>
      </div>
      <div>
        <label for="birthday" class="block text-sm font-semibold text-gray-700 mb-2">Birthday</label>
        <input type="date" id="birthday" name="birthday" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600"/>
      </div>
      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
        <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600"/>
      </div>
      <div>
        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
        <input type="tel" id="phone" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600" pattern="[0-9]{10}" title="Phone number must be 10 digits"/>
      </div>
      <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
        <input type="password" id="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-600 focus:border-blue-600"/>
      </div>
      <button type="submit" class="w-full py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl shadow-lg hover:from-blue-700 hover:to-indigo-700 transition">
        Sign Up
      </button>
    </form>
    <p class="mt-6 text-center text-gray-600 text-sm">
      Already have an account?
      <a href="index.php" class="font-semibold text-blue-600 hover:text-blue-500">Sign in</a>
    </p>
  </div>
</body>
</html>
