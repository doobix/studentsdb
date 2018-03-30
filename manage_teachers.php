<?php
include "page_top.php";

if ($_POST['edit']) {
$ui = $_GET['id'];
$uname = $_POST['name'];
$uroom = $_POST['room'];
$usubject = $_POST['subject'];

$result = MYSQL_QUERY("UPDATE sdb_teachers SET name = '$uname', room = '$uroom', subject = '$usubject' WHERE id = '$ui'");
echo "<div class=\"good\">$name was edited!</div><br />\n";
}

if ($_POST['new']) {
$name = $_POST['name'];
$room = $_POST['room'];
$subject = $_POST['subject'];

$addteacher = ("INSERT INTO sdb_teachers (name,room,subject)".
"VALUES ('$name','$room','$subject')");

$check = "SELECT * FROM sdb_teachers WHERE name = '$name'";
$checkteacher = mysql_query($check);
$num_rows = mysql_num_rows($checkteacher);

if ($num_rows > "0") {
echo "<div class=\"bad\">$name is already in the database.</div>\n";
} elseif (mysql_query($addteacher)) {
echo "<div class=\"good\">$name was added to the database.</div>\n";
}
}

if ($_GET['delete'] == "true") {
$i = $_GET['i'];
echo "<div class=\"bad\">Are you sure you want to delete teacher #$i?</div>\n";
echo "<a href=\"$PHP_SELF?delete=yes&i=$i\">Yes, delete</a> - <a href=\"$PHP_SELF?delete=no&i=$i\">No, don't delete</a><br />\n";
} elseif ($delete == "no") {
echo "<div class=\"good\">Teacher #$i NOT deleted!</div>\n";
} elseif ($delete == "yes") {
$delete = MYSQL_QUERY("DELETE FROM sdb_teachers WHERE id = '$i'");
echo "<div class=\"bad\">Teacher #$i deleted!</div>\n";
}
?>
<div class="title">Manage Teachers</div>
<table width="100%">
<tr>
<td class="toprow">ID</td>
<td class="toprow">Name</td>
<td class="toprow">Room</td>
<td class="toprow">Subject</td>
<td class="toprow">Manage</td>
</tr>
<?php
$teachers = mysql_query("SELECT * FROM sdb_teachers order by name ASC");
while ($s = mysql_fetch_array($teachers))
{
$id = $s['id'];
$name = $s['name'];
$room = $s['room'];
$subject = $s['subject'];

echo "<tr>\n";
echo "<td class=\"midrow\">$id</td>\n";
echo "<td class=\"midrow\">$name</td>\n";
echo "<td class=\"midrow\">$room</td>\n";
echo "<td class=\"midrow\">$subject</td>\n";
echo "<td class=\"midrow\"><a href=\"$PHP_SELF?update=true&i=$id\">Edit</a> | <a href=\"$PHP_SELF?delete=true&i=$id\">Delete</a></td>\n";
echo "</tr>\n";
}
?>
</table>
<?php
if ($_GET['update'] == "true") {

$i = $_GET['i'];

$result = mysql_query("SELECT * FROM sdb_teachers WHERE id = '$i'");
while ($s = mysql_fetch_array($result))
{
$id = $s['id'];
$name = $s['name'];
$room = $s['room'];
$subject = $s['subject'];
?>
<br />
<div class="title">Teachers Form</div>
<form method="post" action="<?php echo"$PHP_SELF?update=done&id=$id"; ?>">
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="name" value="<?php echo"$name"; ?>" /></td>
</tr>
<tr>
<td>Room:</td>
<td><input type="text" name="room" value="<?php echo"$room"; ?>" /></td>
</tr>
<tr>
<td>Subject:</td>
<td><input type="text" name="subject" value="<?php echo"$subject"; ?>" /></td>
</tr>
<tr>
<td><input type="submit" name="new" value="Add Teacher" /></td>
<td><input type="submit" name="edit" value="Edit Teacher" /></td>
</tr>
</table>
</form>
<?php
}
} else {
?>
<br />
<div class="title">Teachers Form</div>
<form method="post" action="<?php echo"$PHP_SELF"; ?>">
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="name" /></td>
</tr>
<tr>
<td>Room:</td>
<td><input type="text" name="room" /></td>
</tr>
<tr>
<td>Subject:</td>
<td><input type="text" name="subject" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="new" value="Add Teacher" /></td>
</tr>
</table>
</form>
<?php
}
include "page_bottom.php";
?>
