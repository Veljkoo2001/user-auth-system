<?php
require_once 'includes/auth.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validacija
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Molimo popunite sva polja.";
    } elseif (!validateEmail($email)) {
        $error = "Molimo unesite validnu email adresu.";
    } elseif (!validatePassword($password)) {
        $error = "Lozinka mora imati minimum 8 karaktera, bar jedno veliko slovo i broj.";
    } elseif ($password !== $confirm_password) {
        $error = "Lozinke se ne poklapaju.";
    } else {
        // Registracija korisnika
        if (registerUser($username, $email, $password)) {
            redirect('login.php?registered=success');
        } else {
            $error = "Korisničko ime ili email već postoje.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija - Login Sistem</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1><i class="fas fa-user-plus"></i> Kreirajte nalog</h1>
                <p>Popunite formu za registraciju</p>
            </div>
            
            <?php if($error): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="" class="auth-form">
                <div class="form-group">
                    <label for="username">
                        <i class="fas fa-user"></i> Korisničko ime
                    </label>
                    <input type="text" id="username" name="username" 
                           value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                           placeholder="Unesite korisničko ime" required>
                </div>
                
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Email adresa
                    </label>
                    <input type="email" id="email" name="email" 
                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                           placeholder="Unesite email adresu" required>
                </div>
                
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Lozinka
                    </label>
                    <div class="password-input">
                        <input type="password" id="password" name="password" 
                               placeholder="Unesite lozinku" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength">
                        <small>Minimum 8 karaktera, jedno veliko slovo i broj</small>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">
                        <i class="fas fa-lock"></i> Potvrdite lozinku
                    </label>
                    <div class="password-input">
                        <input type="password" id="confirm_password" name="confirm_password" 
                               placeholder="Ponovite lozinku" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('confirm_password')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="form-options">
                    <label class="checkbox">
                        <input type="checkbox" name="terms" required>
                        <span>Slažem se sa <a href="#">uslovima korišćenja</a></span>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-user-plus"></i> Registruj se
                </button>
                
                <div class="auth-footer">
                    <p>Već imate nalog? <a href="login.php">Prijavite se ovde</a></p>
                    <p><a href="index.php"><i class="fas fa-home"></i> Nazad na početnu</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = passwordInput.parentNode.querySelector('.toggle-password i');
            
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
        
        // Provera jačine lozinke
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strength = checkPasswordStrength(password);
            updateStrengthIndicator(strength);
        });
        
        function checkPasswordStrength(password) {
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            return strength;
        }
        
        function updateStrengthIndicator(strength) {
            const indicator = document.querySelector('.password-strength');
            const messages = [
                'Veoma slaba',
                'Slaba',
                'Prilična',
                'Dobra',
                'Jaka'
            ];
            
            if (strength < messages.length) {
                indicator.innerHTML = `<small>Jačina lozinke: <strong>${messages[strength]}</strong></small>`;
            }
        }
    </script>
</body>
</html>