<?php

    //connect to database
    $conn = mysqli_connect('localhost', 'James', '5Xbmep7olqrLuc', 'dumplings');

    //check connection
    if(!$conn){
        echo 'Connection error ' . mysqli_connect_error();

    }
    //fetch data from database
    //write query
    $sql = 'SELECT * FROM orderdetails ORDER BY datex';
    //make query
    $result = mysqli_query($conn, $sql);

    //fetch resulting rows as an array
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);
    
    //close connection
    mysqli_close($conn);



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thank You!</title>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
        <link rel="stylesheet" href="styles1.css">
        <meta name="viewport" content="width=device-width, intital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </head>
    <body>
        <div class="confirmwrapper">
            <h1> Order Results <h1>
        </div>
        <?php
            echo "<P>Order Processed on ";
            echo date("H:i, jS F");
            echo "<br>";
            $totalqty = 0;
            $totalqty = ($_POST['numOrders6']*6) + ($_POST['numOrders12']*12) + ($_POST['numOrders24']*24);
            echo "<p> Total dumplings ordered: " .$totalqty. "<br />";
            $totalamount = 0.00;

            define('PRICESMALL', 10);
            define('PRICEMED', 20);
            define('PRICELARGE', 38);

            $totalamount = ($_POST['numOrders6'] * PRICESMALL) + ($_POST['numOrders12'] * PRICEMED) + ($_POST['numOrders24'] * PRICELARGE);
            
            echo "Total: $".number_format($totalamount,2)."<br />";
        ?>
        <br />
        <br />
         <a class="btn" href="thankyou.php">Confirm</a>
    </body>