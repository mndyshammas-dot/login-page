<?php
// auth.php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $action = $_POST['action'] ?? '';
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        die("Please fill all fields.");
    }

    if ($action === 'register') {
        // Registration Logic
        try {
            // Check if user exists
            $stmt = $db->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if ($stmt->fetch()) {
                echo "<script>alert('Email already registered!'); window.location.href='index.html';</script>";
            } else {
                // Insert new user
                // WARNING: Storing password as plain text as requested
                $stmt = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                
                if ($stmt->execute()) {
                    echo "<script>alert('Registration successful! Please login.'); window.location.href='index.html';</script>";
                } else {
                    echo "Error registering user.";
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    } elseif ($action === 'login') {
        // Login Logic
        try {
            $stmt = $db->prepare("SELECT id, email, password FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && $password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                echo "<script>alert('Login successful! Welcome " . $user['email'] . "'); window.location.href='index.html';</script>";
            } else {
                echo "<script>alert('Invalid email or password!'); window.location.href='index.html';</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid action.";
    }
}
?>
