<?php
$dbhost = "studentsdb.seewes.com";
$dbname = "seewes_studentdb";
$dbuser = "seewes_studentdb";
$dbpass = "StudentsDatabase12345";

mysql_connect ("$dbhost", "$dbuser", "$dbpass");
mysql_select_db("$dbname");
?>
