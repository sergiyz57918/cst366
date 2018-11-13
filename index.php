<!DOCTYPE html>
<html>
<!--

First Website
and comment
in html
(comments can span multiple lines)

-->

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>CST336 App Page</title>
    </head>
    <body>
    <div class='container'>
        <div class='text-center'>
            
            <!-- Bootstrap Navagation Bar -->
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>Sergiy Zarubin</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a data-toggle="collapse" href="#labs" role="button" aria-expanded="false" aria-controls="labs">Labs</a>
                        <li><a data-toggle="collapse" href="#homework" role="button" aria-expanded="false" aria-controls="homework">Home Work</a>
                    </ul>
                    <div class="collapse" id="labs">
                        <ul class='nav navbar-nav'>
                            <li><a href="/labs/lab1/index.html">Lab 1</a></li>
                            <li><a href="/labs/lab2/index.php">Lab 2</a></li>
                            <li><a href="/labs/lab3/index.php">Lab 3</a></li>
                            <li><a href="/labs/lab4/index.php">Lab 4</a></li>
                            <li><a href="/labs/lab5/index.php">Lab 5</a></li>
                            <li><a href="/labs/lab6/index.php">Lab 6</a></li>
                        </ul>
                    </div>
                    <div class="collapse" id="homework">
                        <ul class='nav navbar-nav'>
                            <li><a href="/HW/HW1/index.html">Homework 1</a></li>
                            <li><a href="/HW/HW2/index.php">Homework 2</a></li>
                            <li><a href="/HW/HW3/index.php">Homework 3</a></li>
                            <li><a href="/HW/HW4/index.php">Homework 4</a></li>
                            <li><a href="/HW/HW5/index.php">Homework 5</a></li>
                        </ul>
                    </div>

                </div>
            </nav>
            <br /> <br /> <br />
        </header>
 <main><div>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo 'Like my new toy?';
?>
</div>
</main>
    </body>
</html>