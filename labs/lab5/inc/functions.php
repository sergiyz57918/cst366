<?php

    function displayCategories(){
        
        $conn= getDatabaseConnection("ottermart");
        
        $sql = "SELECT catID,catName FROM om_category ORDER BY catName"; 
        
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $result= "";
        
        foreach ($records as $record) {
            $result.= "<option value='".$record["catID"]."'>".$record["catName"]."</option>";
        }
        
        return  $result;
    }
    function displaySearchResults(){
        $conn= getDatabaseConnection("ottermart");
        
        if(isset($_GET['searchForm'])){
            echo "<h3>Product Found: </h3>";
            
            $sql = "SELECT * FROM om_product WHERE 1 "; 
            
            if(!empty($_GET['product'])){
                $sql.=" AND (productName LIKE :productName OR productDescription LIKE :productDesc)";
                $namedParametrs[":productName"]="%".$_GET['product']."%";
                $namedParametrs[":productDesc"]="%".$_GET['product']."%";
            }
            
            if(!empty($_GET['priceFrom'])){
                $sql.=" AND price >= :priceFrom";
                $namedParametrs[":priceFrom"]=$_GET['priceFrom'];
            }
            
            if(!empty($_GET['priceTo'])){
                $sql.=" AND price <= :priceTo";
                $namedParametrs[":priceTo"]=$_GET['priceTo'];
            }
            
            if(!empty($_GET['category']) and is_numeric($_GET['category'])){
                $sql.=" AND catId = :categoryId";
                $namedParametrs[":categoryId"]=$_GET['category'];
            }
            
            if(!empty($_GET['orderBy'])){
                if($_GET['orderBy'] =="price"){ 
                        $sql.=" ORDER BY price";
                }else {
                        $sql.=" ORDER BY productName";
                }

            }
            
            $stmt = $conn->prepare($sql); 
            $stmt->execute($namedParametrs);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            
            
            $result= '<table class="table table-bordered">'; 
            $result.= "<tr><th>Product Name</th><th>Product Image</th><th>Product Descriuption</th><th>Product Price</th><th>Product History</th></tr>";
            foreach ($records as $record) {
                $result.= "<tr>";
                $result.= "<td>".$record["productName"]."</td>";
                $result.= "<td><img src='".$record["productImage"]."' width ='100 px'/></td>";
                $result.= "<td>".$record["productDescription"]."</td>";
                $result.= "<td> $".$record["price"]."</td><td> ";
                if (hasHistory($record["productId"])){
                $result.= "<a href='purchaseHistory.php?productId=".$record["productId"]."'>History</a>";
                }
                $result.= "</td></tr>";
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
?>