<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CV template 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require('connect.php');

try {
    $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('SELECT * FROM personne LIMIT 1');
    $stmt->execute();
    
    // Récupération des données de la base de données
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
   
    
} catch(PDOException $e) {
    echo "Échec de la requête : " . $e->getMessage();
}
?>

<div id="page">
    <div class="photo-and-name">
        <img src="profile.png" class="photo" alt="Profile Picture">
        <div class="contact-info-box">
            <h1 class="name"><?php echo $name; ?></h1>
            <br>
            <h3 class="job-title"><?php echo $profession; ?></h3>
            <p class="contact-details">Phone: <?php echo $phone; ?> &nbsp; - &nbsp; Email: <?php echo $email; ?></p>
        </div>
    </div>
    <div id="objective">
        <h3>Objective</h3>
        <p>
            <?php echo $objective; ?>
        </p>
    </div>
    <div id="skills">
        <h3>Skills</h3>
        <p>
            <?php echo $skills; ?>
        </p>
    </div>
    <div id="education">
        <h3>Education</h3>
        <table>
            <tr class="school-1">
                <td rowspan="2"><?php echo $debut; ?> - <?php echo $fin; ?></td>
                <td><b><?php echo $etude; ?></b>: <?php echo $diplome; ?></td>
            </tr>
        </table>
    </div>
    <div id="work">
        <h3>Experience</h3>
        <table>
            <tr class="work-1">
                <td><?php echo $datedeb; ?> - <?php echo $datefin; ?></td>
                <td><b><?php echo $NE; ?></b>: <?php echo $poste; ?></td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>

    
