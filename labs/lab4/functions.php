<?php
session_start(); 
function displayCart(){
    if(isset($_SESSION['cart'])){
        echo "<table class='table'>";
        foreach( $_SESSION['cart'] as $item){
            $itemName = $item['name']; 
            $itemPrice = $item['price']; 
            $itemImage = $item['image']; 
            $itemId = $item['id']; 

            echo "<tr>";
            echo "<td><img src='$itemImage /></td>";
            echo "<td><h4>$itemName</h4></td>";
            echo "<td><h4>$itemPrice</h4></td>";
            echo "<form method='post'>";
            echo "<input type='hidden' name = 'removeId' value='$itemId'>";
            echo "<td><button class='btn btn-danger'>Remove</button></td>";
            echo "</form>";
                echo "</tr>";
        }
        echo "</table>";
    }
}


function displayResults($items){

    if(isset($items)){
        echo "<table class='table'>"; 
        foreach ($items as $item){
        $itemName = $item['name']; 
        $itemPrice = $item['salePrice'];
        $itemImage = $item['thumbnailImage'];
        $itemID = $item['itemId']; 
        
        //display item as table row
        echo "<tr>";
        echo "<td><img src='$itemImage'></td>";
        echo "<td><h4>$itemName</h4></td>";
        echo "<td><h4>$itemPrice</h4></td>";
        
        //Hidden input element containing the item name
        echo "<form method='post'>";
        echo "<input type='hidden' name = 'itemName' value='$itemName'>";
        echo "<input type='hidden' name = 'itemId' value='$itemId'>";
        echo "<input type='hidden' name = 'itemImage' value='$itemImage'>";
        echo "<input type='hidden' name = 'itemPrice' value='$itemPrice'>";        
        echo "<td><button class='btn btn-warning'>ADD</button></td>";
        echo "</form>";
        echo "</tr>";
        }
        echo "</tr>";
    }
} 
?>