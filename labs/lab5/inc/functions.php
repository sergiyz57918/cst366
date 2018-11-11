<?php

    function displayCategories($conn){
          
        
        $sql = "SELECT catID,catName FROM om_category ORDER BY catName"; 
        
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach ($records as $record) {
            echo "<option value='".$record["catId"].">".$record["catName"]."</option>";
        }
        
    } 
    function displaySearchResults($conn){
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
            
            echo "<table>"; 
            echo "<tr><th>Product Name</th><th>Product Descriuption</th><th>Product Price</th><th>History</th></tr>";
            foreach ($records as $record) {
                echo "<tr>";
                echo "<td>".$record["productName"]."</td>";
                echo "<td>".$record["productDescription"]."</td>";
                echo "<td> $".$record["price"]."</td>";
                echo "<td> <a href=\"purchaseHistory.php?productId=".$record["productId"]."\" History</a></td>";
                echo "</tr>";
                }
            echo "</table>";
        }
        
    }
?>