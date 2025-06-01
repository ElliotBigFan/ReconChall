<?php
session_start();
$flag = "CTF{Command_Injection_Is_Dangerous}";

if (isset($_GET['debug'])) {
    highlight_file(__FILE__);
    exit;
}

$output = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['domain'])) {
    $domain = $_POST['domain'];
    $output = shell_exec("nslookup " . $domain);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>NSLOOKUP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>NSLOOKUP</h1>
    <p>Liệu có flag nào đó ở / trong server không nhỉ?</p>
    <form method="POST" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="domain" placeholder="Enter domain (e.g. google.com)" required>
            <button class="btn btn-primary" type="submit">Lookup</button>
        </div>
    </form>
    <?php if ($output): ?>
        <div class="alert alert-secondary mt-3"><pre><?php echo htmlspecialchars($output); ?></pre></div>
    <?php endif; ?>
</div>
</body>
</html>
