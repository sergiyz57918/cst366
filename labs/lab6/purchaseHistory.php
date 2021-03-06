<?php
    include 'inc/functions.php';
    include 'inc/dbConnection.php';
    $conn= getDatabaseConnection("ottermart");
    
    $productId = $_GET['productId'];
    
    $sql = "SELECT * FROM om_product 
            NATURAL JOIN om_purchase
            WHERE productId= :pId";
            
    $np = array(); 
    $np[":pId"] = $productId; 
    
    
    $stmt = $conn->prepare($sql); 
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    if (count ($records)>0){
    echo $records[0]['productName'] . "<br/>";
    echo "<img src='" . $records[0]['productImage'] . "' width='200'/><br/>";

    echo "<table class='table table-bordered'>"; 
    echo "<tr><th>Purchase Date</th><th>Unit Price</th><th>Quantity</th></tr>";
            foreach ($records as $record) {
                echo "<tr>";
                echo "<td>".$record["purchaseDate"]."</td>";
                echo "<td>".$record["unitPrice"]."</td>";
                echo "<td> $".$record["quantity"]."</td>";
                echo "</tr>";
                }
    echo "</table>";
    }
?>