        //VARIABLES
            var selectWord =""; 
            var selectHint=""; 
            var board = [];
            var remainingGuesses = 6;
            var words=[
                {word:"snake", hint:"It's a reptile"},
                {word:"monkey", hint:"It's a mammal"},
                {word:"beetle",hint:"It's an insect"}];
            
            console.log(words[0]);
            
            // Creating an array of available letters
                var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                           'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                           'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

            
            //LISTNER
            window.onload = startGame(); 
            
            //FUNCTIONS
            function startGame(){
                pickWord()
                initBoard();
                createLetters();
                updateMan();
                updateBoard(); 
            }
            
            function initBoard(){
                for (var letter in selectWord){
                    board.push("_"); 
                }
            }
            
            function pickWord(){
                var randomInt = Math.floor(Math.random()*words.length);
                selectWord = words[randomInt]; 
            
            }
            
            function updateBoard(){
                $("#word").empty(); 
                
                for(var i=0; i<board.length; i++) {
                    $("#word").append(board[i]+" "); 
                    }
                $("#word").append("<br/>");
                $("#word").append("<span class='hint'>Hint: "+selectHint+"</span>");
            }
            
            function createLetters(){
                for(var letter of alphabet){
                    $("#letters").append("<button class='letter' id='"+letter+"'>"+letter+"</button>");
                }
            }
            
            function checkLetter(letter){
                var position =new Array(); 
                
                //Put all the positions the letter exists in an array
                for(var i=0;i< selectWord.length; i++){
                    if (letter == selectWord[i]){
                        position.push(i);
                    }
                    
                }
                
                if(position.length>0){
                    updateWord(position,letter);
                    
                    //Check to see if this is a winning guess
                    
                    if(!board.includes('_')){
                        endGame(true); 
                    }
                } else {
                    remainingGuesses-=1;
                }
                
                if(remainingGuesses<=0){
                    endGame(false);                    
                }
            updateMan();
            }
            
            function updateWord(position,letter){
                for(var pos of position){
                    board[pos]=letter;
                }
                updateBoard(); 
            }
            
            function pickWord(){
                var randomInt = Math.floor(Math.random()*words.length);
                selectWord = words[randomInt].word.toUpperCase();
                selectHint = words[randomInt].hint;
            }
            
            function updateMan(){
                $("#hangImg").attr("src", "img/stick_"+(6- remainingGuesses)+".png"); 
            }
            
            function endGame(win){
                $("#letters").hide(); 
                
                if(win){
                    $('#won').show()
                } else{
                    $('#lost').show()
                }
                
                $(".replayBtn").on("click",function(){
                   location.reload();  
                });
            }
            
            function disableButton(btn){
                btn.prop("disabled",true);
                btn.attr("class","btn btn-danger");
            }
            
            $(".letter").click(function(){
                checkLetter($(this).attr("id")); 
                disableButton($(this));
            })