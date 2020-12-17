<?
//mmcc
require_once "../Mobile_Detect.php";
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();
$userloginfulltxt="This is a  ".$deviceType."  ".htmlentities($_SERVER["HTTP_USER_AGENT"]);
//$dbcustcorectedtext=str_replace("(",">>",$userloginfulltxt);
//$dbcustcorectedtext2=str_replace(")",">>",$dbcustcorectedtext);
//test moodle admin pass @5%OPeWvH$

$user_ipp = getenv('REMOTE_ADDR');

$timee=date("Y.m.d H:i:s");

$dbcustname="moodle_cust_user_log";
$dbcusthost="localhost";
$dbcustuser="root";
$dbcustpasswd="glazegazeA1@#$%^&*()";
$dbcustconn=mysqli_connect($dbcusthost,$dbcustuser,$dbcustpasswd,$dbcustname);
$dbcustquery="INSERT INTO user_dev_list (device,ip,username,fullstring,timee)  VALUES('$deviceType','$user_ipp','$USER->username','$userloginfulltxt','$timee')";


if (mysqli_query($dbcustconn, $dbcustquery)) {
   // echo "New record created successfully";
} else {
    //echo "Error: " . $dbcustquery . "<br>" . mysqli_error($dbcustconn);
}

mysqli_close($dbcustconn);
//
?>
