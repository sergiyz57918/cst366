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

        <title>Lets Encript</title>
        <link rel="stylesheet" href="css/styles.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                <h2>Let's try some encription algorythms</h2>

  
                <br /> 
                <form id="cryptForm">
                    <div class="form-group">
                      Message to encript:<br/>
                      <textarea placeholder="Enter message to encript..." name="message" rows="15" cols="60">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin placerat erat non lectus finibus, eget pulvinar nibh placerat. Aliquam erat volutpat. Pellentesque lacinia porta risus vel iaculis. Morbi id porta erat. Cras suscipit, lacus eget sollicitudin dapibus, tellus nulla laoreet massa, sed fringilla metus elit nec lorem. Sed finibus faucibus nibh et imperdiet. Suspendisse ac ante id turpis cursus fringilla. Aenean tempus tristique enim ut pharetra. Nullam vel aliquet arcu, sed sagittis purus. Suspendisse potenti. Pellentesque vitae elit sagittis, pellentesque orci ac, gravida mauris. Cras viverra nibh vitae condimentum mollis. Morbi in lorem in diam vulputate congue eget quis mauris. Praesent accumsan finibus nisl, quis varius nibh. Pellentesque vulputate quis eros vitae tempus. 
                      </textarea>
                    </div>
                      <br/>
                      <br/>
                    <div class="radio">  
                        <div>
                            <label for="sub"><input  type="radio" name="cipher" value="sub"/>Substitution Cipher</label>
                            <a href="#" data-toggle="tooltip" title="Please select a Cipher."><img src='info.png' width='15'></a>
                        </div>

                        <div>
                            <label for="shift"><input  type="radio" name="cipher" value="shift"/>Shift Cipher</label>
                        </div>
                        <div>
                            <label for="shift"><input type="radio" name="cipher" value="vigenere" />Vigenere Cipher</label>
                        </div>

                    </div>

                    <div class="sub box">
                            <input  type="text" placeholder="New alphabet..." name="cipherAlphabet"/>
                            <a href="#" data-toggle="tooltip" title="New alphabet..."><img src='info.png' width='15'></a><br/>
                                              
                    </div>
                    <div class="shift box">
                            <input  type="number" name="shiftby"  placeholder="Enter a number..."/>
                            <a href="#" data-toggle="tooltip" title="Enter a number..."><img src='info.png' width='15'></a><br/>
                    </div>
                    <div class="vigenere box">
                            <input  type="text" name="keyStr" placeholder="Enter a key..."/>
                            <a href="#" data-toggle="tooltip" title="Enter a key..."><img src='info.png' width='15'></a><br/>
                    </div>

                          
                </form>
                    <div>
                            <button class="button" id="btn">Encript Message</button>
                    </div>
                <hr/>

            </div>
        </div>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            
            $('[data-toggle="tooltip"]').tooltip(); 
            
            $('#btn').click(function() {
                var message = $.trim($("#message").val());
                var cipher = $("#cipher input[name='cipher']:checked").val();
                var cipherAlphabet = $("#cipherAlphabet").val();
                var shiftby = $("#shiftby").val();
                var keyStr = $("#keyStr").val();
                console.log(cipher);
                if(typeof(cipher) != "undefined"){
                    if (cipher=="sub"){
                        if(cipherAlphabet==null || cipherAlphabet.length!=26 ) {
                            $('.radio').attr("title","ERROR You need to enter scrambled alphabet of exact 26 leters no repeats");
                            $('.radio').attr("src","error.png");
                            console.log("ERROR You need to enter scrambled alphabet of exact 26 leters no repeats");
                        }
                    } else if (cipher=="shift"){
                        if(shiftby<0 || shiftby>26){
                            $('#shiftby').after('<span class="error">ERROR You need to enter number from 1 to 26</span>');
                        }
                        
                    }else if ($cipher=="vigenere"){
                        if(keyStr.length<0){
                            $('#keyStr').after('<span class="error">ERROR You need to enter number from 1 to 26</span>');
                        }
                        
                    } else {
                        $('#message').after('<span class="error">You need to select somthing</span>');
                    }
                }
                    return false;

            });   
         });
        });
        
        </script>
    </body>
</html>