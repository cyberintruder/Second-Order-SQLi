<!DOCTYPE html>
<html>
<head>
<title>Insert Details </title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<?php
if(isset($_REQUEST["submit"]))
{
	$servername = "localhost";
	$username = "root";
	$password = "toor";
	$dbname = "dvwa";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	$sql3 = "SET @@global.sql_mode= ''";
        if ($conn->query($sql3) === TRUE) {
                echo "";
        }else { echo "Error in executing query: " . $conn->error;  } 


	echo "Connected successfully";
	// sql to create tables
	$sql = "CREATE TABLE IF NOT EXISTS profile(id int NOT NULL, user LONGTEXT NOT NULL, fname LONGTEXT, lname LONGTEXT, PRIMARY KEY(id) )";
	$sql2 = "CREATE TABLE IF NOT EXISTS pii(user LONGTEXT NOT NULL, SALARY BIGINT, BankAccount LONGTEXT, PAN LONGTEXT )";

	if ($conn->query($sql) === TRUE) {
    		echo "Table <b>Profile</b> created 0r selected successfully";
	} 
	else { echo "Error creating table: " . $conn->error;  }
	echo 'test';
	if ($conn->query($sql2) === TRUE) {
    		echo "Table <b>PII</b> created 0r selected successfully";
	} 
	else { echo "Error creating table: " . $conn->error;  }
       
        //Fetching parameters from Users input
	$id = addslashes($_POST[ 'id' ]); 
	echo $id;
	$user = addslashes($_POST[ 'user' ]); 
	$fname = addslashes($_POST[ 'fname' ]); 
	$lname = addslashes($_POST[ 'lname' ]); 
	$SALARY = addslashes($_POST[ 'SALARY' ]); 
	$BankAccount = addslashes($_POST[ 'BankAccount' ]); 
	$PAN = addslashes($_POST[ 'PAN' ]); 

        //Inserting data into profile table
	$sql_statement = "INSERT INTO profile (id, user, fname, lname) values('$id','$user', '$fname', '$lname')";
	echo " sql query used is: ". $sql_statement. "<br/>";
	if ($conn->query($sql_statement) === TRUE) {
    		echo "Data inserted to  profile table successfully";
	} 
	else {
    	echo "Error inserting data to profile table: " . $conn->error;
	}
	
       //inserting data into pii table
	$sql_statement2 = "INSERT INTO pii ( user, SALARY, BankAccount, PAN) values('$user','$SALARY', '$BankAccount', '$PAN')";

	echo " sql query used is: ". $sql_statement2. "<br/>";
	
	if ($conn->query($sql_statement2) === TRUE) {
    		echo "Data inserted to  <b> pii</b> table successfully";
	} 
	else {
    	echo "Error inserting data to <b>pii</b> table: " . $conn->error;
	}
	echo "<a href=./getdata.php> Click Here to getdata page</a>";	
	$conn->close();
}
?>

<body>
<div id="main">
<h1>Insert your details</h1>
<div id="login">
<form action="insert.php" name="foo" method="post">
<label>User :</label>
<input id="user" name="user" placeholder="user" type="text">
<label>id:</label>
<input id="id" name="id" placeholder="id" type="text">
<label>First Name :</label>
<input id="fname" name="fname" placeholder="fname" type="text">
<label>Last Name :</label>
<input id="lname" name="lname" placeholder="lname" type="text">
<label>Salary :</label>
<input id="SALARY" name="SALARY" placeholder="SALARY" type="text">
<label>BankAccount:</label>
<input id="BankAccount" name="BankAccount" placeholder="BankAccount" type="text">
<label>PAN :</label>
<input id="PAN" name="PAN" placeholder="PAN" type="text">
<input name="submit" type="submit" value="submit">
</form>
</div>
</div>
</body>
</html>
