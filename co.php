<?php
$testPassword = '123';
$hashedPassword = password_hash($testPassword, PASSWORD_DEFAULT);
echo "Hash de '123': " . htmlspecialchars($hashedPassword) . "<br>";
?>
