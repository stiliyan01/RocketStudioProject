<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = file_get_contents("php://input");
    $technologyData = json_decode($data, true);

    $technologyName = $technologyData["technology"];


    $checkQuery = "SELECT id FROM technologies WHERE name = '$technologyName'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {

        $response = array("message" => "Технологията вече съществува.");
    } else {

        $insertQuery = "INSERT INTO technologies (name) VALUES ('$technologyName')";
        if ($conn->query($insertQuery) === TRUE) {
            $response = array("message" => "Технологията беше записана успешно.");
        } else {
            $response = array("message" => "Грешка при запис на технологията.");
        }
    }

    header("Content-Type: application/json");
    echo json_encode($response);
}
