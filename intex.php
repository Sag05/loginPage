<!DOCTYPE html>
<html>
    <body>

        <?php
        //Comment
        #Other Comment
        
        /*
        Multi
        Line
        Comment        
        */
        
        $text = /* Mid line comment? */ "Hello World!";
        echo $text . "<br>";
        
        $otherText = "water";
        echo "Why does ". $otherText ."? <br>";
        echo "$otherText is a thing <br>";
        echo $text . $otherText. "<br>";

        $num1 = 5;
        $num2 = 4;
        echo $num1 + $num2 . "<br>";
        echo $num1 . $num2 . "<br>";

        $anArray = Array("This ","is ","an ","array!");
        for ($x = 0; $x <= sizeof($anArray)-1; $x++){
            echo $anArray[$x];
        }
        ?>

        <form method="post">
            <label for="nameInput">Username</label><br>
            <input type="text" name="usernameInput"><br>

            <label for="ageInput">Age</label><br>
            <input type="number" name="ageInput"><br>

            <label for="radioButtons">Alternatives</label><br>
            <input type="radio" name="radioButtons" value="1" id="alternative">
            <label for="alternative">Alternative</label><br>
            <input type="radio" name="radioButtons" value="2" id="otherAlternative">
            <label for="otherAlternative">Other Alternative</label><br>

            <input type="submit" name="submitButton"><br>
        </form>

        <?php  
        if($_POST){
            echo "Username: ". $_POST['usernameInput'] . "<br>";
            echo "Age: " . $_POST['ageInput'] . "<br>";
            echo "Alternative: " . isset($_POST['radioButtons']) . "<br>";
        } 
        ?>

    </body>
</html>