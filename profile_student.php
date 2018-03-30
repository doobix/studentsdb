<?php
include "page_top.php";

$last_name = $_GET['last_name'];
$first_name = $_GET['first_name'];

$students = mysql_query("SELECT * FROM sdb_students WHERE last_name = '$last_name' AND first_name = '$first_name'");

while ($s = mysql_fetch_array($students))
{
$id = $s['id'];
$last_name = $s['last_name'];
$first_name = $s['first_name'];
$homeroom = $s['homeroom'];
$p1 = $s['p1'];
$p2 = $s['p2'];
$p3 = $s['p3'];
$p4 = $s['p4'];
$p5 = $s['p5'];
$p6 = $s['p6'];
$p7 = $s['p7'];

echo "<b>ID</b>: ".$id."<br />\n";
echo "<b>Last Name</b>: ".$last_name."<br />\n";
echo "<b>First Name</b>: ".$first_name."<br />\n";
echo "<b>Homeroom</b>: ".$homeroom."<br />\n";
echo "<b>1&deg;</b>: ".$p1."<br />\n";
echo "<b>2&deg;</b>: ".$p2."<br />\n";
echo "<b>3&deg;</b>: ".$p3."<br />\n";
echo "<b>4&deg;</b>: ".$p4."<br />\n";
echo "<b>5&deg;</b>: ".$p5."<br />\n";
echo "<b>6&deg;</b>: ".$p6."<br />\n";
echo "<b>7&deg;</b>: ".$p7."<br />\n";
}
include "page_bottom.php";
?>
