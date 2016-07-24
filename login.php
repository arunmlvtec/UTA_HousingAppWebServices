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
$username = $_POST['netid1'];
$password = $_POST['password1'];
//$password ='123456';
$password=md5($password);

//$username='vvb1789';
$result = mysql_query("SELECT * FROM a1700935_hello.login WHERE netid='$username' AND password='$password' ;");

$row = mysql_fetch_assoc($result);
$utaid=$row['utaid'];

$num = mysql_num_rows($result);

//If a record was found matching the details entered in the query
if($num == 1)
{
//	$result = mysql_query("SELECT * FROM a1700935_hello.login WHERE netid='$username' AND //password='$password' ;");	


    $query1 = mysql_query("SELECT * FROM studentinfo WHERE utaid='$utaid';");
    $check = mysql_num_rows($query1);
    if($check==1){

        $response["firsttime"]=1;
    }
    else
        $response["firsttime"]=0;


//	while($row = mysql_fetch_assoc($result))
    {
//    		$utaid= $row['utaid'];
        //	echo $utaid;         
    }
    $response["utaid"] = $utaid;

    $response["success"] = 1;
    $response["message"] = 'Congratulations We idetify You as a correct User!';

    echo json_encode($response);

}
else
{
    $response["success"] = 0;
    $response["message"] = 'Invalid Id or Password!';
    echo json_encode($response);
}
//close the connection
mysql_close();

?>