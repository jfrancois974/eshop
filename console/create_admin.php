<?php

require_once(__DIR__ . '/../bootstrap.php');

// echo '<pre>';
// var_dump($argc, $argv);
// echo '</pre>';
$pdo = pdo();
$query = $pdo->prepare('INSERT INTO admins (name, password) VALUES (?,?)');
$query->execute([$argv[1], password_hash($argv[2], PASSWORD_DEFAULT)]);

echo "Utilisateur crée !\n";