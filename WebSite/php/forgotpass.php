<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="forgotpasss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>Forgot Password Page</title>
</head>
<body>
    <a href="index.php" class="arrow-button">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="card">
        <p class="lock-icon"><i class="fas fa-lock"></i></p>
        <h2>Olvidaste tu contraseña?</h2>
        <p>Podemos ayudarte a cambiarla</p>
        <form method="post" action="send-password-reset.php" novalidate>
            <input type="email" name="email" id="email" placeholder="Email address" required>
            <button type="submit">Cambiar mi Contraseña</button>
        </form>
    </div>
</body>
</html>