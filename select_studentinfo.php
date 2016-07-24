<?php


$dbhost = "mysql5.000webhost.com"; //92.4.131.132 //127.0.0.1 //10.0.2.2
$dbuser = "a1700935_hello";
$dbpass = "lol123";
$dbdb = "a1700935_hello";


$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("connection error123");
mysql_select_db($dbdb) or die("database selection error");
//echo "hii22";

//Retrieve the login details via POST
$utaid=$_POST['utaid'];
//$utaid='1000998877';
//echo $utaid;
$result = mysql_query("SELECT * FROM a1700935_hello.studentinfo WHERE utaid='$utaid';");
//echo "h1";
$num = mysql_num_rows($result);
//echo $num;

if($num==1)
{
    while($row = mysql_fetch_assoc($result))
    {
//		echo"h2";
        //   		$fname= $row['fname'];
//		echo $fname;
        //   		$lname= $row['lname'];
        // 		$mname= $row['mname'];
//		$gender=$row['gender'];
//		$response["fname"] = $fname;
        //         		$response["lname"] = $lname;
//		$response["mname"] = $mname;
//		$response["gender"] = $gender;
        $output = $row;

//		        encode the returned data in JSON format
        echo json_encode($output);




    }
}
//echo json_encode($response);
mysql_close();
?>