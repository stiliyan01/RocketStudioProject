<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = file_get_contents("php://input");
    $universityData = json_decode($data, true);

    $universityName = $universityData["name"];
    $universityGrade = $universityData["grade"];

    $checkQuery = "SELECT id FROM universities WHERE name = '$universityName'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {

        $response = array("message" => "Университетът вече съществува.");
    } else {

        $insertQuery = "INSERT INTO universities (name, grade) VALUES ('$universityName', '$universityGrade')";
        if ($conn->query($insertQuery) === TRUE) {
            $response = array("message" => "Университетът беше записан успешно.");
        } else {
            $response = array("message" => "Грешка при запис на университета.");
        }
    }

    header("Content-Type: application/json");

    echo json_encode($response);
}
