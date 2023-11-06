<?php

require 'form.html';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $city = $_POST["city"];

    
    if (empty($name) || empty($email) || empty($gender) || empty($city)) {
        
        echo "All fields are required. Please fill out the form completely.";
        header("Location: form.html");
        exit;
    }

    
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=user_information_db", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    
    $stmt = $pdo->prepare("INSERT INTO user_information (name, email, gender, city) VALUES (:name, :email, :gender, :city)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':city', $city);
    $stmt->execute();

    
    header("Location: list_users.php");
}
