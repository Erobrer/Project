<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST["username"] ?? "");
  $email    = trim($_POST["email"] ?? "");
  $password = trim($_POST["password"] ?? "");

  if ($username && $email && $password) {
    $line = $username . "," . $email . "," . $password . "\n";

    $file = fopen("users.txt", "a");
    if ($file) {
      fwrite($file, $line);
      fclose($file);
      echo "<h3 style='color:lime; text-align:center;'>Kayıt başarılı. <a href='giris.html'>Giriş yap</a></h3>";
    } else {
      echo "<h3 style='color:red; text-align:center;'>users.txt dosyasına yazılamıyor.</h3>";
    }

  } else {
    echo "<h3 style='color:red; text-align:center;'>Tüm alanlar doldurulmalı.</h3>";
  }
} else {
  echo "<h3 style='color:red; text-align:center;'>Geçersiz istek türü.</h3>";
}
?>
