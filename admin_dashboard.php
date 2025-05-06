<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

$conn = new mysqli("127.0.0.1:3307", "root", "", "healthcare_portal");

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch appointments
$appointments = $conn->query("SELECT * FROM appointments ORDER BY date ASC, time ASC");
if (!$appointments) {
    die("Error retrieving appointments: " . $conn->error);
}

// Fetch messages
$messages = $conn->query("SELECT * FROM messages ORDER BY sent_at DESC");
if (!$messages) {
    die("Error retrieving messages: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard | Healthcare Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
  <!-- Header -->
  <header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <img src="image/" alt="Logo" class="w-10 h-10">
        <h1 class="text-2xl font-semibold text-blue-700">Admin Dashboard</h1>
      </div>
      <div>
        <a href="admin_logout.php" class="text-red-600 hover:text-red-800 font-medium">Logout</a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow container mx-auto px-4 py-8">
    <section class="mb-12">
      <h2 class="text-3xl font-bold text-blue-700 mb-4">Appointments</h2>
      <div class="bg-white shadow rounded-lg p-6 overflow-x-auto">
        <table class="w-full table-auto text-left">
          <thead>
            <tr class="text-gray-700 border-b">
              <th class="pb-2">Full Name</th>
              <th class="pb-2">Date</th>
              <th class="pb-2">Time</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $appointments->fetch_assoc()): ?>
              <tr class="border-b hover:bg-gray-50">
                <td class="py-2"><?= htmlspecialchars($row['fullName']) ?></td>
                <td class="py-2"><?= htmlspecialchars($row['date']) ?></td>
                <td class="py-2"><?= htmlspecialchars($row['time']) ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </section>

    <section>
      <h2 class="text-3xl font-bold text-blue-700 mb-4">Messages</h2>
      <div class="bg-white shadow rounded-lg p-6">
        <?php if ($messages->num_rows === 0): ?>
          <p class="text-gray-500">No messages available.</p>
        <?php else: ?>
          <ul class="space-y-6">
            <?php while($row = $messages->fetch_assoc()): ?>
              <li class="border-b pb-4">
                <p><strong class="text-blue-700"><?= htmlspecialchars($row['sender_name']) ?></strong> 
                  <span class="text-sm text-gray-500">(<?= $row['sent_at'] ?>)</span>
                </p>
                <p class="text-gray-700 mb-2"><?= htmlspecialchars($row['message']) ?></p>

                <form action="send_reply.php" method="POST" class="mt-2">
                  <input type="hidden" name="message_id" value="<?= $row['id'] ?>">
                  <textarea name="reply_message" rows="2" required
                    class="w-full p-2 border rounded mb-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                    placeholder="Write your reply..."></textarea>
                  <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">
                    Send Reply
                  </button>
                </form>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200 py-6">
    <div class="container mx-auto px-4 text-center text-gray-600 text-sm">
      © 2024 Healthcare Portal Admin. All rights reserved.
    </div>
  </footer>
</body>
</html>
