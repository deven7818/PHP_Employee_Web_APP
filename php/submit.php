<?php

include 'databasecon.php';
if(isset($_POST['done'])){

 $name = $_POST['empName'];
 $address= $_POST['address'];
 $email= $_POST['phone'];
 $phone= $_POST['email'];
 $salary= $_POST['salary'];
 $q = " INSERT INTO `empWage`(`name`, `address`,`phone`,`email`,`salary`)
             VALUES ( '$name', '$address','$phone','$email','$salary' )";

 $query = mysqli_query($con,$q);
 if ($query) {
    header('location:../page/homepage.php');
}
}
else{
    echo "Please fill the details";
}
?>