<?php
session_start();

// Define routes and corresponding handlers for admin user
$admin_routes = [
    '/' => 'admin.php',
    '/users' => 'listuser.php',
    '/admin' => 'admin.php'
];

// Define routes and corresponding handlers for regular user
$user_routes = [
    '/' => 'user-home.php',
    '/profile' => 'user-profile.php',
    '/messages' => 'user-messages.php'
];

// Match the path to a route and execute the corresponding handler based on user role
if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
    if ($role === 'admin') {
        $routes = $admin_routes;
    } else {
        $routes = $user_routes;
    }

    $request_uri = $_SERVER['REQUEST_URI'];
    $script_name = $_SERVER['SCRIPT_NAME'];

    // Extract the path from the request URI
    $path = substr($request_uri, strlen($script_name));

    // Remove query string from the path
    $path = strtok($path, '?');

    if (isset($routes[$path])) {
        $handler = $routes[$path];
        include($handler);
    } else {
        // Handle 404 error
    }
} else {
    // Redirect to login page
    header('Location: login.php');
    exit;
}
?>
