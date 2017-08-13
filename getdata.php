<!DOCTYPE html>
<html>
<head>
<title>Get User Details </title>
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

	//echo "Connected successfully";
	$id = $_POST[ 'ID' ]; 
	$sql = "SELECT * FROM profile where id='$id'";
	echo " You ran the sql query =". $sql. "<br/>";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
    		// output data of each row
    		while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$user = $row["user"];
			$fname = $row["fname"];
			$lname = $row["lname"];
			echo "<p> User Name: <b style=color:red;font-size:20px; font-family:raleway;border:2px solid #ccc;margin-top:10px > ".$user."</b></p>";
			echo "<p> ID: <b style=color:red;font-size:20px; font-family:raleway;border:2px solid #ccc;margin-top:10px > ".$id."</b></p>";
			echo "<p> First Name: <b style=color:red;font-size:20px; font-family:raleway;border:2px solid #ccc;margin-top:10px > ".$fname."</b></p>";
			echo "<p> Last Name: <b style=color:red;font-size:20px; font-family:raleway;border:2px solid #ccc;margin-top:10px > ".$lname."</b></p>";

			$sql2 = "SELECT * FROM pii  where user='$user'"; //payload executes here -interanl query
			echo "<i> internal query executed to fetch PII details.</i> ". $sql2. "<br/>";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows > 0)
			{
                		while($row2 = $result2->fetch_assoc()) {
	                        	$user2 = $row2["user"];
        	                	$SALARY = $row2["SALARY"];
                	        	$BankAccount = $row2["BankAccount"];
                        		$PAN = $row2["PAN"];

					echo "<p> User Name: <b style=color:red;font-size:20px; font-family:raleway;border:2px solid #ccc;margin-top:10px > ".$user."</b></p>";
					echo "<p> SALARY : <b style=color:red;font-size:20px; font-family:raleway;border:2px solid #ccc;margin-top:10px > ".$SALARY."</b></p>";
					echo "<p> BankAccount: <b style=color:red;font-size:20px; font-family:raleway;border:2px solid #ccc;margin-top:10px > ".$BankAccount."</b></p>";
					echo "<p> PAN Number: <b style=color:red;font-size:20px; font-family:raleway;border:2px solid #ccc;margin-top:10px > ".$PAN."</b></p>";
    				}
			}
			else {	echo "0 results from payload query";	}
		}
	} 
	else {	echo "0 results";	}

	
	$conn->close();

}

?>
<body>
<div id="main">
<h1>Get Details</h1>
<div id="login">
<form action="getdata.php" name="foo" method="post">
<label>ID :</label>
<input id="ID" name="ID" placeholder="ID" type="text">
<input name="submit" type="submit" value="submit">
</form>
</div>
</div>
<div id="main2">
<div id="output">
<h3>your details</h3>
<form >
<label>User :</label>
<input id="user" name="user" placeholder="<?php echo $user; ?>" type="text">
<label>id:</label>
<input id="id" name="id" placeholder="<?php echo $id; ?>" type="text">
<label>First Name :</label>
<input id="fname" name="fname" placeholder="<?php echo $fname; ?>" type="text">
<label>Last Name :</label>
<input id="lname" name="lname" placeholder="<?php echo $lname; ?>" type="text">
<label>Salary :</label>
<input id="SALARY" name="SALARY" placeholder="<?php echo $SALARY; ?>" type="text">
<label>BankAccount:</label>
<input id="BankAccount" name="BankAccount" placeholder="<?php echo $BankAccount; ?>" type="text">
<label>PAN :</label>
<input id="PAN" name="PAN" placeholder="<?php echo $PAN ?>" type="text">
<input name="submit" type="submit" value="submit">
</form>
</div>

</body>
</html>


