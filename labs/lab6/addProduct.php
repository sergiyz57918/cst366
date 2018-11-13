<?php
    session_start();
    if(!isset($_SESSION['adminName'])){
        header("Location:login.php");
    }
    include 'inc/dbConnection.php';   
    include 'inc/functions.php';
    $categories = displayCategories($conn);
    
    if(isset($_GET['submitProduct'])){
        addProduct(); 
        $_SESSION['message'] = "Product has been added"; 
        header("Location:admin.php");
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>OtterMart Product Admin</title>
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
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
            
            <!-- Search Form -->
            <form>
                <div class="form-row">
                    <br /><br /> 
                    <div class="form-group">
                    <label for="pName">Product Name</label>
                        <input type="text" class="form-control" name="productName" id="pName" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="pDesc">Product Description</label>
                            <textarea name="description" class="form-control" id="pDesc" cols= 50 rows= 4></textarea>
                    </div>
                    <div class="form-group col">
                        <label for="price">Price: </label>    
                                <input type="text" class="form-control" name="price" id="price" placeholder="Be generous "/>
                    </div>
                    <div class="form-group col">    
                        <label for="pCategory">Category</label>
                        <select class="form-control" name="catId" id="pCategory ">
                            <option>Select One</option>
                            <?php echo $categories; ?>
                        </select>
                    </div>
                    <div>
                        <label for="imageURL">Image URL</label>
                        <input type="text" name="productImage" class="form-control"/>
                    </div>
                </div>
                <br /><br />   
                <input type="submit" value="Add Product" name="submitProduct" class="btn btn-primary">
            </form>
            <br /><br />  
        </div>
    </div>
    </body>
</html>