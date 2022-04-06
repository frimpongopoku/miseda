<?php
if(isset( $_POST['email_address']) || isset($_POST['user_password'])){
$email_address = $_POST['email_address'];
$user_password = $_POST['user_password'];


$conn= new mysqli ('localhost','root','','wdp');

if ($conn->connect_error){
    die("Connection Failed:". $conn->connect_error());
}else{
    $stmt = $conn->prepare("insert into entry_details (email_address, user_password) 
    values(?,?)");
    $stmt->bind_param("ss",$email_address,$user_password);
    $stmt->execute();
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Registration successful")';  
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
    <link rel="stylesheet" href="sign-styles.css">
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
            <h1>Sign up</h1>
        </div>

        <div class="login-form">
            <form action="sign-up.php" method="post">
                <label>
                    <input type="email" placeholder="Email address" name="email_address" required>
                </label>

                <label>
                    <input type="password" placeholder="Password" name="psw" required>
                </label> 
             
                <label>
                    <input type="password" placeholder="Password confirmation" name="user_password" required>
                </label> 

                <button name ="save" type="submit">SIGN UP</button>
                
            </form>
        </div>

    </div>

    



    <script src="script.js"></script>
</body>
</html>