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
<div class="title">Students List</div>
<table width="100%">
<tr>
<td class="toprow"><a href="?order=last_name&type=<?php echo"$typeclick"; ?>">Last Name</a></td>
<td class="toprow"><a href="?order=first_name&type=<?php echo"$typeclick"; ?>">First Name</a></td>
<td class="toprow"><a href="?order=homeroom&type=<?php echo"$typeclick"; ?>">Homeroom</a></td>
<td class="toprow"><a href="?order=p1&type=<?php echo"$typeclick"; ?>">1&deg;</a></td>
<td class="toprow"><a href="?order=p2&type=<?php echo"$typeclick"; ?>">2&deg;</a></td>
<td class="toprow"><a href="?order=p3&type=<?php echo"$typeclick"; ?>">3&deg;</a></td>
<td class="toprow"><a href="?order=p4&type=<?php echo"$typeclick"; ?>">4&deg;</a></td>
<td class="toprow"><a href="?order=p5&type=<?php echo"$typeclick"; ?>">5&deg;</a></td>
<td class="toprow"><a href="?order=p6&type=<?php echo"$typeclick"; ?>">6&deg;</a></td>
<td class="toprow"><a href="?order=p7&type=<?php echo"$typeclick"; ?>">7&deg;</a></td>
</tr>
<?php
$students = mysql_query("SELECT * FROM sdb_students ORDER BY '$order' $type");

while($s = mysql_fetch_array($students))
{
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

echo "<tr>\n";
echo "<td class=\"midrow\">$last_name</td>\n";
echo "<td class=\"midrow\">$first_name</td>\n";
echo "<td class=\"midrow\">$homeroom</td>\n";
echo "<td class=\"midrow\"><a href=\"javascript:void(0);\" onclick=\"return overlib('<iframe src=\'profile_teacher.php?id=$p1\'></iframe>', STICKY, CAPTION, 'Teacher Profile', CENTER, BORDER, 0);\" onmouseout=\"nd();\">$p1</a></td>\n";
echo "<td class=\"midrow\"><a href=\"javascript:void(0);\" onclick=\"return overlib('<iframe src=\'profile_teacher.php?id=$p2\'></iframe>', STICKY, CAPTION, 'Teacher Profile', CENTER, BORDER, 0);\" onmouseout=\"nd();\">$p2</a></td>\n";
echo "<td class=\"midrow\"><a href=\"javascript:void(0);\" onclick=\"return overlib('<iframe src=\'profile_teacher.php?id=$p3\'></iframe>', STICKY, CAPTION, 'Teacher Profile', CENTER, BORDER, 0);\" onmouseout=\"nd();\">$p3</a></td>\n";
echo "<td class=\"midrow\"><a href=\"javascript:void(0);\" onclick=\"return overlib('<iframe src=\'profile_teacher.php?id=$p4\'></iframe>', STICKY, CAPTION, 'Teacher Profile', CENTER, BORDER, 0);\" onmouseout=\"nd();\">$p4</a></td>\n";
echo "<td class=\"midrow\"><a href=\"javascript:void(0);\" onclick=\"return overlib('<iframe src=\'profile_teacher.php?id=$p5\'></iframe>', STICKY, CAPTION, 'Teacher Profile', CENTER, BORDER, 0);\" onmouseout=\"nd();\">$p5</a></td>\n";
echo "<td class=\"midrow\"><a href=\"javascript:void(0);\" onclick=\"return overlib('<iframe src=\'profile_teacher.php?id=$p6\'></iframe>', STICKY, CAPTION, 'Teacher Profile', CENTER, BORDER, 0);\" onmouseout=\"nd();\">$p6</a></td>\n";
echo "<td class=\"midrow\"><a href=\"javascript:void(0);\" onclick=\"return overlib('<iframe src=\'profile_teacher.php?id=$p7\'></iframe>', STICKY, CAPTION, 'Teacher Profile', CENTER, BORDER, 0);\" onmouseout=\"nd();\">$p7</a></td>\n";
echo "</tr>\n";
}
?>
</table>
<?php
include "page_bottom.php";
?>
