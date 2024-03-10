<?php
require('connect.php');

function chargerClass($classname) {
    require $classname . '.php';
}

spl_autoload_register("chargerClass");

session_start();
$conn = new PDO("mysql:host=localhost;dbname=bd_personnel", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

if (isset($_POST['cree'])) {
    $personne = new Personne(
        $_POST['name'],
        $_POST['profession'],
        $_POST['address'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['datenais'],
        $_POST['skills'],
        $_POST['company'],
        $_POST['postion'],
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['description'],
        $_POST['school'],
        $_POST['degree'],
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['field_of_study']
    ); }  ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Générateur de CV</title>
   <link rel="stylesheet" href="css1.css">
</head>
<body>
  <div class="top-nav">
    <div class="wrapper">
        <nav>
            <ul>
                <li>
                    <a href="menu.html">Accueil</a>
                </li>
                <li>
                    <a href="form.php">Formulaire</a>
                </li>
                <li>
                    <a href="#">CV</a>
                    <ul class="submenu">
                      
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<form action="cv1.php" method="POSR" id="cv-form">
    <div class="form-section">
      <h2>Informations de base</h2>
      <div class="form-row">
        <label for="name">Nom*:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-row">
        <label for="phone">Profession*:</label>
        <input type="text" id="profession" name="profession" required>
      </div>
      <div class="form-row">
        <label for="address">Adresse*:</label>
        <input type="text" id="address" name="address" required>
      </div>
      <div class="form-row">
        <label for="phone">Téléphone*:</label>
        <input type="text" id="phone" name="phone" required>
      </div>
      <div class="form-row">
        <label for="email">Email*:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-row">
        <label for="start-date">Date de Naissance*:</label>
        <input type="date" id="datenais" name="datenais" required>
      </div>
    </div>
    <div class="form-section">
      <h2>Compétences</h2>
      <div class="form-row">
        <label for="skills">Entrez vos compétences*:</label>
        <input type="text" id="skills" name="skills" required>
      </div>
    </div>
    <div class="form-section">
      <h2>Expérience de travail</h2>
      <div id="work-experience">
        <div class="form-row">
          <label for="company">Nom de l'entreprise*:</label>
          <input type="text" id="company" name="company" required>
        </div>
        <div class="form-row">
          <label for="position">Poste occupé*:</label>
          <input type="text" id="position" name="position" required>
        </div>
        <div class="form-row">
          <label for="start-date">Date de début*:</label>
          <input type="date" id="start-date" name="start-date" required>
        </div>
        <div class="form-row">
          <label for="end-date">Date de fin*:</label>
          <input type="date" id="end-date" name="end-date" required>
        </div>
        <div class="form-row">
          <label for="description">Description des tâches*:</label>
          <textarea id="description" name="description" required></textarea>
        </div>
      </div>
      
    </div>
    <div class="form-section">
      <h2>Formation</h2>
      <div id="education">
        <div class="form-row">
          <label for="school">Nom de l'école*:</label>
          <input type="text" id="school" name="school" required>
        </div>
        <div class="form-row">
          <label for="degree">Diplôme obtenu*:</label>
          <input type="text" id="degree" name="degree" required>
        </div>
        <div class="form-row">
          <label for="start-year">Année de début*:</label>
          <input type="text" id="start-year" name="start-year" required>
        </div>
        <div class="form-row">
          <label for="end-year">Année de fin*:</label>
          <input type="text" id="end-year" name="end-year" required>
        </div>
        <div class="form-row">
          <label for="field-of-study">Domaine d'étude*:</label>
          <input type="text" id="field-of-study" name="field-of-study" required>
        </div>
      </div>
      
    </div>
    <button type="submit" id="submit-button">Générer mon CV</button>
  </form>
</body>
</html>
