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
$utaid2= $_POST['utaid2'];
$gender= $_POST['gender'];

$query1 = mysql_query("SELECT * FROM studentinfo WHERE utaid='$utaid2';");
$check = mysql_num_rows($query1);
if($check==1){
    $result = mysql_query("UPDATE studentinfo SET fname='$fname',mname='$mname',lname='$lname',gender='$gender',utaid='$utaid' WHERE utaid='$utaid2';");
    $num = mysql_num_rows($result);
}
else{
    $result = mysql_query("INSERT INTO a1700935_hello.studentinfo(fname,mname,lname,utaid,gender) VALUES('$fname','$mname','$lname','$utaid','$gender');");
    $num = mysql_num_rows($result);

}
//Query the table android login
//$query = mysql_query("INSERT INTO a1700935_hello.studentinfo(fname,mname,lname,utaid,gender) VALUES('$fname','$mname','$lname','$utaid','$gender');");

//
//$query1 = mysql_query("INSERT INTO studentinfo(netid)  SELECT login.netid FROM  login WHERE   login.utaid='1000994880'  AND  login.utaid=studentinfo.utaid  ");
//$query = mysql_query("INSERT INTO studentinfo(fname,mname,lname,utaid,gender) VALUES ('vinay','rameshbhai','shah','1000994879','male');");
//check if there any results returned


//echo $num;



//If a record was found matching the details entered in the query
//if($num != 0)
//{
//	echo "Success!";
//    	Create a while loop that places the returned data into an array
//  	while($list=mysql_fetch_assoc($query))
//	{
//		        Store the returned data into a variable
//         $output = $list;

//		        encode the returned data in JSON format
//    echo json_encode($output);

//}



//}

if($result)
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