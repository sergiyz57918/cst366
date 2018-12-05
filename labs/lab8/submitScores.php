<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$score=$_POST['score'];

$sql = "INSERT INTO scores (username, score)
        VALUES (:username, :score)";

$stmt = $connect->prepare($sql);
$stmt->execute(array(":username" => $_SESSION['username'],":score" => $score));


$sql = "SELECT count(1) times, avg(score) average
        FROM scores
        WHERE username = :username";
$stmt = $connect->prepare($sql);
$stmt->execute(array(":username"=>$_SESSION['username']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);
?>