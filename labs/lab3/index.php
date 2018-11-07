<?php
$backgroundImage = "img/sea.jpg";

if(isset($_GET['keyword'])){
    include 'api/pixabayAPI.php';
    $keyword=$_GET['keyword']; 
    $category=$_GET['category']; 
    $layout = $_GET['layout'];
    if (isset($category)){
            $imageURLs = getImageURLs($category,$layout);
    }
    else {
    $imageURLs = getImageURLs($keyword,$layout);
        
    }
    $backgroundImage = $imageURLs[array_rand($imageURLs)];
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Image Carusel</title>
        <meta charset="utf-8">
          <style>
                @import url ("css/styles.css");
                body {
                        background-image:url('<?=$backgroundImage?>');
                    }
          </style> 
          <link rel="stylesheet" type="text/css" href="css/styles.css">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
    </head>
    <body>
        
        </div>
                <br/>
                <br/>
                <div>
                <form>
                    <input type="text" name="keyword" placeholder = "Keyword" value="<?=$_GET['keyword']?>"/>
                    <input  type="radio" id="lhorizontal" name="layout" value = "horizontal"/>
                    <label for="lhorizontal">Horizontal</label>
                    <input  type="radio" id="lvertical" name="layout" value = "vertical"/>
                    <label for="lvertical">Vertical</label>
                    <select name = "category">
                        <option value="">Select One</option>
                        <option value = "ocean">Sea</option>
                        <option value = "forest">Forest</option>
                        <option value = "mountain">Mountain</option>
                        <option value = "snow">Snow</option>
                    </select>
                    <input type="submit" value="Search"/>
                </form>
        </div>
        
        <?php
        if(!isset($imageURLs)){
            echo "<h2>Type a keyword to dislay a slideshow<br/>
            With random images from Pixabay.com</h2>";
        } else {
            ?>
            <div id = "carousel-example-generic" class = "carousel slide"     data-ride = "carousel">
                <ol class="carousel-indicators">
                    <?php
                        for($i=0;$i<7;$i++){
                            echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                            echo ($i==0)?"class='active'":""; 
                            echo "></li>";
                        }
                    ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php
                        for($i=0; $i<7; $i++){
                            do{
                                $randomIndex=rand(0,count($imageURLs)); 
                            } 
                            while(!isset($imageURLs[$randomIndex]));
                            
                            echo '<div class = "carousel-item '; 
                            echo ($i==0)?"active":"";
                            echo '">'; 
                            echo '<img src="'.$imageURLs[$randomIndex].'"/></div>';
                            unset ($imageURLs[$randomIndex]);
                            
                        }
                    ?>
                    
                </div>
                    <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a><?php 
        } //end else
            ?>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            
    </body>
</html>