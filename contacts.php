<?php

if(isset($_POST['name']) || isset($_POST['email'])|| isset($_POST['subject']) || isset($_POST['contact']) || isset ($_POST['message'])){
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$contact = $_POST['contact'];
$message = $_POST['message'];

$conn= new mysqli ('localhost','root','','wdp');

if ($conn->connect_error){
    die("Connection Failed:". $conn->connect_error());
}else{
    $stmt = $conn->prepare("insert into customer_reports (name, email, subject, contact, message) 
    values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$name,$email,$subject,$contact,$message);
    $stmt->execute();
    echo '<script type ="text/JavaScript">';  
    echo 'alert("We have received your message and will get back to you within 3-5 business days.")';  
    echo '</script>';  
    $stmt->close();
    $conn->close();

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOUR</title>
    <link rel="stylesheet" href="contacts.css">
</head>
<body>
    <div class ="container">
        <header class= header>
            <div class="logo">
                <a href="#"><img src="Pics/Logo2.png" alt = "Logo"></a>
            </div>
            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="contacts.php">CONTACTS</a></li>
                    <li><a href="about-us.html">ABOUT US</a></li>
                    <li><a href="sign-up.php">SIGN UP</a></li>
                    <li><a class="login-btn" href="login.php"><button>LOGIN</button></a></li>
                </ul>
            </nav>
        </header>
        <div class="intro">
        <p> Tour - The app that provides information on Travel and Entertainment among other services across 
            The United Kingdom, Mauritius and Kenya.</p>
        </div>

        <div class="heading">
            <h1>Contact us</h1>
        </div>

        <div class="login-form">
            <form action="contacts.php" method="post">
                <label>
                    <input type="text" placeholder="Full name" name="name" required>
                </label>

                <label>
                    <input type="email" placeholder="Contact email" name="email" required>
                </label> 
             
                <label>
                    <input type="text" placeholder="Subject" name="subject" required>
                </label> 

                <label>
                    <input type="number" placeholder="Contact phone number" name="contact" required>
                </label> 

                <label>
                    <input type="text" placeholder="Message" name="message" required>
                </label> 

                <button name ="save" type="submit">SEND MESSAGE</button>
                
            </form>
        </div>

    </div>

    



    <script src="script.js"></script>
</body>
</html>