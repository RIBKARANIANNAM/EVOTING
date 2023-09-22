c:\Users\S556462\Downloads\Evoting (2) (2)\Evoting\p3.jpgc:\Users\S556462\Downloads\Evoting (2) (2)\Evoting\p3.jpg<?php
include 'db_conn.php';
// Retrieve form data
$studentid = $_POST['studentid'];
$password = $_POST['password'];

// Prepare and execute the SQL query
$sql = "SELECT * FROM users WHERE studentid = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$studentid]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if a user with the provided student ID exists
if (!$user) {
  echo "<script>
  alert('Invalid student ID or password. Please try again.');
  window.location='login.html';
  </script>";
} else {
  // Verify the password
  $hashedPassword = $user['password'];
  if (password_verify($password, $hashedPassword)) {
    // Password is correct, log in the user
    echo "<script>
    alert('Login successful! Welcome, " . $user['firstname'] . " " . $user['lastname'] . "!');
    window.location='home.html';
    </script>";
  } else {
    // Password is incorrect
    echo "<script>
    alert('Invalid student ID or password. Please try again');
    window.location='index.html';
    </script>";
  }
}

?>