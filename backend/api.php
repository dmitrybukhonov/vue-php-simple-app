<?php

require_once 'helpers/function.php';
require_once 'config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

try {
    $databaseConfig = $config['db'];
    $pdo = new PDO(
        $databaseConfig['dsn'],
        $databaseConfig['username'],
        $databaseConfig['password'],
        $databaseConfig['options']
    );
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['firstName'], $data['lastName'], $data['email'])) {
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $email = $data['email'];

    if ($firstName === 'Nikita') {
        returnErrorMessage('Registration for Nikitas is not allowed');
    }

    $checkExistingEmail = $pdo->prepare("SELECT COUNT(*) as count FROM users WHERE email = ?");
    $checkExistingEmail->execute([$email]);
    $result = $checkExistingEmail->fetchColumn();

    if ($result > 0) {
        returnErrorMessage('User with this email already exists');
    } else {
        try {
            $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$firstName, $lastName, $email]);

            returnSuccessMessage('Registration successful');
        } catch (PDOException $e) {
            returnErrorMessage('Error registering user');
        }
    }
} else {
    returnErrorMessage('Incomplete data');
}
