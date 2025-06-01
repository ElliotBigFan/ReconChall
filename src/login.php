<?php
session_start();
require_once 'config/database.php';

$message = '';
$flag = '';
$image = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (!empty($username) && !empty($password)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND is_admin = 0");
            $stmt->execute([$username, $password]);
            
            if ($stmt->rowCount() > 0) {
                $_SESSION['user'] = $username;
                if ($username === 'elliot') {
                    $flag = "CTF{Weak_Passwords_Are_Easy_To_Crack}";
                    $image = "images/elliot.jpg";
                } else {
                    $message = "Welcome, " . htmlspecialchars($username) . "!";
                }
            } else {
                $message = "Invalid username or password!";
            }
        } catch(PDOException $e) {
            $message = "Login failed: " . $e->getMessage();
        }
    } else {
        $message = "Please fill in all fields!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - CTF Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($message): ?>
                            <div class="alert alert-info"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <?php if ($flag): ?>
                            <div class="alert alert-success">
                                <strong>Flag:</strong> <?php echo $flag; ?>
                            </div>
                            <?php if ($image): ?>
                                <div class="text-center">
                                    <img src="<?php echo $image; ?>" alt="elliot" class="img-fluid" style="max-width:200px;">
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="register.php">Don't have an account? Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
