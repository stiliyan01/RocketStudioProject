<?php
include("connection.php");

$query = "SELECT candidates.*, universities.name AS university_name, technologies.name AS technology_name
          FROM candidates
          LEFT JOIN candidate_university ON candidates.id = candidate_university.candidate_id
          LEFT JOIN universities ON candidate_university.university_id = universities.id
          LEFT JOIN candidate_technology ON candidates.id = candidate_technology.candidate_id
          LEFT JOIN technologies ON candidate_technology.technology_id = technologies.id";

$result = $conn->query($query);
$cvs = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cvs[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Всички CV-та</title>
    <style>
        /* Стилове за картите */
        .cv-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .cv-card h2 {
            margin-top: 0;
        }

        .cv-card p {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <h1>Всички CV-та</h1>
    <div class="cv-container">
        <?php foreach ($cvs as $cv) { ?>
            <div class="cv-card">
                <h2><?= $cv['fname'] ?> <?= $cv['lname'] ?></h2>
                <p>Дата на раждане: <?= $cv['date_of_birth'] ?></p>
                <p>Университет: <?= $cv['university_name'] ?></p>
                <p>Технология: <?= $cv['technology_name'] ?></p>
            </div>

        <?php  }
        $conn->close(); ?>
    </div>
    <br><br><br>
    <a href="index.php">Създаване на нов CV</a>
</body>

</html>