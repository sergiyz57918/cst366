<?php
    session_start();
    include 'inc/dbConnection.php';
    $conn= getDatabaseConnection("ottermart");
    $username = $_POST['username']; 
    $password = sha1($_POST['password']); 
    //echo $username;
    //echo $password; 
    //die;
    $sql = "SELECT * FROM om_admin
    WHERE username = :username
    AND password =:password";
    
    $np = array(); 
    $np[":username"] = $username ;
    $np[":password"] = $password;
    
    $stmt = $conn->prepare($sql); 
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); 
  
    if(empty($record)){
        $_SESSION['incorrect'] = true; 
        header("Location:login.php");
    }  else {
        $_SESSION['incorrect'] = false;
        $_SESSION['adminName'] = $record['firstName']." ".$record['lastName'];
        header("Location:admin.php");
    }
    
    
?>