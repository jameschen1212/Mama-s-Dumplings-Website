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
        <div class="thankwrapper">
            <h1> Thank You For Ordering! <h1>
            <div class=confirm>
                <p>Your Order has been placed and we will contact you shortly!<p>
            </div>
            <div class=return>
                <p>Click below to return to the home page<p>
            </div>  
            <a class="btn" href="index.php">Home</a>

        </div>
    </body>
    <script>
        const items = document.querySelectorAll('.picture')
        items.forEach(i => {
            i.addEventListener('mouseover', () => {
                i.childNodes[1].classList.add('img-darken');
            })

            i.addEventListener('mouseout', () => {
                i.childNodes[1].classList.remove('img-darken');
            })
        })
    </script>
</html>