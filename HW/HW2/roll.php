<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Dice Game</title>
  <meta name="description" content="Dice Game">
  <meta name="author" content="SeZa">

  <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <table>
        <tr>
            <th>Dice 1</td>
            <th>Dice 2</td>
            <th>Dice 3</td>
            <th>You rolled</td>
        </tr>
<?php 
session_start();
include 'inc/functions.php';

$thisRoll = array();

for ($i=0; $i<3; $i++){
    array_push($thisRoll,roll (20)); 
}

if (isset($_SESSION['rolls'])) {

            $total = 0;
            foreach($_SESSION['rolls'] as $roll){
                $sum= $roll[0]+$roll[1]+$roll[2];
                echo " <tr>
            <td><div id='dice_$roll[0]'></div></td>
            <td><div id='dice_$roll[1]'></div></td>
            <td><div id='dice_$roll[2]'></div></td>
            <td>$sum</td>
        </tr>"; 
        $total += $sum; 
            } 
        array_push($_SESSION['rolls'],$thisRoll);  
        
    }
    else {
        echo "This sucks";
        echo implode(" ", $thisRoll); 
    }
    



?>
        <tr>
            <td><div class="dice"></div></td>
            <td><div class="dice"></div></td>
            <td><div class="dice"></div></td>
            <td>    <form action="index.php" method="post">
             <input type='button' value='Stop the dice' onclick='submit()'> 
      </td>
        </tr>
    <tfoot>
    <tr>
      <td></td>
      <td></td>
      <td>You roll so far</td>
      <td><?php echo $total ?></td>
     </tr>
     </tfoot>
    </table>
</body>
</html>