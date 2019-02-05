<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>Alexa News Display</title>
</head>
<body>
<?php

// includes
include("../includes/conf.php");

	mysql_connect($host,$user,$pass);
	mysql_select_db($db);
$query = mysql_query('SELECT *, DATE_FORMAT(date, "%W %D %M %Y") AS nicedate FROM news ORDER BY id DESC');
while($output = mysql_fetch_assoc($query))
{
	echo $output['subject'].'<br />';
	echo $output['news'].'<br / >';
	echo $output['nicedate'].'<br / >';
	echo 'Posted by '.$output['postedby'];
	echo '<hr />'; 
}
?>
</body>
</html>
