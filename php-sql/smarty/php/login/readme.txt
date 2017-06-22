Copyright 2010 YCScripts
This script has been developed by Yanling Chin owner of YCScripts.

This is a very simple, basic usermanagement script. The script is well commented, so it's no problem to understand.
The script consist of the following files:

- config.php (database connection & check_email function)
- index.php (register, edit account)
- admin.php (view users, add, edit and delete user)
- user.sql (a MySQL database table)
- captcha/1.jpg (captcha images)
- captcha/2.jpg
- captcha/3.jpg
- captcha/4.jpg
- captcha/5.jpg
- captcha/6.jpg
- captcha/7.jpg

You can use this script as a basic to extend with additional features.
It uses PHP sessions for login authentication and captcha, salt + sha1 for password encryption.

The default login values admin:
Username: admin
Password: admin

User options:
	* login
	* registration (username, email, password)
	* edit account (change username, email, password)

Admin options:
	* login
	* add user (username, email, password, checkbox admin)
	* edit user (change username, email, password)
	* delete user
	* view users
	
Not implemented in this script:
	* activation account (activation email)
	* password forgotten


How to use this script?
- Extract the zip file
- Open config.php and change the database settings:
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "ycscripts";
- Open your database and import user.sql
- Go to /usermanagement-system in the browser and start using this system

That's it! If you have any comments or questions send me an email via YCScripts, http://ycscripts.co.cc