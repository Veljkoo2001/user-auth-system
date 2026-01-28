<?php
require_once 'includes/auth.php';

// Ako korisnik nije ulogovan, preusmeri na login
if (!isLoggedIn()) {
    redirect('login.php');
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Login Sistem</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-lock"></i> Dashboard</h2>
            </div>
            
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h3><?php echo htmlspecialchars($username); ?></h3>
                <p><?php echo htmlspecialchars($email); ?></p>
            </div>
            
            <nav class="sidebar-nav">
                <a href="#" class="nav-item active">
                    <i class="fas fa-tachometer-alt"></i> Početna
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-user"></i> Profil
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-cog"></i> Podešavanja
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-history"></i> Istorija
                </a>
                <a href="logout.php" class="nav-item logout">
                    <i class="fas fa-sign-out-alt"></i> Odjavi se
                </a>
            </nav>
        </aside>
        
        <main class="main-content">
            <header class="main-header">
                <div class="header-left">
                    <h1>Dobrodošli, <?php echo htmlspecialchars($username); ?>!</h1>
                    <p>Ovo je vaša kontrolna tabla</p>
                </div>
                <div class="header-right">
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fas fa-home"></i> Početna
                    </a>
                </div>
            </header>
            
            <div class="stats-cards">
                <div class="stat-card">
                    <div class="stat-icon" style="background: #4CAF50;">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-info">
                        <h3>28</h3>
                        <p>Aktivnih dana</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background: #2196F3;">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="stat-info">
                        <h3>100%</h3>
                        <p>Sigurnost naloga</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background: #FF9800;">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="stat-info">
                        <h3>156</h3>
                        <p>Ukupno korisnika</p>
                    </div>
                </div>
            </div>
            
            <div class="dashboard-content">
                <div class="content-card">
                    <h2><i class="fas fa-user-circle"></i> Vaš profil</h2>
                    <div class="profile-info">
                        <div class="info-row">
                            <span class="info-label">Korisničko ime:</span>
                            <span class="info-value"><?php echo htmlspecialchars($username); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Email adresa:</span>
                            <span class="info-value"><?php echo htmlspecialchars($email); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Član od:</span>
                            <span class="info-value"><?php echo date('d.m.Y'); ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Status naloga:</span>
                            <span class="info-value status-active">
                                <i class="fas fa-check-circle"></i> Aktivan
                            </span>
                        </div>
                    </div>
                    <button class="btn btn-primary">
                        <i class="fas fa-edit"></i> Izmeni profil
                    </button>
                </div>
                
                <div class="content-card">
                    <h2><i class="fas fa-bell"></i> Nedavne aktivnosti</h2>
                    <div class="activities">
                        <div class="activity">
                            <i class="fas fa-sign-in-alt activity-icon"></i>
                            <div class="activity-content">
                                <p>Uspešna prijava na sistem</p>
                                <small>Danas u <?php echo date('H:i'); ?></small>
                            </div>
                        </div>
                        <div class="activity">
                            <i class="fas fa-user-edit activity-icon"></i>
                            <div class="activity-content">
                                <p>Profil je ažuriran</p>
                                <small>Pre 2 dana</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>