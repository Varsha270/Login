<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);


     $checkEmail="SELECT * FROM user WHERE email='$email' and password='$password'";
     $result=$con->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO user(firstName,lastName,email,password,) VALUES ('$firstName','$lastName','$email','$password')";
        if ($con->query($insertQuery)==TRUE)
        {
                    header("location: index.php");
                }
                else{
                    echo "Error:".$con->error;
                }
     }
   

}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM user WHERE email='$email' and password='$password'";
   $result=$con->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: homepage.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }

}
?>