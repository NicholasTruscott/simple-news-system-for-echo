<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alexa News Add</title>
</head>

<body>
<form method="post" action="#"> 
	Posted By:<br /><input name="postedby" id="postedby" type="Text" size="50" maxlength="50"><br />
	Subject:<br /><input name="subject" id="subject" type="Text" size="50" maxlength="50"><br />
	<textarea name="news" id="news" cols="80" rows="25" maxlength="4000"></textarea><br />
	<input type="Submit" name="submit" id="submit" value="Enter News">
</form>
<?php

// includes
include("../includes/conf.php");

function clear($message)
{
	if(!get_magic_quotes_gpc())
		$message = addslashes($message);
	$message = strip_tags($message);
	$message = htmlentities($message);
	return trim($message);
}
if ($_POST['submit'])
{ 
	if (empty($_POST['postedby']))
		die('Enter a name.'); 
	else if (empty($_POST['subject']))
		die('Enter a subject.'); 
	else if (empty($_POST['news']))
		die('Enter an article.'); 
	$postedby = clear($_POST['postedby']); 
	$subject = clear($_POST['subject']); 
	$news = clear($_POST['news']);
	$uuid = guid(); 
	mysql_connect($host,$user,$pass);
	mysql_select_db($db);
	if(mysql_query("INSERT INTO news (id , postedby , news , subject , uuid, date) VALUES ('', '$postedby', '$news', '$subject', '$uuid', NOW() )"))
		echo 'News Entered.';
	mysql_close(); 
}
?>
</body>
</html>
