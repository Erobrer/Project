<?php
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

$users = file("users.txt", FILE_IGNORE_NEW_LINES);
$authenticated = false;
$username = '';

foreach ($users as $user) {
  list($storedUsername, $storedEmail, $storedPass) = explode(",", $user);

  if ($storedEmail === $email && $storedPass === $password) {
    $authenticated = true;
    $username = $storedUsername;
    break;
  }
}

if ($authenticated) {
  echo json_encode([
    "status" => "success",
    "username" => $username,
    "email" => $email
  ]);
} else {
  echo json_encode(["status" => "error"]);
}
?>
