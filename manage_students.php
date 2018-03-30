<?php
include "page_top.php";

if ($_POST['edit']) {
$ui = $_GET['id'];
$ulast_name = $_POST['last_name'];
$ufirst_name = $_POST['first_name'];
$uhomeroom = $_POST['homeroom'];
$up1 = $_POST['p1'];
$up2 = $_POST['p2'];
$up3 = $_POST['p3'];
$up4 = $_POST['p4'];
$up5 = $_POST['p5'];
$up6 = $_POST['p6'];
$up7 = $_POST['p7'];

$result = mysql_query("UPDATE sdb_students SET last_name = '$ulast_name', first_name = '$ufirst_name', homeroom = '$uhomeroom', p1 = '$up1', p2 = '$up2', p3 = '$up3', p4 = '$up4', p5 = '$up5', p6 = '$up6', p7 = '$up7' WHERE id = '$ui'");
echo "<div class=\"good\">$last_name, $first_name was edited!</div>\n";
}

if ($_POST['new']) {
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$homeroom = $_POST['homeroom'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];
$p7 = $_POST['p7'];

$addstudent = ("INSERT INTO sdb_students (last_name,first_name,homeroom,p1,p2,p3,p4,p5,p6,p7)".
"VALUES ('$last_name','$first_name','$homeroom','$p1','$p2','$p3','$p4','$p5','$p6','$p7')");

$check = "SELECT * FROM sdb_students WHERE last_name = '$last_name' AND first_name = '$first_name'";
$checkstudent = mysql_query($check);
$num_rows = mysql_num_rows($checkstudent);

if ($num_rows > "0") {
echo "<div class=\"bad\">$last_name, $first_name is already in the database.</div>\n";
} elseif (mysql_query($addstudent)) {
echo "<div class=\"good\">$last_name, $first_name was added to the database.</div>\n";
}
}

if ($_GET['delete'] == "true") {
$i = $_GET['i'];

echo "<div class=\"bad\">Are you sure you want to delete student #$i?</div>\n";
echo "<a href=\"$PHP_SELF?delete=yes&i=$i\">Yes, delete</a> - <a href=\"$PHP_SELF?delete=no&i=$i\">No, don't delete</a><br />\n";
} elseif ($delete == "no") {
echo "<div class=\"good\">Student #$i NOT deleted!</div>\n";
} elseif ($delete == "yes") {
$delete = MYSQL_QUERY("DELETE FROM sdb_students WHERE id = '$i'");
echo "<div class=\"bad\">Student #$i deleted!</div>\n";
}
?>
<div class="title">Manage Students</div>
<table width="100%">
<tr>
<td class="toprow">ID</td>
<td class="toprow">Last Name</td>
<td class="toprow">First Name</td>
<td class="toprow">Homeroom</td>
<td class="toprow">1&deg;</td>
<td class="toprow">2&deg;</td>
<td class="toprow">3&deg;</td>
<td class="toprow">4&deg;</td>
<td class="toprow">5&deg;</td>
<td class="toprow">6&deg;</td>
<td class="toprow">7&deg;</td>
<td class="toprow">Manage</td>
</tr>
<?php
$students = mysql_query("SELECT * FROM sdb_students order by last_name ASC");
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

echo "<tr>\n";
echo "<td class=\"midrow\">$id</td>\n";
echo "<td class=\"midrow\">$last_name</td>\n";
echo "<td class=\"midrow\">$first_name</td>\n";
echo "<td class=\"midrow\">$homeroom</td>\n";
echo "<td class=\"midrow\">$p1</td>\n";
echo "<td class=\"midrow\">$p2</td>\n";
echo "<td class=\"midrow\">$p3</td>\n";
echo "<td class=\"midrow\">$p4</td>\n";
echo "<td class=\"midrow\">$p5</td>\n";
echo "<td class=\"midrow\">$p6</td>\n";
echo "<td class=\"midrow\">$p7</td>\n";
echo "<td class=\"midrow\"><a href=\"$PHP_SELF?update=true&i=$id\">Edit</a> | <a href=\"$PHP_SELF?delete=true&i=$id\">Delete</a></td>\n";
echo "</tr>\n";
}
?>
</table>
<?php
if ($_GET['update'] == "true") {

$result2 = mysql_query("SELECT * FROM sdb_teachers ORDER BY name ASC");
while ($s = mysql_fetch_array($result2))
{
$name = $s['name'];
$teacherlist .= "<option value=\"$name\">$name</option>\n";
}

$i = $_GET['i'];

$result = mysql_query("SELECT * FROM sdb_students WHERE id = '$i'");
while ($s = mysql_fetch_array($result))
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
?>
<br />
<div class="title">Students Form</div>
<form method="post" action="<?php echo"$PHP_SELF?update=done&id=$id"; ?>">
<table>
<tr>
<td>Last Name:</td>
<td><input type="text" name="last_name" value="<?php echo"$last_name"; ?>" /></td>
</tr>
<tr>
<td>First Name:</td>
<td><input type="text" name="first_name" value="<?php echo"$first_name"; ?>" /></td>
</tr>
<tr>
<td>Homeroom:</td>
<td><input type="text" name="homeroom" value="<?php echo"$homeroom"; ?>" /></td>
</tr>
<tr>
<td>1&deg;:</td>
<td><select name="p1"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>2&deg;:</td>
<td><select name="p2"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>3&deg;:</td>
<td><select name="p3"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>4&deg;:</td>
<td><select name="p4"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>5&deg;:</td>
<td><select name="p5"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>6&deg;:</td>
<td><select name="p6"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>7&deg;:</td>
<td><select name="p7"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td><input type="submit" name="new" value="Add Student" /></td>
<td><input type="submit" name="edit" value="Edit Student" /></td>
</tr>
</table>
</form>
<?php
}
} else {
$result2 = mysql_query("SELECT * FROM sdb_teachers ORDER BY name ASC");
while ($s = mysql_fetch_array($result2))
{
$name = $s['name'];
$teacherlist .= "<option value=\"$name\">$name</option>";
}
?>
<br />
<div class="title">Students Form</div>
<form method="post" action="<?php echo"$PHP_SELF"; ?>">
<table>
<tr>
<td>Last Name:</td>
<td><input type="text" name="last_name" /></td>
</tr>
<tr>
<td>First Name:</td>
<td><input type="text" name="first_name" /></td>
</tr>
<tr>
<td>Homeroom:</td>
<td><input type="text" name="homeroom" /></td>
</tr>
<tr>
<td>1&deg;:</td>
<td><select name="p1"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>2&deg;:</td>
<td><select name="p2"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>3&deg;:</td>
<td><select name="p3"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>4&deg;:</td>
<td><select name="p4"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>5&deg;:</td>
<td><select name="p5"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>6&deg;:</td>
<td><select name="p6"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td>7&deg;:</td>
<td><select name="p7"><?php echo "$teacherlist";?></select></td>
</tr>
<tr>
<td colspan="2">
<input type="submit" name="new" value="Add Student" />
</td>
</tr>
</table>
</form>
<?php
}
include "page_bottom.php";
?>
