<?php
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem - Početna</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="logo">
                <i class="fas fa-lock"></i> SecureLogin
            </div>
            <div class="nav-links">
                <?php if(isLoggedIn()): ?>
                    <a href="dashboard.php" class="nav-link"><i class="fas fa-user"></i> Dashboard</a>
                    <a href="logout.php" class="nav-link btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <?php else: ?>
                    <a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Prijavi se</a>
                    <a href="register.php" class="nav-link btn-register"><i class="fas fa-user-plus"></i> Registruj se</a>
                <?php endif; ?>
            </div>
        </nav>

        <div class="hero">
            <div class="hero-content">
                <h1><i class="fas fa-shield-alt"></i> Dobrodošli u Login Sistem</h1>
                <p class="subtitle">Bezbedan i moderan sistem za autentikaciju korisnika</p>
                
                <?php if(isLoggedIn()): ?>
                    <div class="welcome-box">
                        <h2>Zdravo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
                        <p>Uspešno ste prijavljeni na sistem.</p>
                        <div class="cta-buttons">
                            <a href="dashboard.php" class="btn btn-primary">
                                <i class="fas fa-tachometer-alt"></i> Idite na Dashboard
                            </a>
                            <a href="logout.php" class="btn btn-secondary">
                                <i class="fas fa-sign-out-alt"></i> Odjavi se
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-user-shield"></i>
                            <h3>Bezbednost</h3>
                            <p>Hashovane šifre i zaštita od SQL injection</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-bolt"></i>
                            <h3>Brzo</h3>
                            <p>Optimizovan za brzo učitavanje</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-mobile-alt"></i>
                            <h3>Responsive</h3>
                            <p>Prilagođeno svim uređajima</p>
                        </div>
                    </div>
                    
                    <div class="cta-section">
                        <h2>Pridružite nam se danas!</h2>
                        <div class="cta-buttons">
                            <a href="register.php" class="btn btn-primary btn-large">
                                <i class="fas fa-user-plus"></i> Kreirajte nalog
                            </a>
                            <a href="login.php" class="btn btn-secondary btn-large">
                                <i class="fas fa-sign-in-alt"></i> Prijavite se
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <footer>
            <p>&copy; <?php echo date('Y'); ?> Login Sistem. Sva prava zadržana.</p>
            <p class="tech-info">
                <i class="fas fa-code"></i> Napravljeno sa PHP, HTML & CSS
            </p>
        </footer>
    </div>
</body>
</html>