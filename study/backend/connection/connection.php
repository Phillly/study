<?php
	//database connection details
	$host = 'localhost';
	$user = 'root';
	$dbpass = '';
	$database = 'video';

	//connect to database with a try/catch statement
	//if the connection is not successful display the error message via database_error.php
	//the PDOException class represents the error raised by PDO
	//the PDO error is stored in the variable $e
	//the PDO error is returned as a string via the getMessage() function
try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
catch(PDOException $e)
    {
    echo "Connection failed: ";
    }
?>
