<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
<body id="LoginForm">
<div class="container">
    <div class="login-form">
        <h1>Login</h1>
        <h2>Credentials required before submiting form.</h2>
        <p>You can log in using usernames <strong>user_1</strong> or <strong>user_2</strong>. The password is <strong>s3cr3t</strong>.</p>
        
        <!--Form to enter credentials-->
        
            <div class="login-form">
                <div class="main-div">
                        <form method="POST" action="verifyUser.php">
                    
                            <div class="form-group">
                    
                    
                                <input type="text" class="form-control" name="username" id="uName" placeholder="User Name">
                    
                            </div>
                    
                            <div class="form-group">
                    
                                <input type="password" class="form-control" name="password" id="uPass" placeholder="Password">
                    
                            </div>
                            <button type="submit" alue="Log-in" name="searchForm" class="btn btn-primary">Login</button>
                    
                        </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>