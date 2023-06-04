<?php
$username = $_POST['username'];
$password = $_POST['password'];


if ($username == 'admin' && $password == 'admin123') {
  // Password is correct, log in the user
  echo "<script>
  alert('Login successful!');
  window.location='AdminPage.html';
  </script>";
  
} else {
  // Password is incorrect
  echo "<script>
  alert('Invalid credentials. Please try again');
  window.location='login.html';
  </script>";
}

?>