<?php
    session_start();
    if(!isset($_SESSION['adminName'])){
        header("Location:login.php");
    }
    include 'inc/dbConnection.php';   
    include 'inc/functions.php';
    
    if(isset($_GET['productId']))
    {
        $productId= $_GET['productId']; 
        $product = getProductInfo($productId);
        echo "<br/><br/><br/><br/>".$product['catId'];
    }

    if(isset($_GET['updateProduct'])){
        $np = array(); 
        $np[':productId'] = $_GET['productId'];
        $np[':productName'] =$_GET['productName'] ;
        $np[':productDescription'] = $_GET['productDescription'];
        $np[':productImage'] = $_GET['productImage'];
        $np[':price'] =$_GET['price'] ;
        $np[':catId'] = $_GET['catId'];
        updateProduct($np); 
        $_SESSION['message'] = "Product has been updated"; 
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

                    <input type="hidden" class="form-control" name="productId" id="pId" value="<?php echo $_GET['productId']?>">
                    <label for="pName">Product Name</label>
                        <input type="text" class="form-control" name="productName" id="pName" value="<?php echo $product['productName']?>">
                    </div>
                    <div class="form-group">
                        <label for="pDesc">Product Description</label>
                            <textarea name="productDescription" class="form-control" id="pDesc" cols= 50 rows= 4><?php echo $product['productDescription']?></textarea>
                    </div>
                    <div class="form-group col">
                        <label for="price">Price: </label>    
                                <input type="text" class="form-control" name="price" id="price" value = "<?php echo $product['price']?>"/>
                    </div>
                    <div class="form-group col">    
                        <label for="pCategory">Category</label>
                        <select class="form-control" name="catId" id="pCategory">
                            <option>Select One</option>
                            <?php echo displayCategories($product['catId']) ?>
                        </select>
                    </div>
                    <div>
                        <label for="imageURL">Image URL</label>
                        <input type="text" name="productImage" class="form-control" value = "<?php echo $product['productImage']?>"/>
                    </div>
                </div>
                <br /><br />   
                <input type="submit" value="Update Product" name="updateProduct" class="btn btn-primary">
            </form>
            <br /><br />  
        </div>
    </div>
    </body>
</html>