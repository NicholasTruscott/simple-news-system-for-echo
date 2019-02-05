<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>Alexa News Delete</title>
<script type="text/javascript">
function check(id){
	if (confirm("Are you sure you want to delete this news item?"))
		this.location.href = "?id="+id;
}</script>
</head>
<body>
<?php

// includes
include("../includes/conf.php");

	mysql_connect($host,$user,$pass);
	mysql_select_db($db);
if(!$_GET['id'])
{
	$query = mysql_query('SELECT * FROM news ORDER BY id DESC');
	while($output = mysql_fetch_assoc($query)) 
		echo $output['subject'].' &raquo; <a href="#" onclick="check('.$output['id'].'); return false;">Delete</a><br />';
}
else
{
	$id = $_GET['id']; 
	mysql_query("DELETE FROM news WHERE id = $id LIMIT 1"); 
	echo 'News Deleted.';
}
?>
</body>
</html>
