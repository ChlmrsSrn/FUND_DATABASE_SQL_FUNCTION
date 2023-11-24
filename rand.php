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

    .user-query{
        position: absolute;
        left: 25em;
        top: 22em;
        color: white;
        font-size: 1.5em;
    }

    span input{
        font-size: 1em;
        border: 0;
    }

    .btn {
        text-decoration: none;
        width: 100%;
        color: black;
        margin: 2% auto;
        padding: 1%;
        border-radius: 50px;
        text-align: center;
        font-size: 1.5em;
        font-weight: 700;
        cursor: pointer;
        background: linear-gradient(to right, #03DAC6 50%, white 50%);
        background-size: 200% 100%;
        background-position: right bottom;
        transition: all .3s ease-out;
        }

    .btn:hover {
        background-position: left bottom;
        color: white;
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


    <?php
        $query = 'SELECT * FROM PRODUCTS;';

        $result = mysqli_query($conn, $query);

        echo "<table>";
            echo "<tr>";
                echo "<th>productID</th>";
                echo "<th>productName</th>";
                echo "<th>cityOfOrigin</th>";
                echo "<th>countryOfOrigin</th>";
            echo "</tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['productID'] . "</td>";
            echo "<td>" . $row['productName'] . "</td>";
            echo "<td>" . $row['cityOfOrigin'] . "</td>";
            echo "<td>" . $row['countryOfOrigin'] . "</td>";
            echo "</tr>";
        }
        echo "<table>";
    ?>

    <form action="rand.php" method="POST">
        <div class="user-query">
            <p>SELECT <span><input type="text" name="column1" placeholder="productID" /></span> FROM products
            ORDER BY RAND();</p>
            <button class="btn" value="submit">SUBMIT</button>
        </div>
    </form>
    
        <?php
        $column = $_POST['column1'];
            
        $sql = "SELECT $column FROM PRODUCTS ORDER BY RAND();";

        $result = mysqli_query($conn, $sql);

        echo '<table class="result">';
        echo "<tr>";
        echo "<th>RAND() RESULT</th>";
        echo "</tr>";
        
        while ($row = @mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row[$column] . "</td>";
            echo "</tr>";
        }
        echo "<table>";
    ?>


</body>
</html>
