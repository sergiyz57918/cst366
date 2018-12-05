<?php
    session_start();
    include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>OtterMart Product Search</title>
    </head>
    <body>
    <div class='container'>
        <div class='text-center'>
            
            <!-- Bootstrap Navagation Bar -->
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>OtterMart Product Admin</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href = 'logout.php'>Log Out</a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
            
            <!-- Search Form -->
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                   <h2>Admin Login</h2>
                   <p>Please enter your email and password</p>
                   </div>
                    <form method="POST" action="loginProcess.php">
                
                        <div class="form-group">
                
                
                            <input type="text" class="form-control" name="username" id="uName" placeholder="User Name">
                
                        </div>
                
                        <div class="form-group">
                
                            <input type="password" class="form-control" name="password" id="uPass" placeholder="Password">
                
                        </div>
                        <button type="submit" alue="Log-in" name="searchForm" class="btn btn-primary">Login</button>
                
                    </form>
                        <?php
                             if ($_SESSION['incorrect']){
                                 echo "<p class='lead' id='error' style='color:red'>"; 
                                 echo "<strong>Incorrect Username or Password!</strong></p>";
                             }
                            ?>
                    </div>
            </div>
        </div>
    </div>
    </body>
</html>