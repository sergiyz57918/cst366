<?php

    function displayCategories(){
        
        $conn= getDatabaseConnection("ottermart");
        
        $sql = "SELECT catID,catName FROM om_category ORDER BY catName"; 
        
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        $result= "";
        
        foreach ($records as $record) {
            $result.= "<option value='".$record["catId"].">".$record["catName"]."</option>";
        }
        
        return  $result;
    }
    function displaySearchResults(){
        $conn= getDatabaseConnection("ottermart");
        /*
        if(isset($_GET['searchForm'])){
            echo "<h3>Product Found: </h3>";
            
            $sql = "SELECT * FROM om_product WHERE 1"; 
            
            if(!empty($_GET['product'])){
                $sql.="AND (productName LIKE :productName OR productDescription LIKE :productName)";
                $namedParametrs[":productName"]="%".$_GET['product']."%";
            }
            
            if(!empty($_GET['priceFrom'])){
                $sql.="AND price >= :priceFrom";
                $namedParametrs[":priceFrom"]="%".$_GET['priceFrom']."%";
            }
            
            if(!empty($_GET['priceTo'])){
                $sql.="AND price <= :priceTo";
                $namedParametrs[":priceTo"]="%".$_GET['priceTo']."%";
            }
            
            if(!empty($_GET['orderBy'])){
                switch($_GET['orderBy']){
                    case "price": 
                        $sql.=" ORDER BY price";
                    case "name": 
                        $sql.=" ORDER BY productName";
                }

            }
            
            $stmt = $conn->prepare($sql); 
            $stmt->execute($namedParametrs);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            
            
            $result= "<table>"; 
            $result.= "<tr><th>Product Name</th><th>Product Descriuption</th><th>Product Price</th><th>History</th></tr>";
            foreach ($records as $record) {
                $result.= "<tr>";
                $result.= "<td>".$record["productName"]."</td>";
                $result.= "<td>".$record["productDescription"]."</td>";
                $result.= "<td> $".$record["price"]."</td>";
                $result.= "<td> <a href=\"purchaseHistory.php?productId=".$record["productId"]."\" History</a></td>";
                $result.= "</tr>";
                }
            $result.= "</table>";
        }
    return $result;  */   
    }
?>