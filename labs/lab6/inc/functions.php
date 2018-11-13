<?php

    function displayCategories($catId){
        
        $conn= getDatabaseConnection("ottermart");
        
        $sql = "SELECT catID,catName FROM om_category ORDER BY catName"; 
        
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $result= "";
        
        foreach ($records as $record) {
            $result.= "<option ";
            $result.= ($record["catID"]==$catId)? "Selected" : ""; 
            $result.= " value='".$record["catID"]."'>".$record["catName"]."</option>";
        }
        
        return  $result;
    }
    function displayCategoriesAll(){
        
        $conn= getDatabaseConnection("ottermart");
        
        $sql = "SELECT catID,catName FROM om_category ORDER BY catName"; 
        
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $result= "";
        
        foreach ($records as $record) {
            $result.= "<option ";
            $result.= " value='".$record["catID"]."'>".$record["catName"]."</option>";
        }
        
        return  $result;
    }
    function displaySearchResults(){
        $conn= getDatabaseConnection("ottermart");
        
        $np = array(); 
        
        if(isset($_GET['searchForm'])){
            echo "<h3>Product Found: </h3>";
            
            $sql = "SELECT * FROM om_product WHERE 1 "; 
            
            if(!empty($_GET['product'])){
                $sql.=" AND (productName LIKE :productName OR productDescription LIKE :productDesc)";
                $np[":productName"]="%".$_GET['product']."%";
                $np[":productDesc"]="%".$_GET['product']."%";
            }
            
            if(!empty($_GET['priceFrom'])){
                $sql.=" AND price >= :priceFrom";
                $np[":priceFrom"]=$_GET['priceFrom'];
            }
            
            if(!empty($_GET['priceTo'])){
                $sql.=" AND price <= :priceTo";
                $np[":priceTo"]=$_GET['priceTo'];
            }
            
            if(!empty($_GET['category']) and is_numeric($_GET['category'])){
                $sql.=" AND catId = :categoryId";
                $np[":categoryId"]=$_GET['category'];
            }
            
            if(!empty($_GET['orderBy'])){
                if($_GET['orderBy'] =="price"){ 
                        $sql.=" ORDER BY price";
                }else {
                        $sql.=" ORDER BY productName";
                }

            }
            
            $stmt = $conn->prepare($sql); 
            $stmt->execute($np);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            
            
            $result= '<table class="table table-bordered">'; 
            $result.= "<tr>";
            if(isset($_SESSION['adminName'])){
                        $result .="<th> ID </th>"; 
                    }
            $result.=  "<th>Product Name</th><th>Product Image</th><th>Product Descriuption</th><th>Product Price</th><th>Product History</th>";
            if(isset($_SESSION['adminName']))
            {
                $result .="<th>Update</th><th>Remove</th>"; 
            }
            $result .="</tr>"; 
            foreach ($records as $record) {
                $result.= "<tr>";
                if(isset($_SESSION['adminName']))
                    {
                        $result .="<td>".$record['productId']."</th>"; 
                    }
                $result.= "<td>".$record["productName"]."</td>";
                $result.= "<td><img src='".$record["productImage"]."' width ='100 px'/></td>";
                $result.= "<td>".$record["productDescription"]."</td>";
                $result.= "<td> $".$record["price"]."</td><td> ";
                if (hasHistory($record["productId"])){
                    $result.= "<a href='purchaseHistory.php?productId=".$record["productId"]."'>History</a>";
                }
                $result.= "</td>"; 
                if(isset($_SESSION['adminName']))
                    {
                        $result .="<td><a class='btn btn-primary' href='updateProduct.php?productId=".$record["productId"]."'>Update</td>";
                        
                        $result .= "<form action ='deleteProduct.php' onsubmit='return confirmDelete()'>";
                        $result .= "<input type='hidden' name='productId' value='".$record["productId"]."'/>";
                        $result .= "<td><input type='submit' class='btn btn-danger' value = 'Remove'"; 
                        $result .= "</td></form>";
                    }
                $result .="</tr>";
                }
            $result.= "</table>";
        }
    return $result;   
    }
    function hasHistory ($productId){
            $conn= getDatabaseConnection("ottermart");
    
            $sql = "SELECT * FROM om_product 
                    NATURAL JOIN om_purchase
                    WHERE productId= :pId";
                    
            $np = array(); 
            $np[":pId"] = $productId; 
            
            
            $stmt = $conn->prepare($sql); 
            $stmt->execute($np);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            if (count ($records)>0){
                return true; 
            }
            else{
                return false; 
            }
    }
    function addProduct (){
        if(isset($_GET['submitProduct'])){
            $conn= getDatabaseConnection("ottermart");
            $productName = $_GET['productName']; 
            $productDescription = $_GET['description'];
            $productImage = $_GET['productImage'];
            $productPrice = $_GET['price'];
            $catId = $_GET['catId'];
            
            $sql = "INSERT INTO om_product
                    (productName, productDescription, productImage, price, catId)
                    VALUES (:productName, :productDescription, :productImage, :price, :catId)"; 
                    
            $np = array(); 
            $np[':productName'] =$productName ;
            $np[':productDescription'] = $productDescription;
            $np[':productImage'] = $productImage;
            $np[':price'] =$productPrice ;
            $np[':catId'] = $catId;

            $stmt = $conn->prepare($sql); 
            $stmt->execute($np);
        }
    }
    
    function getProductInfo($productId){
        $conn= getDatabaseConnection("ottermart");
        
        $sql = "SELECT * FROM om_product WHERE productId = ".$productId; 

        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC); 
        
        return $record; 
    }
    
    function updateProduct($np){
        
        $conn= getDatabaseConnection("ottermart");

        $sql = "UPDATE om_product
                SET productName= :productName, 
                    productDescription = :productDescription,
                    productImage = :productImage,
                    price = :price, 
                    catId = :catId
                WHERE productId = :productId";
                
        $stmt = $conn->prepare($sql); 
        $stmt->execute($np);
    }
        
?>