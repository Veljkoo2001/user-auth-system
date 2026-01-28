<?php
echo "<h2>Test konekcije sa bazom</h2>";

try {
    $host = 'localhost';
    $dbname = 'login_system';
    $username = 'root';
    $password = '';
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green;'>✅ Konekcija uspješna!</p>";
    
    // Testiraj da li tabela postoji
    $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() > 0) {
        echo "<p style='color: green;'>✅ Tabela 'users' postoji!</p>";
    } else {
        echo "<p style='color: orange;'>⚠️ Tabela 'users' ne postoji!</p>";
    }
    
} catch(PDOException $e) {
    echo "<p style='color: red;'>❌ Greška: " . $e->getMessage() . "</p>";
    echo "<p>Proveri:</p>";
    echo "<ul>";
    echo "<li>Da li je MySQL pokrenut?</li>";
    echo "<li>Da li baza 'login_system' postoji?</li>";
    echo "<li>Da li su kredencijali tačni?</li>";
    echo "</ul>";
}
?>