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
        width: 20em;
        top: 20em;
        left: 30em;
        color: white;
        font-size: 1.5em;
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

    <form action="index.php" method="POST">
        <div class="user-query">
            <p>
                SELECT 
                <span><input type="text" name="column1" placeholder="column name" required></span>
                FROM customer
                <br>
                WHERE 
                <span><input type="text" name="column2" placeholder="column name" required></span> 
                IN 
                <span><input type="text" name="column3" placeholder="country/city" required></span>
                <button class="btn" type="submit">FILTER</button>
            </p>
        </div>
    </form>

    <?php
        $query = 'SELECT * FROM CUSTOMERS;';

        $result = mysqli_query($conn, $query);

        echo "<table>";
            echo "<tr>";
                echo "<th>customerID</th>";
                echo "<th>Name</th>";
                echo "<th>City</th>";
                echo "<th>Country</th>";
                echo "<th>Email</th>";
            echo "</tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['customerID'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['country'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "<table>"; 
    ?>

    <?php
        $column1 = $_POST['column1'];
        $column2 = $_POST['column2'];
        $column3 = $_POST['column3'];

       
        if ($column1 === 'all') {
            $sql = "SELECT * FROM PRODUCTS WHERE $column2 IN ('$column3') AND $column2 IS NOT NULL;";
            $result = mysqli_query($conn, $sql);

            
            if ($row = @mysqli_fetch_assoc($result)) {
                echo '<table class="result">';
                echo "<tr>";

                foreach ($row as $attribute => $value) {
                    echo "<th>$attribute</th>";
                }

                echo "</tr>";

                mysqli_data_seek($result, 0);

                
                while ($row = @mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    
                    foreach ($row as $value) {
                        echo "<td>" . $value . "</td>";
                    }
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No results found.";
            }
        } else {
            
            $sql = "SELECT $column1 FROM CUSTOMERS WHERE $column2 IN ('$column3') AND $column2 IS NOT NULL;";
            $result = mysqli_query($conn, $sql);

            echo '<table class="result">';
            echo "<tr>";

            echo "<th>$column1</th>";

            echo "</tr>";

            while ($row = @mysqli_fetch_assoc($result)) {
                echo "<tr>";
                
                echo "<td>" . $row[$column1] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    ?>
</body>
</html>
