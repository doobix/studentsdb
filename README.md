# Students Database

This script was made for anyone who wants to keep a database of 
students and teachers in a school.

## Features:

* Students' first and last names
* Students' homeroom
* Students' classes from 1° to 7°
* Teachers' names
* Teachers' room number
* Teachers' subject
* Ability to sort list of students and list of teachers
* Ability to click name of teacher to view room number and subject

## Installation:

1. Edit dbconfig.php with notepad and enter your MySQL information.
2. Run dbinstaller.php and delete it from the server when it's done.

## Screenshots:

![Manage Students](https://raw.githubusercontent.com/doobix/studentsdb/master/screenshots/manage_students.png)

![Manage Teachers](https://raw.githubusercontent.com/doobix/studentsdb/master/screenshots/manage_teachers.png)

![View Students](https://raw.githubusercontent.com/doobix/studentsdb/master/screenshots/view_students.png)

![View Teachers](https://raw.githubusercontent.com/doobix/studentsdb/master/screenshots/view_teachers.png)


## Files included:

sql folder with 2 sql files - For creating the tables manually

dbconfig.php - MySQL database information

dbinstaller.php - Installs the tables needed in your database

manage_students.php - Add, Edit, and Delete students here

manage_teachers.php - Add, Edit, and Delete teachers here

page_bottom.php - HTML code for the bottom of the pages

page_overlib.js - Javascript code for popup box

page_style.css - CSS code to change the way the pages look

page_top.php - HTML code for the top of the pages

profile_student.php - For viewing one student's information (ex: profile_student.php?last_name=Smith&first_name=John)

profile_teacher.php - For viewing one teacher's information (ex: profile_teacher.php?id=Mr. Smith)

view_students.php - For viewing all the students in the database

view_teachers.php - For viewing all the teachers in the database

## Updates:

v1.01 - Fixed bug with adding 2 students with the same last name

v1.00 - Initial Release

## License

[MIT](/LICENSE)
