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
}


//receive post from form
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$userName = $_POST["username"];
$email = $_POST["email"];
$phone1 = $_POST["phoneOne"];
$phone2 = $_POST["phoneTwo"];

/*
 * Import Note:
 * I have ommited some lines of code that involve
 * certain security techniques for the safety of
 * the website in which this example derives from.
 *
 * That said I highly encourage anyone following
 * this implementation to incorporate some form of
 * security through encryption or otherwise
 * */
$password = $_POST["password"];



//validate the uniqueness of the username
$usernameValidate = "select * from CUSTOMER where username=" . $username;

//check database for netry
if (($rows=$conn->query($query)) === TRUE) {

    if(mysqli_num_rows($rows) == 1){
        //handle already existing username
        //a redirect approach back to login.html for ex.
    }

}else  {
    //handle bad connection
    echo "Error: " . $query . "<br>" . $conn->error;
}

//structuring query. input validation handled in firstQuery and login.html

$query = "insert into CUSTOMER(ID,firstname,lastname,phone1,phone2, username, email, password) 
                        VALUES(3,'" . $fName . "','" . $lName . "',"
                        . $phone1 . "," . $phone2 . ",'"
                        . $userName . "','"
                        . $email. "','"
                        . $password ."')";

//connect the query; returns true if
// connection is successful, and returns false if not.
if (($rows=$conn->query($query)) === TRUE) {

    if(mysqli_num_rows($rows) == 1){
        //handle successful registration

    }


} else {
    //handle bad connection
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();//close page

//redirect to new page, login or success page
header("location: login.html");

?>