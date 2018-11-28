<?php
session_start();

$message = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat erat non lectus finibus, eget pulvinar nibh placerat. Aliquam erat volutpat. Pellentesque lacinia porta risus vel iaculis. Morbi id porta erat. Cras suscipit, lacus eget sollicitudin dapibus, tellus nulla laoreet massa, sed fringilla metus elit nec lorem. Sed finibus faucibus nibh et imperdiet. Suspendisse ac ante id turpis cursus fringilla. Aenean tempus tristique enim ut pharetra. Nullam vel aliquet arcu, sed sagittis purus. Suspendisse potenti. Pellentesque vitae elit sagittis, pellentesque orci ac, gravida mauris. Cras viverra nibh vitae condimentum mollis. Morbi in lorem in diam vulputate congue eget quis mauris. Praesent accumsan finibus nisl, quis varius nibh. Pellentesque vulputate quis eros vitae tempus."; 
$cipherAlphabet = "yhkqgvxfoluapwmtzecjdbsnri";
$key = "cipher"; 
if(isset($_POST['cipher'])){
    include 'inc/functions.php'; 
    $cipher = $_POST['cipher']; 
    if($cipher=="sub" ){
        if(isset($_POST['cipherAlphabet']) and strlen($_POST['cipherAlphabet'])==26){
            $isOK = subEncipher($message,$_POST['cipherAlphabet'],$cipherText);
       
        }else {
                  $cipherText = "ERROR You need to enter scrambled alphabet of exact 26 leters no repeats";
                  $isError = true;
            }
    } else if ($cipher=="shift"){
            if(isset($_POST['shiftby']) and is_numeric($_POST['shiftby'])){
                $shiftBy=$_POST['shiftby']; 
                $cipherText = shiftEncipher($message,$_POST['shiftby']);
            }else {
                  $cipherText = "ERROR You need to enter number from 1 to 26";
                  $isError = true;
            }
        } else if ($cipher=="vigenere"){
            if(isset($_POST['keyStr']) and strlen($_POST['keyStr'])>0){
                $keyStr = $_POST['keyStr'];
                $cipherText = vigenereEncipher($message,$_POST['keyStr']);
            } else{
              $cipherText = "ERROR You need to enter a key for the cipher"; 
              $isError = true; 
            }
        } else {
            $cipherText = "ERROR Well this sucks</div>";
            $isError = true; 
        
        }
        if (!$isError){
            $display = "Encripted Message:<br/>
<textarea name='encriptedTXT' rows='15' cols='60'>".$cipherText."</textarea>";
        } else {
            $display = "<div class='error'>".$cipherText."</div>";
            
        }
    $display = $display ."<div>Chipher:".$_POST['cipher']."</div>";
    $display = $display ."<div>Alphabet:".$_POST['cipherAlphabet']."</div>";
    $display = $display ."<div>ShiftBy:".$_POST['shiftby']."</div>";
    $display = $display ."<div>KeyString:".$_POST['keyStr']."</div>";
    session_destroy();
}else {
    $display = "<div class='error'>You will need to select a cipher</div>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Lets Encript</title>

        <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
        </script>
         <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                <h2>Let's try some encription algorythms</h2>
                            <a href='index.php' class="myButton">Home</a>
  
                <br /> <br /> <br />
                <form method="post">
                    <div class="form-group">
                      Message to encript:<br/>
                      <textarea placeholder="Enter message to encript..." name="message" rows="15" cols="60">
                          <?php echo $message; ?>
                      </textarea>
                    </div>
                      <br/>
                      <br/>
                    <div>
                        <label for="sub"><input  type="radio" name="cipher" value="sub" <?php echo ($cipher=="sub")?"checked":"" ?>/>Substitution Cipher</label>
                    </div>
                    <div>
                        <label for="shift"><input  type="radio" name="cipher" value="shift" <?php echo ($cipher=="shift")?"checked":"" ?>/>Shift Cipher Cipher</label>
                    </div>
                    <div>
                        <label for="shift"><input type="radio" name="cipher" value="vigenere" <?php echo ($cipher=="vigenere")?"checked":""?>/>Vigenere Cipher</label>
                    </div>    

                    <div class="sub box" <?php echo ($cipher=="sub")?"style='display: block;'":"" ?>>
                          <input  type="text" placeholder="New alphabet..." name="cipherAlphabet" <?php echo isset($cipherAlphabet)?"value='$cipherAlphabet'":""; ?>/><br/>
                                              
                    </div>
                    <div class="shift box" <?php echo ($cipher=="shift")?"style='display: block;'":"" ?>>
                                            <input  type="number" name="shiftby" <?php echo isset($shiftBy)?"value='$shiftBy'":""; ?> placeholder="Enter a number..."/><br/>
                    </div>
                    <div class="vigenere box" <?php echo ($cipher=="vigenere")?"style='display: block;'":"" ?>>
                                            <input  type="text" name="keyStr" <?php echo isset($keyStr)?"value='$keyStr'":""; ?> placeholder="Enter a key..."/><br/>
                    </div>

                          
                      <div>
                            <button class="button" type="submit">Encript Message</button>
                      </div>
                </form>
                <hr/>
                <?php echo $display ?>

            </div>
        </div>

    </body>
</html>