<?php  
$insert=false;
if(isset($_POST['name'])){
   //set connection variables
$server="localhost";
$username="root";
$password="";
//create a connection
$con=mysqli_connect($server,$username,$password);
//check for connection success
if(!$con){
    die("connection to database falid due to" .mysqli_connect_error());
}

// collect post vriables
$name= $_POST['name'];
$age=  $_POST['age'];
$gender= $_POST['gender'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$other= $_POST['other'];
$sql= "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
#echo $sql;

//excute the query
if($con->query($sql) == true){
 //   echo "successfully inserted";
 //flag for succesful insertion
 $insert=true;
}
else{
    echo "Error:$sql <br> $con -> error";
}
//close the database connection
$con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to Travel form of USA trip </title>
</head>
<body>
    <img src="background.jpg" alt="PCCOE Pune">
    <div class="container">
        <h2><b>Welcome to PCCOE Pune form of USA Trip</b></h2>
        
        <?php 
        if($insert==true){
        echo "<p>Your details are sucessfully submitted!!!</p>";} ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your first name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your MailID">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone Number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Add Description here"></textarea>
            <button class="btn">submit</button>
            <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'name', '20', 'female', 'email@gmail.com', '9503727299', 'this my first ever php admin message', current_timestamp());        </form> -->
    </div>
    <script src="index.js"></script>
</body>
</html>