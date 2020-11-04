<?php 
     //connect to database
     $conn = mysqli_connect('localhost', 'James', '5Xbmep7olqrLuc', 'dumplings');

     //check connection
     if(!$conn){
         echo 'Connection error ' . mysqli_connect_error();
     }


    $totalDumplings = 200;
    if(isset($_POST['submit'])){  //Condition for when data is submited
        $current = (htmlspecialchars($_POST['numOrders6'])*6) + (htmlspecialchars($_POST['numOrders12'])*12) + (htmlspecialchars($_POST['numOrders24'])*24);
        echo $current;
        if($current > $totalDumplings){
            $string = "You are ordering " . ($totalDumplings - $current)*-1 . " More than our capacity!";
            echo($string);
        }
        else{
            $totalDumplings -= $current;
            echo(htmlspecialchars('total' . $totalDumplings));
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone =  mysqli_real_escape_string($conn, $_POST['phone']);
            $time =  mysqli_real_escape_string($conn, $_POST['time']);
            $pickup = mysqli_real_escape_string($conn, $_POST['pickup']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $numOrders6 = mysqli_real_escape_string($conn, $_POST['numOrders6']);
            $numOrders12 = mysqli_real_escape_string($conn, $_POST['numOrders12']);
            $numOrders24 = mysqli_real_escape_string($conn, $_POST['numOrders24']);
            $packaging = mysqli_real_escape_string($conn, $_POST['packaging']);

            //create SQL 
            $sql = "INSERT INTO orderdetails(user, email, phone, timeslot, datex, style, numOrders6, numOrders12, numOrders24, packaging) 
                VALUES('$name', '$email', '$phone', '$time', '$pickup', '$type', '$numOrders6', '$numOrders12', '$numOrders24', '$packaging')";

            //save to database and check
            if(mysqli_query($conn, $sql)){
                //success
                header('Location: index.php');
            }
            else{
                //error
                echo 'query error' . mysqli_erorr($conn);
            }
    }
}
    

?>
<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>Order Now!</title>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
        <link rel="stylesheet" href="styles1.css">
        <meta name="viewport" content="width=device-width, intital-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script defer src="validation.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="nav-wrapper">
                <div class="leftside">
                    <div class="nav-link-wrapper">
                        <a href="index.php">Home</a>
                    </div>
                    <div class="nav-link-wrapper">
                        <a href="about.php">About</a>
                    </div>
                    <div class="nav-link-wrapper active-nav-link">
                        <a href="form.php">Order</a>
                    </div>
                </div>

                <div class="rightside">
                    <div class="brand">
                        <div>JAMES CHEN</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="error"></div>
        <div class="wrapper">
            <form id="form" action="confirmation.php" method="POST">
                <div class="contact-form">
                    <h1>Order Form</h1>
                    <div class="textbox">
                        <label>Full Name :</label>
                        <input type = "text" name="name" value="" placeholder="Enter your Full Name" required>
                    </div>
    
                    <div class="textbox">
                        <label>Email :</label>
                        <input type = "email" name="email" value="" placeholder="Enter your Email" required>
                    </div>
    
                    <div class="textbox">
                        <label>Phone Number :</label>
                        <input type = "text" name="phone" value="" placeholder="Enter your Phone Number " required>
                    </div>
    
                    <div class="textbox">
                        <label>Time :</label>
                        <select name="time" required>
                            <option value="none">None</option>
                            <option value="4:00pm">4:00pm</option>
                            <option value="4:30pm">4:30pm</option>
                            <option value="5:00pm">5:00pm</option>
                            <option value="5:30pm">5:30pm</option>
                            <option value="6:00pm">6:00pm</option>
                            <option value="6:30pm">6:30pm</option>
                            <option value="7:00pm">7:00pm</option>
                        </select>
                    </div>
    
                    <div class="textbox">
                        <label>Date of Pickup(Panfried Only on Sat!) :</label>
                        <input type="date" name="pickup" value="" placeholder="Panfried Only Available on Sat" required>
                    </div>
    
                    <div class="textbox">
                        <label>Type of Dumplings:</label>
                        <input type="text" name=type value=""placeholder="Frozen or Panfried" required>
                        <!-- <input type="radio" name=type value="frozen" required>
                        <label for="frozen">Frozen</label>
                        <input type="radio" name=type value="panfried" required>
                        <label for="panfried">Panfried</label>
                        -->
                    </div>
    
                    <div class="textbox">
                        <label>6 Pieces (10CHF):</label>
                        <input type="number" name="numOrders6" value="" placeholder="How many orders of 6 pieces" required>
                    </div>
    
                    <div class="textbox">
                        <label>12 Pieces (20CHF):</label>
                        <input type="number" name="numOrders12" value="" placeholder="How many orders of 12 pieces" required>
                    </div>
    
                    <div class="textbox">
                        <label>24 Pieces (38CHF):</label>
                        <input type="number" name="numOrders24" value="" placeholder="How many orders 24 pieces" required>
                    </div>
    
                    <div class="textbox">
                        <label>Packaging :</label>
                        <select name="packaging" required>
                            <option value="no">I will bring my own container</option>
                            <option value="yes">I will not bring my own container(+2CHF)</option>
                        </select>
                    </div>
                </div>
                <button class="btn" type="submit" name="submit">Submit!</button>
            </form>
        </div>
    </body>

</hmtl>