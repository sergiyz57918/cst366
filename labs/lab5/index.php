<?php
    include 'inc/functions.php';
    include 'inc/dbConnection.php';
    $categories = displayCategories($conn);
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
                        <a class='navbar-brand' href='#'>OtterMart Product Search</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
            
            <!-- Search Form -->
            <form>
                <div class="form-group">
                    <br /><br />    
                    <label for="pName">Product Name</label>
                        <input type="text" class="form-control" name="product" id="pName" placeholder="Name">
                    <label for="priceFrom">Price From: </label>
                        <input type="text" class="form-control" name="priceFrom" id="priceFrom" size="7"/>
                    <label for="priceTo">To:</label>
                        <input type="text" class="form-control" name="priceTo" id="priceTo" size="7"/>
                    
                    <span>Order result by:</span>
                        <label for="oPrice">Price</label>
                            <input type="radio" class="form-control" name="orderBy" value="price" id="oPrice"/>
                        <label for="oName">Price</label>
                            <input type="radio" class="form-control" name="orderBy" value="name" id="oName"/>
                    <label for="pCategory">Category</label>
                        <select class="form-control" name="category" id="pCategory ">
                            <option>Select One</option>
                            <?php echo $categories; ?>
                        </select>
                </div>
                <input type="submit" value="Search" name="searchForm" class="btn btn-default">

            <span>Somthing</span>

            </form>
                <br /><br />            

        </div>
            <!-- Display Search Results -->
            <?php echo displaySearchResults($conn); ?>
    </div>
    </body>
</html>