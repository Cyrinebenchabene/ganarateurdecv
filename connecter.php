<?php// Connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bd_personnel';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    throw new Exception("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Création de l'objet User
$userManager = new User($conn);

// Exemple d'utilisation pour vérifier un utilisateur
$email = 'test@example.com';
$password = 'motdepasse';

$result = $userManager->verifUser($email, $password);
if ($result) {
    echo "Utilisateur trouvé.";
} else {
    echo "Utilisateur non trouvé.";
}

// Exemple d'utilisation pour insérer un nouvel utilisateur
$newEmail = 'nouvel_utilisateur@example.com';
$newPassword = 'nouveaumotdepasse';

$userManager->insertUser($newEmail, $newPassword);

?>
