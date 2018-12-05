// VARIABLES
var pc; // player character
var npc_prince; // non-player character
var output;
var leftArrowDown = false;
var rightArrowDown = false;
var upArrowDown = false;
var gameTimer;
var level = 0;  // game will begin one level higher than this
var lifebar;
var numLives = 0;

const GRAVITY = 1;
var fallSpeed = 0;
var platforms;
var platforms = new Array();

// LISTENERS
document.addEventListener('keydown', function(event){
    if(event.keyCode==37) leftArrowDown = true;
    if(event.keyCode==39) rightArrowDown = true;
    if(event.keyCode==38) upArrowDown = true;
});

document.addEventListener('keyup', function(event){
    if(event.keyCode==37) leftArrowDown = false;
    if(event.keyCode==39) rightArrowDown = false;
    if(event.keyCode==38) upArrowDown = false;
});

// set the the initital size and location of the pc and start the game loop
function init() {
    output = document.getElementById('output');
    output.innerHTML = level;
    
    lifebar = document.getElementById('lifebar');
    for(var i=0; i<3; i++) addLife();
    
    pc = document.getElementById('pc');
    pc.style.width = '20px';
    pc.style.height = '40px';
    
    npc_prince = document.getElementById('npc_prince');
    npc_prince.style.width = '20px';
    npc_prince.style.height = '40px';
    
    nextLevel();
    
//    gameTimer = setInterval(gameloop, 50); // gameloop function repeats every 50 milliseconds, or 20x per second
}

// gameloop is only used to move the pc when the left  or right arro key is pressed
// keyboard listeners along with leftArrowDown and rightArrowDown variables are
// used to detect when the arrow keys are being pressed
function gameloop(){
    // HORIZONTAL MOVEMENT
    if(leftArrowDown) {
        pc.style.left = parseInt(pc.style.left) - 5 + 'px';
        
        var sideHit = false;
        for(var i=0; i<platforms.lenggth; i++){
            if( hittest(pc, platforms[i])) sideHit = true;
        }
        pc.style.left = parseInt(pc.style.left) + 5 + 'px';
        if(!sideHit){
            for(var i=0; i<platforms.length; i++){
                platforms[i].style.left = parseInt(platforms[i].style.left) + 5 + 'px';
            }
            npc_prince.style.left = parseInt(npc_prince.style.left) + 5 + 'px';
        }
//        if(sideHit) pc.style.left = parseInt(pc.style.left) + 5 + 'px';
    }
    if(rightArrowDown){
        pc.style.left = parseInt(pc.style.left) + 5 + 'px';
        
        var sideHit = false;
        for(var i=0; i<platforms.length; i++){
            if(hittest(pc, platforms[i])) sideHit = true;
        }
        pc.style.left = parseInt(pc.style.left) - 5 + 'px';
        
        if(! sideHit){
            for(var i=0; i<platforms.length; i++){
                platforms[i].style.left = parseInt(platforms[i].style.left) -5 + 'px';
            }
            npc_prince.style.left = parseInt(npc_prince.style.left) - 5 + 'px';
        }
//        if(sideHit) pc.style.left = parseInt(pc.style.left) - 5 + 'px';
    }
    
    // VERTICAL MOVEMENT
    fallSpeed += GRAVITY;
    pc.style.top = parseInt(pc.style.top) + fallSpeed + 'px';
    
    for(var i=0; i<platforms.length; i++){
        if( hittest(pc, platforms[i])){
            if(fallSpeed<0){
                // hit bottom of platform
                pc.style.top = parseInt(platforms[i].style.top) + parseInt(platforms[i].style.height) + 'px';
                fallSpeed *= -1;
            }
            else{
                // hit top of platform
                pc.style.top = parseInt(platforms[i].style.top) - parseInt(pc.style.height) + 'px';
                
                if(upArrowDown) fallSpeed =- 16;    // upward force
                else{
                    fallSpeed = 0;
                }
            }
        }
        
        if(hittest(pc, npc_prince)){
            clearInterval(gameTimer);
            alert('You saved the prince!');
            if(level==3){
                gameWindow.innerHTML = '<br><br>You win!';
                gameWindow.className = 'msgGameOver';
            } else{
            document.getElementById('btnContinue').style.display = 'block';
            }
        } else if(parseInt(pc.style.top) > 400){
            clearInterval(gameTimer);
            alert('So sad... you fell in a hole.');
            
            removeLife();
            level--;
            nextLevel();
        }
    }
}

// increase the level
function nextLevel(){
    document.getElementById('btnContinue').style.display = 'none';
    
    level++
    output.innerHTML = level;
    
    fallSpeed = 0;
    leftArrowDown = false;
    rightArrowDown = false;
    upArrowDown = false;
    
    pc.style.left = '190px';
    pc.style.top = '50px';
    
    for(var i=0; i<platforms.length; i++){
        gameWindow.removeChild(platforms[i]);
    }
    
    
    if(level==1){
        npc_prince.style.left = '2000px';
        npc_prince.style.top = '340px';
        
        addPlatform(0, 380, 500, 20);
        addPlatform(150, 300, 100, 20);
        addPlatform(550, 380, 400, 20);
        addPlatform(400, 300, 100, 100);
        addPlatform(900, 200, 100, 20);
        addPlatform(800, 300, 100, 20);
        addPlatform(1180, 380, 1400, 20);
    }
    
    else if(level==2){
        npc_prince.style.left = '500px';
        npc_prince.style.top = '340px';
        
        addPlatform(0, 380, 250, 20);
        addPlatform(300, 380, 250, 20);
    } else if(level==3){
        npc_prince.style.left = '650px';
        npc_prince.style.top = '240px';
        
        addPlatform(0, 380, 500, 20);
        addPlatform(550, 280, 150, 20);
    }
    
    gameTimer = setInterval(gameloop, 50);
}

// create a div for the platform, styled with the platform class, position and
// size it with parameters that are passed to the function, then add it to the
// platforms Array and to the gameWindow
function addPlatform(x, y, w, h){
    var p = document.createElement('DIV');
    p.className = 'platform';
    p.style.left = x + 'px';
    p.style.top = y + 'px';
    p.style.width = w + 'px';
    p.style.height = h + 'px';
    
    platforms.push(p);
    gameWindow.appendChild(p);
}

// increase the value of numLives by one, create a new img element with src
// of heart.png, then add that img element to the lifebar
function addLife(){
    numLives++;
    var life = document.createElement('IMG');
    life.src = 'heart.png';
    lifebar.appendChild(life);
}

// reduce numLives by one and then remove one of the hearts from lifebar
function removeLife(){
    if(numLives>0){
        numLives--;
        lifebar.removeChild(lifebar.lastChild);
    } else{
        gameWindow.innerHTML = '<br><br>You lose!';
        gameWindow.className = 'msgGameOVer';
    }
}

// the hittest function from previous game instructions jakeweb.net/JS_GAMES
function hittest(a, b){
    var aX1 = parseInt(a.style.left);
    var aY1 = parseInt(a.style.top);
    var aX2 = aX1 + parseInt(a.style.width)-1;
    var aY2 = aY1;
    var aX3 = aX1;
    var aY3 = aY1 + parseInt(a.style.height)-1;
    var aX4 = aX2;
    var aY4 = aY3;
    
    var bX1 = parseInt(b.style.left);
    var bY1 = parseInt(b.style.top);
    var bX2 = bX1 + parseInt(b.style.width)-1;
    var bY2 = bY1;
    var bX3 = bX1;
    var bY3 = bY1 + parseInt(b.style.height)-1;
    var bX4 = bX2;
    var bY4 = bY3;
    
    var hOverlap = true;
    if(aX1<bX1 && aX2<bX1) hOverlap = false;
    if(aX1>bX2 && aX2>bX2) hOverlap = false;
    
    var vOverlap = true;
    if(aY1<bY1 && aY3<bY1) hOverlap = false;
    if(aY1>bY3 && aY3>bY3) hOverlap = false;
    
    if(hOverlap && vOverlap) return true;
    else return false;
}