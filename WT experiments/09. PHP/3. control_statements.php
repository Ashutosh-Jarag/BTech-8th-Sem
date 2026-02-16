<!DOCTYPE html>
<html>
    <head>
        <title>Arrays</title>
    </head>
    <body>
        <h2>Arrays</h2>
        <?php

        // if 
        $name = ["John", "Doe", "Smith"];
        if (in_array("John", $name)){
            echo "<p>John is in the array</p>";
        }

        // if else
           
        $age = 20;
        
        if ($age >= 18){
            echo "<p>You are Minor... </p>";
        }else{
            echo "<p>You can Vote... </p>";
        }

        // if else if
        $marks = 90;

        if ($marks >= 90){
            echo "<p>Grade A</p>";
        }elseif ($marks >= 80){
            echo "<p>Grade B</p>";
        }elseif ($marks >= 70){
            echo "<p>Grade C</p>";
        }elseif ($marks >= 60){ 
            echo "<p>Grade D</p>";
        }


        // switch
        $day = 3;
        switch ($day) {
            case 1:
                echo "<p>Monday</p>";
                break;
            case 2:
                echo "<p>Tuesday</p>";
                break;
            case 3:
                echo "<p>Wednesday</p>";
                break;
            case 4:
                echo "<p>Thursday</p>";
                break;
            case 5:
                echo "<p>Friday</p>";
                break;
            default:
                echo "<p>Weekend</p>";
                break;
        }


        ?>
    </body>
</html>
