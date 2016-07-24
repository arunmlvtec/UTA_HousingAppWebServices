<?php
//turn off error reporting
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

//Create fields for the database
//server, username, password, database

$dbhost = "mysql5.000webhost.com"; //92.4.131.132 //127.0.0.1 //10.0.2.2
$dbuser = "a1700935_hello";
$dbpass = "lol123";
$dbdb = "a1700935_hello";


//echo $dbdb;

//connect to mySQL
$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("connection error123");

//Select the database
mysql_select_db($dbdb)or die("database selection error");


//Retrieve the login details via POST
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$utaid= $_POST['utaid'];
$gender= $_POST['gender'];



//Query the table android login
$query = mysql_query("INSERT INTO a1700935_hello.studentinfo(fname,mname,lname,utaid,gender) VALUES('$fname','$mname','$lname','$utaid','$gender');");



//check if there any results returned
$num = mysql_num_rows($query);

echo $num;

if($query)
{
    $response["success"] = 1;
    $response["message"] = 'Congratulations You Have Registered Successfully!';
    echo json_encode($response);

}
else
{
    $response["success"] = 0;
    $response["message"] = 'Already Registered!';
    echo json_encode($response);
}

//close the connection
mysql_close();

?>