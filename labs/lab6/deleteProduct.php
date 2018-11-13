    <?php
        session_start();
        if(!isset($_SESSION['adminName'])){
            header("Location:login.php");
        }
        include 'inc/dbConnection.php'; 
        
        $conn= getDatabaseConnection("ottermart");
        $productID = $_GET['productId'];
        

        $sql= "DELETE FROM om_product WHERE productId = ".$productID; 
        
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        
        $_SESSION['message'] = "Product has been deleted"; 
        header("Location: admin.php");
    ?>