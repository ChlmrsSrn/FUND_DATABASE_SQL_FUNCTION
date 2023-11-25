<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png/x-icon" href="" />
    <link rel="stylesheet" type="css/text" href="styles.css" />
    <title>SQL FUNCTION</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&display=swap');

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Raleway", sans-serif;
    }

    body{
        background-color: #303030;
    }

    .nav-container{
        display: block;
        width: 100%;
        padding: 1.5%;
        font-weight: 500;
        font-size: 1.5em;
        background-color: #212121;
        border-bottom: 5px solid #03DAC6;
    }

    .nav-container ul{
        display: flex;
        justify-content: space-around;
        list-style-type: none;
    }

    .nav-container ul li a{
        text-decoration: none;
        color: white;
    }

    .hover-underline-animation {
        display: inline-block;
        position: relative;
        color: #03DAC6;
        text-decoration: none;
    }
  
    .hover-underline-animation:after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(0);
        height: 3px;
        bottom: 0;
        left: 0;
        background-color: #03DAC6;
        transform-origin: bottom right;
        transition: transform 0.25s ease-out;
    }
  
    .hover-underline-animation:hover:after {
        transform: scaleX(1);
        transform-origin: bottom left;
    } 

    table{
        border: .2em solid #03DAC6;
        width: 60%;
        color:white;
        background-color: #424242;
        border-collapse: collapse;
        position: relative;
        margin: 1% auto;
        margin-bottom: 100px;
    }

    th, td{
        padding: .5%;
        text-align: center;
        border: 1px solid #03DAC6;
    }

    </style>

</head>
<body>
    <div class="nav-container">
        <ul>
            <li><a class="hover-underline-animation" href="index.php">IN CLAUSE</a></li>
            <li><a class="hover-underline-animation" href="union.php">UNION</a></li>
            <li><a class="hover-underline-animation" href="rand.php">RANDOM</a></li>
            <li><a class="hover-underline-animation" href="numeric.php">NUMERIC</a></li>
        </ul>
    </div>

    <div class="function-container">
        <div class="function">
            <form action="numeric.php" method="POST">
                <p>SQRT() FUNCTION</p>
                <p>SELECT SQRT(<span><input type="number" name="num1" /></span>);</p>
                <button class="btn" value="submit">SUBMIT</button>
            </form>
        </div>

        <div class="function">
            <form action="numeric.php" method="POST">
                <p>SELECT CEIL(<span><input type="number" step="0.01" name="num2"/></span>)</p>
                <button class="btn" value="submit">SUBMIT</button>
            </form>
        </div>
    </div>

    <?php
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
            
        $sqlSqrt = "SELECT SQRT($num1) AS sqrt_result;";

        $resultS = mysqli_query($conn, $sqlSqrt);

        echo '<table class="result">';
        echo "<tr>";
        echo "<th>SQRT($num1) RESULT</th>";
        echo "</tr>";
        
        while ($row = @mysqli_fetch_assoc($resultS)) {
            echo "<tr>";
            echo "<td>" . $row['sqrt_result'] . "</td>";
            echo "</tr>";
        }
        echo "<table>";



        $sqlCeil = "SELECT CEIL($num2) AS ceil_result;";

        $resultC = mysqli_query($conn, $sqlCeil);

        echo '<table class="result">';
        echo "<tr>";
        echo "<th>CEIL($num2) RESULT</th>";
        echo "</tr>";

        while ($row = @mysqli_fetch_assoc($resultC)) {
            echo "<tr>";
            echo "<td>" . $row['ceil_result'] . "</td>";
            echo "</tr>";
        }
        echo "<table>";


    ?>



</body>
</html>