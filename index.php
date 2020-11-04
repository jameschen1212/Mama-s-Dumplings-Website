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
        <title>Mama's Dumplings</title>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
        <link rel="stylesheet" href="styles1.css">
        <meta name="viewport" content="width=device-width, intital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </head>
    <body>
        <div class="container">
            <div class="nav-wrapper">
                <div class="leftside">
                    <div class="nav-link-wrapper active-nav-link">
                        <a href="index.php">Home</a>
                    </div>
                    <div class="nav-link-wrapper">
                        <a href="about.php">About</a>
                    </div>
                    <div class="nav-link-wrapper">
                        <a href="form.php">Order</a>
                    </div>
                </div>

                <div class="rightside">
                    <div class="brand">
                        <div>JAMES CHEN</div>
                    </div>
                </div>
            </div>

            <div class="contentwrapper">
                <div class="picturewrapper">
                    
                    <div class="picture">
                        <div class="picbackground" style="background-image: url(Images/IMG-0590.jpg)"></div>

                        <div class="img-text-wrapper">
                            <div class="logo-wrapper">
                                <img src="Images/logo1white.png" height=150px; width=150px;>
                            </div>
                            <div class="subtitle">
                                Authentic!
                            </div>
                        </div>
                    </div>

                    <div class="picture">
                        <div class="picbackground" style="background-image: url(Images/dumplinglogo.jpeg)"></div>

                        <div class="img-text-wrapper">
                            <div class="logo-wrapper">
                                <img src="Images/logo1white.png" height=150px; width=150px;>
                            </div>
                            <div class="subtitle">
                                Homemade!
                            </div>
                        </div>
                    </div>

                    <div class="picture">
                        <div class="picbackground" style="background-image: url(Images/IMG-0591.jpg)"></div>

                        <div class="img-text-wrapper">
                            <div class="logo-wrapper">
                                <img src="Images/logo1white.png" height=150px; width=150px;>
                            </div>
                            <div class="subtitle">
                                Fresh!
                            </div>
                        </div>
                    </div>

                    <div class="picture">
                        <div class="picbackground" style="background-image: url(Images/IMG-0600.jpg)"></div>

                        <div class="img-text-wrapper">
                            <div class="logo-wrapper">
                                <img src="Images/logo1white.png" height=150px; width=150px;>
                            </div>
                            <div class="subtitle">
                                Savoury!
                            </div>
                        </div>
                    </div>

                    <div class="picture">
                        <div class="picbackground" style="background-image: url(Images/IMG-0597.jpg)"></div>

                        <div class="img-text-wrapper">
                            <div class="logo-wrapper">
                                <img src="Images/logo1white.png" height=150px; width=150px;>
                            </div>
                            <div class="subtitle">
                                Made with Love!
                            </div>
                        </div>
                    </div>

                    <div class="picture">
                        <div class="picbackground" style="background-image: url(Images/IMG-0599.jpg)"></div>

                        <div class="img-text-wrapper">
                            <div class="logo-wrapper">
                                <img src="Images/logo1white.png" height=150px; width=150px;>
                            </div>
                            <div class="subtitle">
                                Addictive!
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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