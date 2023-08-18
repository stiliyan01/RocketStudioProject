<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="mainDiv">

        <h1>Създаване на CV</h1>


        <form action="" method="POST" class="cvForm">

            <input type="text" id="fname" placeholder="Име..."><br><br>

            <input type="text" id="lname" placeholder="Презиме..."><br><br>

            <input type="text" id="lname" placeholder="Фамилия..."><br><br>

            <label for="date">Дата на Раждане</label>
            <input type="date" id="dateOfBirth"><br><br>
            <select name="university" id="university">
                <option value="" disabled selected hidden>Изберете университет</option>
                <option value="tuVarna">Технически университет - Варна</option>
                <option value="Vins">Икономически университет – Варна</option>
                <option value="svobodniq">Варненски свободен университет</option>
                <option value="vvmu">Висше военноморско училище</option>
            </select>
            <button type="button" class="openPopup uniButton" data-target="uniPopup">
                <img src="./img/pen.png" width="15" height="15">
            </button>

            <div id="uniPopup" class="popup">
                <div class="popup-content">
                    <span class="close" data-target="uniPopup">&times;</span>
                    <form action="universityFormHandler.php" method="post">
                        <input type="text" id="universityName" placeholder="Име на университет...">
                        <input type="text" id="universityGrade" placeholder="Акредитационна оценка...">
                        <button type="submit" id="universitySubmit">Запиши</button>
                    </form>
                </div>
            </div>

            <br><br>

            <select name="technology" id="technology" class="technology">
                <option value="" disabled selected hidden>Изберете технология</option>
                <option value="php">PHP</option>
                <option value="js">JavaScript</option>
                <option value="java">Java</option>
                <option value="go">Go</option>
                <option value="mysql">MySQL</option>
                <option value="python">Python</option>
                <option value="cpp">C++</option>
                <option value="laravel">Laravel</option>
                <option value="django">Django</option>
                <option value="spring">Spring</option>
            </select>
            <button type="button" class="openPopup technologyButton" data-target="techPopup">
                <img src="./img/pen.png" width="15" height="15">
            </button>

            <div id="techPopup" class="popup">
                <div class="popup-content">
                    <span class="close" data-target="techPopup">&times;</span>
                    <form action="technologyFormHandler.php" method="post">
                        <input type="text" id="technologyInput" placeholder="Име на технологията...">
                        <button type="submit" class="technologySubmit">Запиши</button>
                    </form>
                </div>
            </div>
            <br><br>
            <input type="submit" id="submitButton" value="Запис на СV">


        </form><br><br>
        <a href="showAllCv.php">Преглед на всички CV-та</a>
    </div>

    <script src="popUps.js"></script>
    <script src="savingCV1.js"></script>
    <script src="addingNewUniversity.js"></script>
    <script src="addingNewTechnology.js"></script>

</body>

</html>