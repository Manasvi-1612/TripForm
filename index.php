<?php
    $insert = false;

    // The $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post".
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // echo "Yes";
        
   
    $server = "localhost";
    $username = "root";
    $password = "";

    // The MySQLi functions allows you to access MySQL database servers.
    //Returns an object representing the connection to the MySQL server
    $conn  = mysqli_connect($server, $username, $password);
    if(!$conn){
        // The die() is an inbuilt function in PHP. It is used to print message and exit from the current php script. 
        die("Connection failed: " . mysqli_connect_error());
    }

    // echo"Connected successfully";


    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `test`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `createdAt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    if($conn->query($sql) === true){
        // echo "Successfully inserted";
        $insert = true;
    }else{
        echo"$name, $age, $gender, $email, $phone, $desc";
        echo "ERROR: $sql <br> $conn->error";
    }

    $conn->close();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel From</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <img class="bg" src="https://www.golokaso.com/blogs/wp-content/uploads/2020/01/Tegalalang-Rice-Terrace-Bali.jpg" alt="bali">
    <div class="container">
        <h1>Welcome To Bali</h1>

        <p>Submit your details to confirm your participation in the trip:</p>
        <?php
            if($insert == true){
                echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the Bali trip</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>

        <!--  -->
    </div>
</body>
</html>