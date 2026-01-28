<?php
require_once 'includes/auth.php';

$error = '';
$success = '';

if (isset($_GET['registered']) && $_GET['registered'] == 'success') {
    $success = "Uspešno ste se registrovali! Sada se možete prijaviti.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        $error = "Molimo popunite sva polja.";
    } else {
        if (loginUser($username, $password)) {
            redirect('dashboard.php');
        } else {
            $error = "Pogrešno korisničko ime ili lozinka.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava - Login Sistem</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1><i class="fas fa-sign-in-alt"></i> Prijavi se</h1>
                <p>Unesite svoje podatke za prijavu</p>
            </div>
            
            <?php if($error): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if($success): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="" class="auth-form">
                <div class="form-group">
                    <label for="username">
                        <i class="fas fa-user"></i> Korisničko ime ili Email
                    </label>
                    <input type="text" id="username" name="username" 
                           value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                           placeholder="Unesite korisničko ime ili email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Lozinka
                    </label>
                    <div class="password-input">
                        <input type="password" id="password" name="password" 
                               placeholder="Unesite lozinku" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength">
                        <small>Minimum 8 karaktera, jedno veliko slovo i broj</small>
                    </div>
                </div>
                
                <div class="form-options">
                    <label class="checkbox">
                        <input type="checkbox" name="remember">
                        <span>Zapamti me</span>
                    </label>
                    <a href="#" class="forgot-password">Zaboravili ste lozinku?</a>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-sign-in-alt"></i> Prijavi se
                </button>
                
                <div class="auth-footer">
                    <p>Nemate nalog? <a href="register.php">Registrujte se ovde</a></p>
                    <p><a href="index.php"><i class="fas fa-home"></i> Nazad na početnu</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>