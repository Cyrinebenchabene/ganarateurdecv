<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CV Template 1</title>
    <link rel="stylesheet" type="text/css" href="style_cv1.css">
</head>
<body>

<?php

require('connect.php');
$row = $stmt->fetch(PDO::FETCH_ASSOC);
unction chargerClass($classname) {
    require $classname . '.php';
}

spl_autoload_register("chargerClass");
session_start();

$conn = new PDO("mysql:host=localhost;dbname=bdpersonnel", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$stmt = $conn->prepare("SELECT * FROM personne LIMIT 1");
$stmt->execute();
$donnees = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="resume">
    <div class="resume_left">
        
        <div class="resume_content">
            <div class="resume_item resume_info">
                <div class="title">
                    <p class="bold"><?php 

                    echo "name: $name "; ?></p>
                    <p class="regular"><?php echo $profession; ?></p>
                </div>
                <ul>
                    <li>
                        <div class="icon">
                            <i class="fas fa-map-signs"></i>
                        </div>
                        <div class="data">
                            <?php echo $address; ?>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="data">
                            <?php echo $phone; ?>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="data">
                           <?php echo "Email: $email <br>"; ?>
                        </div>
                    </li>
        
                </ul>
            </div>
            <div class="data">
                            <?php echo $datenais; ?>
                        </div>
            <div class="resume_item resume_skills">
                <div class="title">
                    <p class="bold">Skills</p>
                </div>
                <ul>
                    <li>
                        <div class="skill_name">
                            <?php echo $skills; ?>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="resume_item resume_experience">
                <div class="title">
                    <p class="bold">Work Experience</p>
                </div>
                <ul>
                    <li>
                        <div class="date"><?php echo $start_date; ?> - <?php echo $end_date; ?></div>
                        <div class="info">
                            <p class="semi-bold"><?php echo $company; ?></p>
                            <p><?php echo $postion; ?></p>
                            <p><?php echo $description; ?></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="resume_item resume_education">
                <div class="title">
                    <p class="bold">Education</p>
                </div>
                <ul>
                    <li>
                        <div class="date"><?php echo $start_year; ?> - <?php echo $end_year; ?></div>
                        <div class="info">
                            <p class="semi-bold"><?php echo $school; ?></p>
                            <p><?php echo $degree; ?></p>
                            <p><?php echo $field_of_study; ?></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>