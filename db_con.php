
<?php
 const HOSTNAME  = 'localhost'; // server
const MYSQLUSER = 'root'; // database user
const MYSQLPASS = 'root'; // database password
const MYSQLDB   = 'sakila'; // database name */

/* const HOSTNAME = 'fernandogestomoreno.dk.mysql'; // server
const MYSQLUSER = 'fernandogestomoreno_dk'; // database user
const MYSQLPASS = password'; // database password
const MYSQLDB = 'fernandogestomoreno_dk'; // database name
// Create database connection object*/

$con = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
// fail on error
if ($con->connect_error){
	die('Error: '.$con->connect_error.' ('.$con->connect_errno.')');
}
// set charset utf8 to match coallation in db
$con->set_charset('utf8');
