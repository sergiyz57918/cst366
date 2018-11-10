<?php
session_start(); 
$message = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat erat non lectus finibus, eget pulvinar nibh placerat. Aliquam erat volutpat. Pellentesque lacinia porta risus vel iaculis. Morbi id porta erat. Cras suscipit, lacus eget sollicitudin dapibus, tellus nulla laoreet massa, sed fringilla metus elit nec lorem. Sed finibus faucibus nibh et imperdiet. Suspendisse ac ante id turpis cursus fringilla. Aenean tempus tristique enim ut pharetra. Nullam vel aliquet arcu, sed sagittis purus. Suspendisse potenti. Pellentesque vitae elit sagittis, pellentesque orci ac, gravida mauris. Cras viverra nibh vitae condimentum mollis. Morbi in lorem in diam vulputate congue eget quis mauris. Praesent accumsan finibus nisl, quis varius nibh. Pellentesque vulputate quis eros vitae tempus."; 
$cipherAlphabet = "yhkqgvxfoluapwmtzecjdbsnri";
$key = "cipher"; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Lets Encript</title>
        <style type="text/css">
            .hide {
                      display: none;
                    }
        </style>
        <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".hide").not(targetBox).hide();
                $(targetBox).show();
            });
        });
        </script>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                
                <!-- Bootstrap Navagation Bar -->
                <nav class='navbar navbar-default - navbar-fixed-top'>
                    <div class='container-fluid'>
                        <div class='navbar-header'>
                            <a class='navbar-brand' href='#'>Cryptography</a>
                        </div>
                        <ul class='nav navbar-nav'>
                            <li><a href='index.php'>Home</a></li>
                        </ul>
                    </div>
                </nav>
                <br /> <br /> <br />
                <form method="post">
                      Message to encript:<br>
                      <textarea name="message" rows="15" cols="60">
                          <?php echo $message; ?>
                      </textarea>
                      <br/>
                      <br/>
                      <div><ol>
                        <ul><input type="radio" name="cipher" value="sub"/><label for="sub">Substitution Cipher</label></ul>
                        <ul><input type="radio" name="cipher" value="shift"/><label for="shift">Shift Cipher Cipher</label></ul>
                        <ul><input type="radio" name="cipher" value="vigenere"/><label for="shift">Vigenere Cipher</label> </ul>
                        </ol>
                      </div>
                      <div class="sub hide">
                                            <textarea name="message" rows="1" cols="27">
                                              <?php echo $cipherAlphabet; ?>
                                            </textarea>
                      </div>
                      <div class="shift hide">
                                            <input type="number" name="shiftby"/><br/>
                      </div>
                      <div class="vigenere hide">
                                            <input type="text" name="key" value="<?php echo $key; ?>"/>
                      </div>

                          
                      <div>
                      <input type="submit">
                      <input type="reset">
                      </div>
                </form>


            </div>
        </div>

    </body>
</html>