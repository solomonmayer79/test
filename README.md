PHP Interview Questions

Advantages of PHP 8
It's faster then previous version and this gives developers better chances, more strong website and application, and it adds more consistency, transference and clarity. 	

Enumerated Types
New array functions
The ‘never’ type(never return type)
Readonly properties
First class callable syntax
New in initializers
Pure intersection type
Final class constants
Explicit Octal numeral notation
Fibers 

How do you execute a PHP script from the command line?
	In the command line select the php(env) directory then use the command in php space execute the file directory.

Just use the PHP command line interface (CLI) and specify the file name of the script to be executed as follows:

php script.php

What is the meaning of a final class and a final method?
	Final class can’t extend and final method cannot override in child class. So it protects the child class from the override.

How failures in execution are handled with include() and require() functions?
	If the file is missing an error, The include () function handles the warning and cannot stop the execution so the script runs continue. But the require() gives a fatal error so the script execution is stopped.

What is the main difference between require() and require_once()?
	Almost both are same but some differences there one of the differences is require() is used to include file one or more times in a code and require_once() is used to include once a time in code. 

What is the primary difference between include_once() and include()?
	The primary difference between include() and include_once() is that execute time is called in the programming meaning include() is working every time it's called in the programming but include_once() is not working every time it's called in the programming.

What are the differences between PHP constants and variables?
	Constant values cannot change its fixed one but the variable can change the value. Constant is known value and variable is unknown value.

What is the purpose of the break and continue statement?
	Break and continue are used to control the program flow in condition check like if, while, do while and switch statements. If you use the Break in the middle of the statement to stop the further continuity but the continue condition is used to skip the flow of the program it mean cannot the program is in the middle.

What are constructor and destructors in PHP?
	Constructor and distractor both help to reduce the amount of program code. The Contractor function is automatically called when you create an object from a class but the destructor is  called automatically at the end of the script. 

What is the use of callback in PHP?
	call back Is the function it is called the existing function via function argument.

What are magic constants in PHP?
	Magic constant is the default constant value in php. Resolve the magic constant at runtime. 

How do we set an infinite execution time for PHP script?
	We set infinite execution time using the set_time_limit() function at the beginning of the programming.

What is the function file_get_contents() useful for?
	This function is used for reading the file content into string.
MySQL Interview Questions

What are the advantages and disadvantages of using MySQL?
	Adv- 
solid data security layer to protect from intruders
	Free to download and use
	Operating system Compatibility
Unique storage engine for faster
…..more
Dis Adv
Not very Efficiency in handling very large database
Do not have good developing and debugging tools compare with paid database 
Less then version 5.0  not support for commit,stored procedure and ROLE
do not support SQL check constraints. 	

How can you retrieve a portion of any column value by using a SELECT query?
Select * from <tablename> where (conditions)

SUBSTR() function is used to retrieve the portion of any column.

What is an index? How can an index be declared in MySQL?
	Index statement is used to retrieve data from the database very quickly and the user cannot see the index. Syntax is Create index index_name on tablename (col1,col2,…);

An index is a data structure of a MySQL table that is used to speed up the queries.

It is used by the database search engine to find out the records faster. One or more fields of a table can be used as an index key. Index key can be assigned at the time of table declaration or can be assigned after creating the table.
	
What is the view?
	View is a virtual table based on what result we set in the query and the views show the current up to date data.

What is the difference between the Primary key and the Unique key?
	Primary key does not accept null value but unique key accepts null value

What is a join? Explain the different types of MySQL joins.
	Join is to add one or more tables together under condition in sql query. Type of join is inner , outer, left and right join in the mysql query. Retrieve common data in two tables using inner join and different kinds of data retrieved from two different tables using outer join and left is display all data from left table and common data from right table same opposite of right join statement.
	
How can you export the table as an XML file in MySQL?

‘-X’ option is used with `mysql` command for exporting the file as XML. The following statement will export any table from a database as an XML file.

mysql -u username -X -e “SELECT query” database_name

Explain the difference between DELETE and TRUNCATE.
	Delete command is used to delete the exist data from the table but truncate command removes the data inside the table not from the database

Both DELETE and TRUNCATE commands are used to delete the records from any database table. However, there are some significant differences between these commands. If the table contains the AUTO_INCREMENT PRIMARY KEY field then the effect of these commands can be shown properly.

Two differences between these commands are mentioned below.

DELETE command is used to delete a single or multiple or all the records from the table. The TRUNCATE command is used to delete all the records from the table or make the table empty.
When DELETE command is used to delete all the records from the table then it doesn’t re-initialize the table. So, the AUTO_INCREMENT field does not count from one when the user inserts any record.
But when all the records of any table are deleted by using TRUNCATE command then it re-initializes the table and a new record will start from one for the AUTO_INCREMENT field.
	Thank you so much rajesh……
