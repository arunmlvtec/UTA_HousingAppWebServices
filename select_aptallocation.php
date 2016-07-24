<?php


$dbhost = "mysql5.000webhost.com"; //92.4.131.132 //127.0.0.1 //10.0.2.2
$dbuser = "a1700935_hello";
$dbpass = "lol123";
$dbdb = "a1700935_hello";


$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("connection error123");
mysql_select_db($dbdb) or die("database selection error");
//echo "hii22";

//Retrieve the login details via POST
//$utaid=$_POST['utaid'];
$utaid='1000991789';

$result = mysql_query("SELECT * FROM aptallocation WHERE utaid='$utaid';");

while($row = mysql_fetch_assoc($result))
{
    $apt_name= $row['apt_name'];
    $appdate= $row['appdate'];
    $edate= $row['edate'];
    $edate1= substr($edate,0,10);
    $ldate=$row['ldate'];
    $ldate1= substr($ldate,0,10);

    $eyear=substr($edate1, 0, 4);
    $emonth=substr($edate1, -5, 2);
    $eday=substr($edate1, 8, 9);

    $lyear=substr($ldate1, 0, 4);
    $lmonth=substr($ldate1, -5, 2);
    $lday=substr($ldate1, 8, 9);


    $response["apt_name"] = $apt_name;
    $response["appdate"] = $appdate;

    $response["eyear"] = $eyear;
    $response["emonth"] = $emonth;
    $response["eday"] = $eday;


    $response["lyear"] = $lyear;
    $response["lmonth"] = $lmonth;
    $response["lday"] = $lday;

    $response["edate"] = $edate1;
    $response["ldate"] = $ldate1;
    echo json_encode($response);

}

mysql_close();
?>