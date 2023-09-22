<?php
include 'db_conn.php';
// Retrieve form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$studentid = $_POST['studentid'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

// Validate form data (you can add more validation if needed)
if (empty($firstname) || empty($lastname) || empty($studentid) || empty($phonenumber) || empty($password) || empty($confirmpassword)) {
  echo "<script>
  alert('Please fill in all the required fields.');
  window.location = 'register.html';
</script>";
} elseif ($password !== $confirmpassword) {
  echo "<script>
  alert('Passwords do not match. Please try again.');
  window.location = 'register.html';
</script>";
} else {
  // Hash the password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //123456

  // Prepare and execute the SQL query
  $sql = "INSERT INTO users (firstname, lastname, studentid, phonenumber, password) VALUES (?, ?, ?, ?, ?)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$firstname, $lastname, $studentid, $phonenumber, $hashedPassword]);

  // Registration successful
  echo "<script>
    alert('Registration Successful!');
    window.location = 'login.html';
  </script>";

}
?>