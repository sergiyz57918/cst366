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
<?php 
        session_start();
        if (isset($_SESSION['rolls'])) 
        {
            echo "    <table>
        <tr>
            <th>Dice 1</td>
            <th>Dice 2</td>
            <th>Dice 3</td>
            <th>You rolled</td>
        </tr>";
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
            if ($total < 123){
                           echo "    <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td>You roll so far</td>
                  <td>$total</td>
                 </tr>
                 </tfoot>";
                         echo "    </table>
                <form action='roll.php' method='post'>
                    <input type='button' value='Roll the dice' onclick='submit()'>  
                </form>";
            } else  if ($total > 123){
                session_destroy();
                echo "<h1>You Lost $total is more than 123</h1>
                <img src='../img/tenor.gif' alt = 'Sad face'/>";
        echo "    </table>
                    <form action='index.php' method='post'>
                        <input type='button' value='Try it again' onclick='submit()'>  
                    </form>";
            } else{
                session_destroy();
                echo "<h1>You WON, Congrads!!!!</h1>";
            }
 
            
        } else {
        $_SESSION['rolls'] = array();
        echo "<div>The game is simple. Roll the dice and try to get 123 points. You go over and oyu loose.</div>"; 
        echo "
    <form action='roll.php' method='post'>
      <input type='button' value='Roll the dice' onclick='submit()'> 
    </form>";
            
        }
        

?>

</body>
</html>