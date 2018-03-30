<?php
include "page_top.php";

$order = $_GET['order'];
$type = $_GET['type'];

if ($type == "ASC") {
$typeclick = "DESC";
} else {
$typeclick = "ASC";
}
?>
<div class="title">Teachers List</div>
<table width="100%">
<tr>
<td class="toprow"><a href="?order=name&type=<?php echo"$typeclick"; ?>">Name</a></td>
<td class="toprow"><a href="?order=room&type=<?php echo"$typeclick"; ?>">Room</a></td>
<td class="toprow"><a href="?order=subject&type=<?php echo"$typeclick"; ?>">Subject</a></td>
</tr>
<?php
$teachers = mysql_query("SELECT * FROM sdb_teachers ORDER BY '$order' $type");

while($s = mysql_fetch_array($teachers))
{
$name = $s['name'];
$room = $s['room'];
$subject = $s['subject'];

echo "<tr>\n";
echo "<td class=\"midrow\">$name</td>\n";
echo "<td class=\"midrow\">$room</td>\n";
echo "<td class=\"midrow\">$subject</td>\n";
echo "</tr>\n";
}
?>
</table>
<?php
include "page_bottom.php";
?>
