<?php
// output RSS for Amazon Flash Briefing
header('Content-type: application/rss+xml'); 

// includes
include("../includes/conf.php");

	mysql_connect($host,$user,$pass);
	mysql_select_db($db);

$query = mysql_query('SELECT *, DATE_FORMAT(date, "%Y-%m-%dT%H:%i:%s.0Z") AS zuludate FROM `news` ORDER BY id DESC');

echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>
<ttl>30</ttl>\n";


while($output = mysql_fetch_assoc($query))
{
	$subject=$output['subject'];
	$news=$output['news'];
	$date=$output['zuludate'];
	$uuid=$output['uuid'];

echo "<item>
<title>$subject</title>
<link>https://ccsmba.nicholastruscott.co.uk</link>
<pubDate>$date</pubDate>
<description>$subject: $news</description> 
<guid>urn:uuid:$uuid</guid>\n</item>\n";
}
echo "</channel>
</rss>"; 
?>
