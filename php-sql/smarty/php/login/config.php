<!--
Copyright 2010 YCScripts
This script has been developed by Yanling Chin owner of YCScripts.
This file is part of the Usermanagement System script.

Usermanagement System is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Usermanagement System is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Usermanagement System.  If not, see <http://www.gnu.org/licenses/>.
-->
<?php
$host = "localhost";
$username = "sabor_dbuser";
$password = "ueSCLoft";
$db = "sabor_fortunet";
$res = mysql_connect($host, $username, $password);
if (!$res) die("Could not connect to the server, mysql error: ".mysql_error($res));
$res = mysql_select_db($db);
if (!$res) die("Could not connect to the database, mysql error: ".mysql_error($res));

date_default_timezone_set("Europe/Warsaw");

function check_email($email) {
	// First, we check that there's one @ symbol, and that the lengths are right
	 if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) { 
		// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
		return false; 
	 } 
	 // Split it into sections to make life easier 
	 $email_array = explode("@", $email);
	 $local_array = explode(".", $email_array[0]);
	 for ($i = 0; $i < sizeof($local_array); $i++) {
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
			return false;
		}
	}
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { 
		// Check if domain is IP. If not, it should be valid domain name 
		$domain_array = explode(".", $email_array[1]); 
		if (sizeof($domain_array) < 2) { 
			return false; // Not enough parts to domain
		}
		for ($i = 0; $i < sizeof($domain_array); $i++) { 
			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) { 
				return false;
			}
		}
	}
	return true;
}
?>