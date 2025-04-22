<?php
session_start();

// Check if user is logged in
$is_logged_in = isset($_SESSION['usuario_id']);

// Temporarily disabled login protection
/*
// If not logged in and not trying to login, redirect to login page
if (!$is_logged_in && !strpos($_SERVER['REQUEST_URI'], 'login')) {
    header('Location: /login/view/LoginView.php');
    exit;
}

// If logged in and trying to access login page, redirect to users page
if ($is_logged_in && strpos($_SERVER['REQUEST_URI'], 'login')) {
    header('Location: /usuarios/view/UsuarioView.php');
    exit;
}

// If accessing root, redirect to appropriate page
if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index.php') {
    if ($is_logged_in) {
        header('Location: /usuarios/view/UsuarioView.php');
    } else {
        header('Location: /login/view/LoginView.php');
    }
    exit;
} 
*/ 