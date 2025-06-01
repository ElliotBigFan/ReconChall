<?php
$arjun_flag = "CTF{Parameter_Discovery_Is_Key}";

if(isset($_GET['debug'])) {
    echo "<!-- Flag: $arjun_flag -->";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Arjun Tool Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Arjun Tool Example</h1>
        <p>This page demonstrates the usage of Arjun tool for parameter discovery.</p>
        
        <div class="row">
            <div class="col-md-8">
                <h2>About Arjun</h2>
                <p>Arjun is a tool for discovering hidden parameters in web applications.</p>
                <pre>
                Usage: arjun -u https://example.com
                </pre>
            </div>
        </div>
    </div>
</body>
</html>
