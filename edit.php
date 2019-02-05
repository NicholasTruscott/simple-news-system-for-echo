<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alexa News Edit</title>
</head>

<body>
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
	mysql_connect($host,$user,$pass);
	mysql_select_db($db);
if(!$_GET['id'])
{
	$query = mysql_query("SELECT * FROM news ORDER BY id DESC");
	echo 'Edit<hr />';
	while($output = mysql_fetch_assoc($query))
		echo $output['subject'].' &raquo; <a href="?id='.$output['id'].'">Edit</a><br />';
}
else
{
	if ($_POST['submit'])
	{
		$postedby = clear($_POST['postedby']); 
		$subject = clear($_POST['subject']); 
		$news = clear($_POST['news']); 
		$id = $_GET['id']; 
		mysql_query("UPDATE news SET postedby='$postedby', news='$news', subject='$subject' WHERE id='$id'");
		mysql_close();
		echo 'News Edited.';
	}
	else
	{
		$id = $_GET['id']; 
		$query = mysql_query("SELECT * FROM news WHERE id='$id'");
		$output = mysql_fetch_assoc($query);
?>
<form method="post" action="?id=<? echo $output['id']; ?>">
Editing <? echo $output['subject']; ?><hr />
Posted By:<input name="postedby" id="postedby" type="Text" size="50" maxlength="50" value="<? echo $output['postedby']; ?>"><br />
Subject:<input name="subject" id="subject" type="Text" size="50" maxlength="50" value="<? echo $output['subject']; ?>"><br />
News:<textarea name="news" cols="80" rows="25"><? echo $output['news']; ?></textarea><br />
<input type="Submit" name="submit" value="Enter information">
</form>
<?php }} ?>

</body>
</html>
