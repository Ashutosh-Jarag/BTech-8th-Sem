<!DOCTYPE html>
<html>
    <head>
        <title>Arrays</title>
    </head>
    <body>
        <h2>Arrays</h2>
        <?php

        //for loop
        for($i=1; $i<=10; $i++){
            echo "<h3>Number = $i </h3>";
        }

        //while loop
        $a = 1;
        while($a <=10){
            echo "<h3>$a<h/3>";
            $a++;
        }

        //foreach loop
        $b = [1,2,3,4,5,6,7,8,9,10];
        echo "<ul>"; 
        foreach($b as $value){
            echo "<li>value = $value</li>"; 

        }
        echo "</ul>";
        ?>

      

    </body>
</html>
