<?php
include "page_top.php";

$id = $_GET['id'];

$teachers = mysql_query("SELECT * FROM sdb_teachers WHERE name = '$id'");

while($s = mysql_fetch_array($teachers))
{
$name = $s['name'];
$room = $s['room'];
$subject = $s['subject'];

echo "<b>Name</b>: ".$name."<br />\n";
echo "<b>Room</b>: ".$room."<br />\n";
echo "<b>Subject</b>: ".$subject."<br />\n";
}
include "page_bottom.php";
?>
