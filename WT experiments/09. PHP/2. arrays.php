<!DOCTYPE html>
<html>
    <head>
        <title>Arrays</title>
    </head>
    <body>
        <h2>Arrays</h2>
        <?php

        $a =[10,20,30,40,50];
        $b = array(1,2,3,4,5);
        $students =[
            "name"=>"john",
            "age"=> 20,
            marks => [
                "maths"=> 90,
                "english"=> 80,
                "science"=> 70
            ]
        ];

        $a[]= 60;

        echo "<h3>arrays : </h3>";
        echo "<ul>";
        foreach($a as $value){
            echo "<li>$value</li>"; 
        }
        echo "</ul>";
        ?>
    </body>
</html>
