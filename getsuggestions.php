<?php

$parola = $_GET['parola'];
$host = "sql11.freesqldatabase.com";
$dbname = "sql11679901";
$username = "sql11679901";
$password = "11uPPzEjLw";
$pdo = new PDO("mysql:dbname={$dbname};host={$host}", $username, $password);
$stm = $pdo->prepare("SELECT * FROM parole WHERE parola LIKE :parola");
$stm->bindValue(':parola', $parola . '%', PDO::PARAM_STR);
if (!$stm->execute()) {
    throw new Exception("Impossibile eseguire la query");
}
$results = $stm->fetchAll(PDO::FETCH_COLUMN, 1);
echo json_encode($results);
header('Content-Type: application/json');