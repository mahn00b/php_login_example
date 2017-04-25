<?php

$server = "127.0.0.1"; //address of mysql database(localhost in this case)
$dbuser = "DBuser"; //mysql username
$dbpass = "DBpass";//mysql pass
$dbname = "DBname";//name of the database

//call to the mysqli object to connect to the specified database
$conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);

if (!$conn) {
    echo "Error: Unable to connect to MySQL."; //indicate error
    die("Connection Failed: " . $conn->connect_error);//kill script
    //another option is to just redirect the page with an error
}

//get fields from post request
$username = $_POST["username"];
$pass = $_POST["pass"];


//construct SQL query:
$query = "select * from [TABLE NAME]"
    . " where username=" . $username
    . " and password=" . $password;

//connect the query; returns true if connection is
// successful, and returns false if not.
if (($rows=$conn->query($query)) === TRUE) {

    if($rows == 1) {
        echo "Login Succesful!";
        //here one would redirect to a user homepage
        // if they choose to implement one.
    }else{
        echo "Error: Incorrect login credentials!";
        //redirect approach back to login with input error
    }


} else {
    //another redirect approach can be used here
    echo "Error: " . $query . "<br>" . $conn->error;
}

?>

