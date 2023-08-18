<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    $fname = $user["fname"];
    $lname = $user["lname"];
    $dateOfBirth = $user["dateOfBirth"];
    $university = $user["university"];
    $technology = $user["technology"];


    $universityCheckQuery = "SELECT id FROM universities WHERE name = '$university'";
    $technologyCheckQuery = "SELECT id FROM technologies WHERE name = '$technology'";
    $universityResult = $conn->query($universityCheckQuery);
    $technologyResult = $conn->query($technologyCheckQuery);

    if ($universityResult->num_rows > 0 && $technologyResult->num_rows > 0) {

        $universityRow = $universityResult->fetch_assoc();
        $technologyRow = $technologyResult->fetch_assoc();

        $universityId = $universityRow["id"];
        $technologyId = $technologyRow["id"];


        $insertQuery = "INSERT INTO cvs (fname, lname, date_of_birth, university_id, technology_id) VALUES ('$fname', '$lname', '$dateOfBirth', $universityId, $technologyId)";
        if ($conn->query($insertQuery) === TRUE) {
            $response = array("message" => "CV беше записано успешно.");
        } else {
            $response = array("message" => "Грешка при запис на CV.");
        }
    } else {
        $response = array("message" => "Университетът или технологията не съществуват.");
    }

    header("Content-Type: application/json");
    echo json_encode($response);
}
