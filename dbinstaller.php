<?php
include "page_top.php";

mysql_connect ("$dbhost", "$dbuser", "$dbpass");
mysql_select_db("$dbname");

echo "Creating students table.<br />\n";
$sql_students = 'CREATE TABLE sdb_students (
id INT(255) not null AUTO_INCREMENT,
last_name VARCHAR(255),
first_name VARCHAR(255),
homeroom VARCHAR(255),
p1 VARCHAR(255),
p2 VARCHAR(255),
p3 VARCHAR(255),
p4 VARCHAR(255),
p5 VARCHAR(255),
p6 VARCHAR(255),
p7 VARCHAR(255),
PRIMARY KEY(id)
)';
mysql_query($sql_students);
echo "Done creating students table.<br />\n";

echo "Creating teachers table.<br />\n";
$sql_teachers = 'CREATE TABLE sdb_teachers (
id INT(255) not null AUTO_INCREMENT,
name VARCHAR(255),
room VARCHAR(255),
subject VARCHAR(255),
PRIMARY KEY(id)
)';
mysql_query($sql_teachers);
echo "Done creating teachers table.<br />\n";
echo "<br />\n";
echo "Delete this installer from the server now.<br />\n";

include "page_bottom.php";
?>
