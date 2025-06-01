<?php
session_start();
$debug_flag = "CTF{Debug_Mode_Is_Not_For_Production}";

if (isset($_GET['debug'])) {
    highlight_file(__FILE__);
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CTF Challenge - Configuration & Deployment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/icon.webp" alt="Logo" style="height:32px; margin-right:8px;">
                CTF Challenge
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="login.php">Login</a>
                <a class="nav-link" href="register.php">Register</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Welcome to CTF Challenge</h1>
        <p>This is a challenge about insecure configuration and deployment.</p>
        <div class="row">
            <div class="col-md-6">
                <h2>About the Challenge</h2>
                <p>Find and exploit various security vulnerabilities in this web application.</p>
            </div>
            <div class="col-md-6">
                <h2>Getting Started</h2>
                <p>Start by exploring the application and looking for hidden endpoints.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
