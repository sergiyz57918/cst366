<?php
session_start();

function displayQuiz(){
    //displays Quiz if session is active
    if(isset($_SESSION['username'])){
        include 'quiz.php';
    } else {
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <title>CSUMB Online Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <!--Display user and logout button-->
        <div class="user-menu">
            <?php echo "Welcome ".$_SESSION['username']."! ";?> 
            <input type="button" id="logoutBtn" value="Logout" />    
        </div>
        
        <div class="content-wrapper">
            <!--Display Quiz Content-->
            <div id="quiz">
                <h1>Quiz</h1>
                <?=displayQuiz()?>
                
                <div id="feedback">
                    <h2>You final score is <span id="score"> score </span> </h2>
                    
                    You've taken this quiz <strong id="times"></strong> time(s). <br /><br />
                    
                    Your average score was <strong id="average"></strong>
                </div>
            </div>
            <div id="mascot">
                <img src="img/mascot.png" alt="CSUMB Mascot" width="350" />
            </div>
        </div>
        
        <!--Javascript files-->

       <script type="text/javascript" src="js/gradeQuiz.js"></script>    
    </body>
</html>